<?php
$errors = [];
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST["name"])) {
        $errors["NameErr"] = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $errors["NameErr"] = "Only letters and white space allowed";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errors["EmailErr"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["EmailErr"] = "Valid email is required";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $errors["PassWordErr"] = "Password is required";
    } elseif (strlen($_POST["password"]) < 8) {
        $errors["PassWordErr"] = "Password must be at least 8 characters";
    } elseif (!preg_match("/[a-z]/i", $_POST["password"])) {
        $errors["PassWordErr"] = "Password must contain at least one letter";
    } elseif (!preg_match("/[0-9]/", $_POST["password"])) {
        $errors["PassWordErr"] = "Password must contain at least one number";
    } elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
        $errors["PassWordErr"] = "Passwords must match";
    }

    if (empty($errors)) {
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $mysqli = require __DIR__ . "/../../config/database.php";

        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql); 

        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("sss", $name, $email, $password_hash);

        try {
            $stmt->execute();
            header("Location: /login");
            exit;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                // Corrected typo here from $error to $errors
                $errors["EmailErr"] = "This email is already registered.";
            } else {
                throw $e;
            }
        }
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>

   <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create Your Account</h2>
          <form action="" method="POST" novalidate>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                        class="w-full px-4 py-2 border <?= isset($errors['NameErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg">
                    <?php if (isset($errors["NameErr"])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $errors["NameErr"] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        class="w-full px-4 py-2 border <?= isset($errors['EmailErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg">
                    <?php if (isset($errors["EmailErr"])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $errors["EmailErr"] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" 
                        class="w-full px-4 py-2 border <?= isset($errors['PassWordErr']) ? 'border-red-500' : 'border-gray-300' ?> rounded-lg">
                    <?php if (isset($errors["PassWordErr"])): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $errors["PassWordErr"] ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <button type="submit" class="w-full cursor-pointer bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700">
                    Register
                </button>
                </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="/login" class="text-indigo-600 hover:text-indigo-500 font-medium">Log in here</a>
                </p>
            </div>
        </div>
    </div>