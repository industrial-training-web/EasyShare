<?php
// Define the path to the uploads directory
$uploadDir = 'uploads/';

// Get the list of files in the uploads directory
$files = array_diff(scandir($uploadDir), array('..', '.'));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local File Sharing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .file-list {
            list-style-type: none;
            padding: 0;
        }

        .file-list li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Local File Sharing</h1>

    <h2>Available Files:</h2>
    <ul class="file-list">
        <?php foreach ($files as $file): ?>
            <li><a href="download.php?file=<?= urlencode($file) ?>" target="_blank"><?= htmlspecialchars($file) ?></a></li>
        <?php endforeach; ?>
    </ul>

    <h2>Upload a File:</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" required>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>

</html>