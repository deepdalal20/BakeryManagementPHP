<?php
    session_start();
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }
    include 'dbcon.php';
    $id=$_GET['id'];
    $query = "DELETE FROM tblproduct WHERE p_id='$id'";
    $data = mysqli_query($conn, $query);

    if($data)
    {
        header ('location: edproduct.php');
    }
    else 
    {
        echo "Unable to delete";
    }
?>