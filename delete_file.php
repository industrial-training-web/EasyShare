<?php
// Path to the file to be deleted


include_once "./function.php";


$easyShare = new EasyShare();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'verify_user.php';


if ($_GET['action'] == 'delete') {
    $filePath = $_GET['file_path'];
    $user_id = $_GET['user_id'];
    $file_id = $_GET['file_id'];

    echo "Real Path: " . realpath($filePath) . "<br>";

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            $res = $easyShare->delete_resource($user_id, $file_id);
            header('Location: my_share.php');
        } else {
            echo "Failed to delete the file.";
        }
    } else {
        $res = $easyShare->delete_resource($user_id, $file_id);
        echo "File does not exist.";
    }
}
