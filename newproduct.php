<?php
    session_start();
    include 'dbcon.php';
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }    
    echo "Work in progress";
?>