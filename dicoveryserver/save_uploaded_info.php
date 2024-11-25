<?php

include_once "./connection.php";

// Retrieve the POST data
$userid = $_POST['userid'] ?? null;
$fileName = $_POST['targetFile'] ?? null;
$fileType = $_POST['fileType'] ?? null;
$resourceName = $_POST['resourceName'] ?? null;
$ipAddress = $_POST['ipAddress'] ?? null;

// Function to save resource
function save_resource($conn, $userid, $fileName, $fileType, $resourceName, $ipAddress)
{
    $query = "INSERT INTO `resource` (`resource_name`, `user_id`, `file_type`, `date`, `file_name`, `ip_address`)
              VALUES (?, ?, ?, CURDATE(), ?, ?)";

    $stmt = $conn->prepare($query);

    $stmt->bind_param("sisss", $resourceName, $userid, $fileType, $fileName, $ipAddress);

    $result = $stmt->execute();

    $stmt->close();
    return $result;
}

$result = save_resource($conn, $userid, $fileName, $fileType, $resourceName, $ipAddress);

if ($result) {
    echo "IP Address added in remote server!";
} else {
    echo false;
}



// Close the connection
// $conn->close();
