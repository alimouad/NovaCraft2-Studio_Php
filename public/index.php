<?php

session_start();
require __DIR__ . "/../router/router.php";


// 2. Include core classes globally
require_once __DIR__ . '/../app/Core/Auth.php';



$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

route($uri);

?>
