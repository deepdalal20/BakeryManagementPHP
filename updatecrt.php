<?php
    include 'dbcon.php';
    $ord_id = $_POST['ord_id'];
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    $upq = "UPDATE `tblcart` SET crt_qty = '$cart_quantity' WHERE crt_id = '$cart_id'";
    $data = mysqli_query($conn,$upq);

    $upq1 = "UPDATE `tblord` SET ord_qty = '$cart_quantity' WHERE ord_id = '$ord_id'";
    $data1 = mysqli_query($conn,$upq1);

    if($data && $data1)
    { 
      header ('location: cart.php');
    }
    else
    {
      echo "Some Error Occured";
    }
?>