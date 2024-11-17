<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_reset();
session_destroy();

// Redirect to the login page or homepage
header("Location: index.php");
exit();
