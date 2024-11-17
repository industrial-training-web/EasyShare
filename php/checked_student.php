<?php

include "./dbConnection.php";



$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);  // you given "true" then this data convert associative array, if not given then it convert php object


$data = $mydata;

$batch_id = $data['batch_id'];
$group_id = $data['group_id'];
$n_year = $data['n_year'];

// echo $batch_id;
// echo $group_id;
// echo $n_year;

$allId = array();
$allStudentId = array();
$allStudentName = array();
$sentData = array();
//$sentDataDuplicate = array(array());
$allData = array();


$query = "SELECT id,name,full_name,optional_subject FROM admin where batch_id=$batch_id and group_id=$group_id and n_year=$n_year order by name asc;";

$result = mysqli_query($conn, $query);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $allId[] = $row['id'];
    $allStudentId[] = $row['name'];
    $allStudentName[] = $row['full_name'];

    $allData['id'] = $row['id'];
    $allData['studentId'] = $row['name'];
    $allData['studentName'] = $row['full_name'];
    $allData['optional_subject'] = $row['optional_subject'];
    if (!empty($allData)) $sentDataDuplicate[] = $allData;
}

// print_r($allId);
// print_r($allStudentId);
// print_r($allStudentName);

if (empty($allId) || empty($allStudentId) || empty($allStudentName)) {
    $sentData['error'] = true;
    $sentData['message'] = 'No Student Found';
    $sentData['id'] = $allId;
    $sentData['studentId'] = $allStudentId;
    $sentData['studentName'] = $allStudentName;
} else {
    // $sentData['error'] = false;
    // $sentData['id'] = $allId;
    // $sentData['studentId'] = $allStudentId;
    // $sentData['studentName'] = $allStudentName;

    $sentData['error'] = false;
    $sentData['data'] = $sentDataDuplicate;
}




/// Return Json Fortmatted data
echo json_encode($sentData);
