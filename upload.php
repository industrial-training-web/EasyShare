<?php
// Define the upload directory

include_once "./function.php";
$uploadDir = 'uploads/';

$easyShare = new EasyShare();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once 'verify_user.php';



// Check if the form is submitted
if (isset($_POST['submit'])) {
    $targetFileName = $uploadDir . basename($_FILES['fileToUpload']['name']);
    $resourceName = $_POST['resourceTiitle'];
    $userid = $_POST['user_id'];
    $uploadOk = 1;
    $fileSuffix = md5(date('YmdHis')); // Create an MD5 hash of current date and time
    $fileType = strtolower(pathinfo($targetFileName, PATHINFO_EXTENSION));

    $targetFile = trim($uploadDir .  basename($_FILES['fileToUpload']['name']) . $fileSuffix . '.' . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (e.g., limit to 200MB)
    if ($_FILES['fileToUpload']['size'] > 200000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only specific file types (optional)
    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'gif' && $fileType != 'pdf' && $fileType != 'ppt' && $fileType != 'txt' && $fileType != 'doc') {
        echo "Sorry, only JPG, JPEG, PNG, GIF,PPT,TXT,DOC and PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if everything is ok, then try to upload the file
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {

            $result = $easyShare->save_resource($userid, $targetFile, $fileType, $resourceName);
            // echo "The file " . htmlspecialchars(basename($_FILES['fileToUpload']['name'])) . " has been uploaded.";
            if ($result) {
                echo "Resource saved successfully!";
                header('Location: my_share.php');
            } else {
                echo "Failed to save resource.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
