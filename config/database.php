<?php
$envPath = __DIR__ . '/../.env'; 

if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        
        // CHANGE $name and $value to $envKey and $envValue
        list($envKey, $envValue) = explode('=', $line, 2);
        
        $_ENV[trim($envKey)] = trim($envValue);
    }
}

$mysqli = new mysqli(
    hostname: $_ENV['DB_HOST'] ?? 'localhost',
    username: $_ENV['DB_USER'] ?? 'root',
    password: $_ENV['DB_PASS'] ?? '',
    database: $_ENV['DB_NAME'] ?? 'novacraft' 
);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}
unset($envPath, $lines, $line, $envKey, $envValue);

return $mysqli;