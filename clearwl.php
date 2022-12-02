<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $u_id = $_SESSION['logaid'];
    mysqli_query($conn, "DELETE FROM `tblwishlist` WHERE u_id = '$u_id'");
    header('location: wishlist.php');
?>  