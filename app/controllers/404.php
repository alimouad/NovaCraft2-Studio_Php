<?php
http_response_code(404);

$title = "Page Not Found";
$view = __DIR__ . '/../views/404.php';

require __DIR__ . '/../templates/layout.php';
exit;