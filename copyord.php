<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $u_id = $_SESSION['logaid'];

    $insert_product = "INSERT INTO tblord SELECT * FROM tblcart";
    $icart = mysqli_query($conn, $insert_product);

    if($icart)
    {
        header('location: clearcrt1.php');
    }
    else
    {
        echo "Something Went Wrong";
    }
?>