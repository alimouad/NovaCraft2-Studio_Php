<?php


$mysqli = new mysqli(
    hostname: $_ENV['DB_HOST'] ?? 'localhost',
    username: $_ENV['DB_USER'] ?? 'root',
    password: $_ENV['DB_PASS'] ?? '',
    database: $_ENV['DB_NAME'] ?? 'novacraft'
);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;