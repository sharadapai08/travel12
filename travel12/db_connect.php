<?php
// Database connection details
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Replace with your DB username
define('DB_PASSWORD', ''); // Replace with your DB password
define('DB_NAME', 'travel_db');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Start session on every page that includes this file, if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>