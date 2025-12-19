<?php


require_once __DIR__ . '/../Core/Auth.php';

Auth::requireLogin(); 


$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate Name
  if (empty($_POST["name"])) {
    $errors["nameErr"] = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $errors["nameErr"] = "Only letters and white space allowed";
    }
  }
  
  // Validate Email
  if (empty($_POST["email"])) {
    $errors["emailErr"] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["emailErr"] = "Invalid email format";
    }
  }
    if(empty($_POST["message"])){
      $errors["messageError"] = "Message is required";
    }

  if (empty($errors)) {
        $mysqli = require __DIR__ . "/../../config/database.php";
        $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql); 

        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("sss", $_POST["name"], $_POST["email"], $_POST["message"]);
        $stmt->execute();

        $success = "Your message has been sent successfully";
  }
}

function test_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}


$title = "NovaCraft Studio - Contact";
$view = __DIR__ . '/../views/contact.php';

require __DIR__ . '/../templates/layout.php';