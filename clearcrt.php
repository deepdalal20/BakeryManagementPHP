<?php
    include 'dbcon.php';
    mysqli_query($conn, "DELETE FROM `tblcart`");
    header('location:cart.php');
?>  