<?php  
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $cart_id = $_POST['cart_id'];

    $req = "DELETE FROM `tblcart` WHERE crt_id = '$cart_id'";
    $data = mysqli_query($conn,$req);

    if($data)
    { 
      header ('location: cart.php');
    }
    else
    {
      echo "<script> alert('Some Error Occured'); </script>";
    }
?>   