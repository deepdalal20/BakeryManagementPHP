<?php
    include 'dbcon.php';
    mysqli_query($conn, "DELETE FROM `tblwishlist`");
    header('location: wishlist.php');
?>  