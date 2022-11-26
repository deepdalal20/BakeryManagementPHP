<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $u_id = $_SESSION['logaid'];
    $query = "select * from tblcart";
    $result= mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)):
        $total=($row['crt_qty']* $row['crt_price']);
              $grandtotal += $total;
    endwhile;
    $insert_product = "INSERT INTO `tblorder`(`u_id`, `o_total`, `date`) VALUES ('$u_id', '$grandtotal', current_timestamp())";
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