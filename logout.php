<?php 
session_start();
session_destroy();
unset($_SESSION['loggedin']);

header("location:index.php");
?>
