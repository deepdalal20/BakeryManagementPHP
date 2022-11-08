<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }  
    $id=$_GET['id'];
    $query = "DELETE FROM tbluser WHERE id='$id'";
    $data = mysqli_query($conn, $query);

    if($data)
    {
        header ('location: customer.php');
    }
    else 
    {
        echo "Unable to delete";
    }
?>