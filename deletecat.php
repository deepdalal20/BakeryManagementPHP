<?php
    include 'dbcon.php';
    $id=$_GET['id'];
    $query = "DELETE FROM tblcategory WHERE c_id='$id'";
    $data = mysqli_query($conn, $query);

    if($data)
    {
        header ('location: category.php');
    }
    else 
    {
        echo "Unable to delete";
    }
?>