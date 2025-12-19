<?php
$errors = [];
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Validation Logic
    if (empty($_POST["name"])) {
        $errors["NameErr"] = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $errors["NameErr"] = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $errors["EmailErr"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["EmailErr"] = "Valid email is required";
        }
    }

    // Password Validation
    if (empty($_POST["password"])) {
        $errors["PassWordErr"] = "Password is required";
    } elseif (strlen($_POST["password"]) < 8) {
        $errors["PassWordErr"] = "Password must be at least 8 characters";
    } elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
        $errors["PassWordErr"] = "Passwords must match";
    }

    // 2. Database Logic (Only if no errors)
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
            if (session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['success_message'] = "Account created! Please log in.";
            
            header("Location: /login");
            exit;
            
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
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

// 4. Load the View (If not redirected)
$title = "Sign Up";
$view = __DIR__ . '/../views/register.php';
require __DIR__ . '/../templates/sign_in_layout.php';