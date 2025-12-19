<?php

// to read the env file;
$envFile = __DIR__ . '/../.env'; 
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}
$mysqli = new mysqli(
    hostname: $_ENV['DB_HOST'] ?? 'localhost',
    username: $_ENV['DB_USER'] ?? 'root',
    password: $_ENV['DB_PASS'] ?? '',
    database: $_ENV['DB_NAME'] ?? 'novraft'
);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;