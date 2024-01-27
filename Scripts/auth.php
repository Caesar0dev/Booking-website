<?php
//starts the session
session_start();
//if the username is not set in the session variable redirect to the login page
if(!isset($_SESSION['username'])){
header("Location: signup.php");
exit();
}
?>
