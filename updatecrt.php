<?php
    include 'dbcon.php';
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    $upq = "UPDATE `tblcart` SET crt_qty = '$cart_quantity' WHERE crt_id = '$cart_id'";
    $data = mysqli_query($conn,$upq);

    if($data)
    { 
      header ('location: cart.php');
    }
    else
    {
      echo "Some Error Occured";
    }
?>