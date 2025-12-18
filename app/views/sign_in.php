<?php
$errors = [];
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1. Validate Email
    if (empty($_POST["email"])) {
        $errors["EmailErr"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["EmailErr"] = "Valid email is required";
        }
    }
    // 2. Validate Password
    if (empty($_POST["password"])) {
        $errors["PassWordErr"] = "Password is required";
    }

    // 3. Database Check
    if (empty($errors)) {
        $mysqli = require __DIR__ . "/../../config/database.php";
        
        // SECURE: Use Prepared Statements instead of sprintf
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        // associative array-----
        $user = $result->fetch_assoc();
        
        if ($user) {    
            if (password_verify($_POST["password"], $user["password"])) {
                
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                session_regenerate_id(true);
                
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["name"] = $user["name"]; 

                header("Location: /");
                exit;
            } else {
                $errors["loginError"] = "Invalid email or password";
            }
        } else {
            $errors["loginError"] = "Invalid email or password";
        }
    }
}

function test_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}
?>

<div class="w-full max-w-sm">
    <div class="bg-white shadow-xl rounded-xl p-8 sm:p-10 border border-gray-100">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-8">Welcome Back</h2>
        
        <?php if (isset($errors["loginError"])): ?>
            <div class="mb-4 p-3 rounded bg-red-50 text-red-700 text-sm border border-red-200">
                <?= $errors["loginError"]; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" novalidate>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" 
                    value="<?= htmlspecialchars($_POST["email"] ?? '') ?>"
                    placeholder="you@example.com" 
                    class="w-full px-4 py-2 border <?= isset($errors['EmailErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 transition">
                
                <?php if (isset($errors["EmailErr"])): ?>
                    <span class="text-red-600 text-xs mt-1"><?= $errors["EmailErr"]; ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" 
                    class="w-full px-4 py-2 border <?= isset($errors['PassWordErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600 transition">
                
                <?php if (isset($errors["PassWordErr"])): ?>
                    <span class="text-red-600 text-xs mt-1"><?= $errors["PassWordErr"]; ?></span>
                <?php endif; ?>
            </div>

            <button type="submit"
                class="w-full flex justify-center cursor-pointer py-2.5 px-4 rounded-lg shadow-md text-base font-semibold text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200">
                Sign In
            </button>
        </form>

        <div class="mt-8 text-center border-t pt-6">
            <p class="text-sm text-gray-600">
                Don't have an account yet?
                <a href="/register" class="font-semibold text-purple-600 hover:text-purple-500">Sign Up</a>
            </p>
        </div>
    </div>
</div>
