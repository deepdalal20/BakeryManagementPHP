<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }

        $name = $_POST['bname'];
        $email = $_POST['bemail'];
        $address = $_POST['baddress'];
        $city = $_POST['bcity'];
        $state = $_POST['bstate'];
        $zipcode = $_POST['pincode'];
        $total = $_POST['grandtotal'];

        $insert_product = "INSERT INTO `tblorderdetail`(`od_name`, `od_email`, `od_address`, `od_city`, `od_state`, `od_pin`, `od_total`, `od_date`) VALUES ('$name', '$email', '$address', '$city', '$state', '$zipcode', '$total', current_timestamp())";
        $icart = mysqli_query($conn, $insert_product);

        if($icart)
        {
            header('location: order.php');
        }
        else
        {
            echo "Something Went Wrong";
        }

?>