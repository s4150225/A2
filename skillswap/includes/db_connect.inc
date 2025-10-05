<?php
// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$localhost_db = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '', // Default XAMPP password is empty
    'name' => 'skillswap'
];

$jacob5_db = [
    'host' => 'talsprddb02.int.its.rmit.edu.au',
    'user' => 's4150225', // Your student ID
    'pass' => 'cisco123', // Your chosen password
    'name' => 's4150225'  // Your student ID
];

// Detect the server environment
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') {
    $db_creds = $localhost_db;
} else {
    $db_creds = $jacob5_db;
}

// Create connection using MySQLi procedural
$conn = mysqli_connect($db_creds['host'], $db_creds['user'], $db_creds['pass'], $db_creds['name']);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set to utf8mb4 for full Unicode support
mysqli_set_charset($conn, "utf8mb4");

?>
