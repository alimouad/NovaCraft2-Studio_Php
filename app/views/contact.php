<?php 
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
?>

<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold mb-6 text-center">Contact Us</h2>

    <form method="post" action=""
          class="max-w-xl mx-auto bg-white p-8 shadow-md rounded-lg space-y-4">

        <?php if (!empty($success)): ?>
            <p class="text-green-600 text-center font-semibold"><?=  $success; ?></p>
        <?php endif; ?>

        <input type="text" name="name" placeholder="Your Name" 
               class="w-full border px-4 py-2 rounded-lg" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
        <?php if (isset($errors["nameErr"])): ?>
             <span class="error text-red-600 text-sm"><?= $errors["nameErr"] ?></span>
        <?php endif;?>

        <input type="email" name="email" placeholder="Your Email" 
               class="w-full border px-4 py-2 rounded-lg" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <?php if (isset($errors["emailErr"])): ?>
             <span class="error text-red-600 text-sm"><?= $errors["emailErr"] ?></span>
        <?php endif;?>


        <textarea name="message" placeholder="Your Message" 
                  class="w-full border px-4 py-2 rounded-lg"></textarea>

          <?php if (isset($errors["messageError"])): ?>
             <span class="error text-red-600 text-sm"><?= $errors["messageError"] ?></span>
          <?php endif;?>

        <input type="submit" value="Send"
               class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-blue-700 cursor-pointer">
    </form>
</section>
