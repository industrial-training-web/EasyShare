<?php
// Check if the file parameter is set
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = 'uploads/' . $file;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Set headers to prompt download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "File does not exist.";
    }
} else {
    echo "No file specified.";
}
