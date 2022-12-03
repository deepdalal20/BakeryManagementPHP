<?php    
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }
    $u_id = $_SESSION['logaid'];

    $query1 = "SELECT * from tblcart where u_id = '$u_id'";
    $result1= mysqli_query($conn, $query1);
    while($row1 = mysqli_fetch_assoc($result1)):
        $pid = $row1['p_id'];
        $qty = $row1['crt_qty'];

        $query = "SELECT * from tblstock where p_id = '$pid'";
        $result= mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $st = $row['avl_stock'];

        $ab = $st-$qty;
        
        mysqli_query($conn,"UPDATE `tblstock` SET `avl_stock`='$ab' WHERE p_id='$pid'");
    endwhile;
    
    mysqli_query($conn, "DELETE FROM `tblcart` WHERE u_id = '$u_id'");
    header('location: output.php');
?>