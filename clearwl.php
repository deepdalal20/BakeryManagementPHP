<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    mysqli_query($conn, "DELETE FROM `tblwishlist`");
    header('location: wishlist.php');
?>  