<?php
// Start the session if it's being used
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the registration page
header("Location: register.html");
exit();
?>
