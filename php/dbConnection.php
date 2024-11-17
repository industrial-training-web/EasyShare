<?php


$host = "localhost";
$user = "root";
$pass = "11135984";
$dbName = "probaha";

$conn = new mysqli($host, $user, $pass, $dbName);

if ($conn->connect_error) {
    die("Connection Failed");
}
