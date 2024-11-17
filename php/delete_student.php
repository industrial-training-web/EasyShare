<?php

include "./dbConnection.php";



$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);  // you given "true" then this data convert associative array, if not given then it convert php object


$data = $mydata;

$id = $data['id'];




$query = "DELETE FROM `admin` WHERE id=$id;";
mysqli_query($conn, $query);

$sentData['error'] = false;
$sentData['message'] = 'Students Deleted Successfully';




/// Return Json Fortmatted data
echo json_encode($sentData);
