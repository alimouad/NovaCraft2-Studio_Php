<?php
require_once __DIR__ . '/../Core/Auth.php';
$mysqli = require __DIR__ . '/../../config/database.php';

Auth::requireAdmin($mysqli);

$query = "SELECT message , created_at from contacts";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$messages = $result->fetch_all(MYSQLI_ASSOC);




// Only admins will ever see this:
$title = "Admin Dashboard";
$view = __DIR__ . '/../views/admin_panel.php';
require __DIR__ . '/../templates/layout.php';