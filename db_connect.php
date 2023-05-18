<?php

$host = '127.0.0.1:3306';
$username = 'root';
$password = '';
$dbname = 'mowla_cendol';

try {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message
    echo 'Failed to connect to the database: ' . $e->getMessage();
    exit();
}



