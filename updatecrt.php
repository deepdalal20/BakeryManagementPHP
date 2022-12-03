<?php
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    include 'dbcon.php';
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    if($cart_quantity <= 0)
    {
      echo "<script> alert('Product Quantity must be greater than 0'); </script>";
    }
    else
    {
          $upq = "UPDATE `tblcart` SET crt_qty = '$cart_quantity' WHERE crt_id = '$cart_id'";
          $data = mysqli_query($conn,$upq);

          if($data)
          { 
            header ('location: cart.php');
          }
          else
          {
            echo "<script> alert('Some Error Occured'); </script>";
          }
    }
?>