<?php

include_once "./connection.php";

// Retrieve the POST data
//$userid = $_POST['userid'] ?? null;

// Function to save resource
function findIpAddress($conn)
{

    $query = "SELECT DISTINCT resource.ip_address,(SELECT user.name FROM user WHERE user.id=resource.user_id)AS sender FROM `resource`";

    $stmt = $conn->prepare($query);

    // $stmt->bind_param("",  $ipAddress);

    $stmt->execute();
    $result = $stmt->get_result(); // Get the result set
    return $result;
}

$result = findIpAddress($conn);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    //$rowData = array();
    $data[] = $row;
}

if (count($data) > 0) {
    // print_r($data);
    echo json_encode($data);
} else {
    echo false;
}



// Close the connection
// $conn->close();
