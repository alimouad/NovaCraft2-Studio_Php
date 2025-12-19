<?php

require_once __DIR__ . '/../Core/Auth.php';

Auth::requireLogin(); 

$mysqli = require __DIR__ . "/../../config/database.php";

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


if (!$user) {
    header("Location: /logout");
    exit;
}


$title = "NovaCraft Studio - Account";
$view = __DIR__ . '/../views/account.php';

require __DIR__ . '/../templates/layout.php';