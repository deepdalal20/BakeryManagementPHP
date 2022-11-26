<?php  
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $delete_id = $_GET['delete'];
    $req = "DELETE FROM `tblwishlist` WHERE wl_id = '$delete_id'";
    $data = mysqli_query($conn,$req);
    if($data)
    { 
      header ('location: wishlist.php');
    }
    else
    {
      echo "<script> alert('Some Error Occured'); </script>";
    }
?>   