<?php

include "./dbConnection.php";



$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);  // you given "true" then this data convert associative array, if not given then it convert php object


$data = $mydata;

$batch_id = $data['id'];




$query = "DELETE FROM `n_batch` WHERE id=$batch_id;";
mysqli_query($conn, $query);

$sentData['error'] = false;
$sentData['message'] = 'Batch Deleted Successfully';




/// Return Json Fortmatted data
echo json_encode($sentData);
