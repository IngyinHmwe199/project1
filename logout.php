<?php
session_start();

// Destroy all session data
session_destroy();  


// Redirect to the login page
header("Location: LoginPg.php");
exit();
?>
