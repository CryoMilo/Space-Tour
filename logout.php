<?php
session_start();
session_destroy();  // Destroy all sessions
header("Location: login.html");  // Redirect to the login page
exit();
?>