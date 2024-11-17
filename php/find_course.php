<?php

include "./dbConnection.php";



$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);  // you given "true" then this data convert associative array, if not given then it convert php object


$data = $mydata;


$group_id = $data['group_id'];


$sentData = array();
//$sentDataDuplicate = array(array());
$allId = array();
$allData = array();


$query = "SELECT * FROM `exam_course` where groups=$group_id order by sl asc;";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $allId[] = $row['sl'];
    $allData['sl'] = $row['sl'];
    $allData['course_title'] = $row['course_title'];

    if (!empty($allData)) $sentDataDuplicate[] = $allData;
}

// print_r($allId);
// print_r($allStudentId);
// print_r($allStudentName);

if (empty($allId)) {
    $sentData['error'] = true;
    $sentData['message'] = 'No Course Found';
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
