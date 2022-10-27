<?php  
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $ord_id = $_POST['ord_id'];
    $cart_id = $_POST['cart_id'];

    $req = "DELETE FROM `tblcart` WHERE crt_id = '$cart_id'";
    $data = mysqli_query($conn,$req);

    $req1 = "DELETE FROM `tblord` WHERE ord_id = '$ord_id'";
    $data1 = mysqli_query($conn,$req1);

    if($data && $data1)
    { 
      header ('location: cart.php');
    }
    else
    {
      echo "Some Error Occured";
    }
?>   