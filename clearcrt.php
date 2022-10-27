<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }   
    
    $u_id = $_SESSION['logaid'];

    $del = "DELETE FROM `tblord` WHERE u_id = '$u_id'";
    $data = mysqli_query($conn, $del);

    $del1 = "DELETE FROM `tblcart`";
    $data1 = mysqli_query($conn, $del1);
    
    if($data && $data1)
    {
        header('location:cart.php');
    }
    else
    {
        echo "Something went wrong!";
    }
?>  