<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $uid= $_SESSION['logaid'];
    $gt = $_SESSION['gt'];
    $name= $_SESSION['oname'];
    $email= $_SESSION['oemail'];
    $address = $_SESSION['oadd'];
    $city = $_SESSION['ocity'];
    $state = $_SESSION['ostate'];
    $zipcode = $_SESSION['ozipcode'];
    $payment = $_SESSION['razorpay_payment_id'];

        $insert_product = "INSERT INTO `tblorderdetail`(`u_id`, `od_name`, `od_email`, `od_address`, `od_city`, `od_state`, `od_pin`, `od_total`, `od_pay`, `od_date`) VALUES ('$uid', '$name', '$email', '$address', '$city', '$state', '$zipcode', '$gt', '$payment', current_timestamp())";
        $icart = mysqli_query($conn, $insert_product);

        if($icart)
        {
            unset($_SESSION['gt']);
            unset($_SESSION['razorpay_order_id']);
            unset($_SESSION['oname']);
            unset($_SESSION['oemail']);
            unset($_SESSION['oadd']);
            unset($_SESSION['ocity']);
            unset($_SESSION['ostate']);
            unset($_SESSION['ozipcode']);
            header('location: copyord.php');
        }
        else
        {
            echo "<script> alert('Some Error Occured'); </script>";
        }

?>