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
                
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["name"] = $user["name"]; 
                $_SESSION["role"] = $user["role"];
                $_SESSION['success_message'] = "Logged in seccessfully.";
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

$title = "Sign In";
$view = __DIR__ . '/../views/sign_in.php';

require __DIR__ . '/../templates/sign_in_layout.php';