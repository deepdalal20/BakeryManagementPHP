<?php  
    include 'dbcon.php';
    $delete_id = $_GET['delete'];
    $req = "DELETE FROM `tblwishlist` WHERE wl_id = '$delete_id'";
    $data = mysqli_query($conn,$req);
    if($data)
    { 
      header ('location: wishlist.php');
    }
    else
    {
      echo "Some Error Occured";
    }
?>   