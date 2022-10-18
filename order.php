<?php
    include 'dbcon.php';
    // session_start();
    // if(!isset($_SESSION['loganame'])){
    //     header('location:login.php');
    // }
 
    $query = "select * from tblcart";
    $result= mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)):
        $total=($row['crt_qty']* $row['crt_price']);
              $grandtotal += $total;
    endwhile;
    $insert_product = "INSERT INTO `tblorder`(`o_total`, `date`) VALUES ('$grandtotal', current_timestamp())";
    $icart = mysqli_query($conn, $insert_product);

    if($icart)
    {
        header('location: clearcrt1.php');
    }
    else
    {
        echo "Something Went Wrong";
    }
?>