<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $gt = $_SESSION['gt'];
    $payment_id = $_SESSION['razorpay_order_id'];
    $name= $_SESSION['oname'];
    $email= $_SESSION['oemail'];
    $address = $_SESSION['oadd'];
    $city = $_SESSION['ocity'];
    $state = $_SESSION['ostate'];
    $zipcode = $_SESSION['ozipcode'];

        $insert_product = "INSERT INTO `tblorderdetail`(`od_name`, `od_email`, `od_address`, `od_city`, `od_state`, `od_pin`, `od_total`, `od_pay`, `od_date`) VALUES ('$name', '$email', '$address', '$city', '$state', '$zipcode', '$gt', '$payment_id', current_timestamp())";
        $icart = mysqli_query($conn, $insert_product);

        if($icart)
        {
            header('location: copyord.php');
        }
        else
        {
            echo "<script> alert('Some Error Occured'); </script>";
        }

?>