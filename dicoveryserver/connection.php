<?php
$host = "localhost"; // the remote server's IP address
$db_username = "root";
$db_password = "11135984";
$db_name = "easy_share";

// Create a connection to the remote database
$conn = new mysqli($host, $db_username, $db_password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
