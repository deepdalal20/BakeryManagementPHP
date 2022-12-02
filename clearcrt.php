<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }   
    $u_id = $_SESSION['logaid'];
    $del1 = "DELETE FROM `tblcart` WHERE u_id = '$u_id'";
    $data1 = mysqli_query($conn, $del1);
    
    if($data1)
    {
        header('location:cart.php');
    }
    else
    {
        echo "<script> alert('Some Error Occured'); </script>";
    }
?>  