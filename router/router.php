<?php 
function route($uri) {

$basePath = __DIR__ . '/../app/Controllers/';
$routes = [
    '/'          => 'home.php',
    '/services'  => 'services.php',
    '/about'     => 'about.php',
    '/contact'   => 'contact.php',
    '/account'   => 'account.php',
    '/login'     => 'sign_in.php',
    '/register'  => 'register.php',
    '/logout' => 'logout.php',
];

if (array_key_exists($uri, $routes)) {
     require_once $basePath . $routes[$uri];
} else {
    http_response_code(404);
    require_once $basePath . '404.php';
    exit;
}}
