<?php 
session_start();
unset($_SESSION['loguname']);
session_destroy();
header("location:loreg.php");
?>
