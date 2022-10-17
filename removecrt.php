<?php  
    include 'dbcon.php';
    $delete_id = $_GET['delete'];
    $req = "DELETE FROM `tblcart` WHERE crt_id = '$delete_id'";
    $data = mysqli_query($conn,$req);
    if($data)
    { 
      header ('location: cart.php');
    }
    else
    {
      echo "Some Error Occured";
    }
?>   