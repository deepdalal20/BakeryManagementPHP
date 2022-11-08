<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }
     $id=$_GET['id'];
     $select = "SELECT * FROM tblcategory WHERE c_id='$id'";
     $data = mysqli_query($conn, $select);
     $row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Update Category</title>
</head>
<body>
   <form method="post">
      <h3>Update Category</h3>
        Update Category Name: <input type="text" name="c_name" value="<?php echo $row['c_name']?>" required><br><br>
      <input type="submit" name="upcat" value="Update Category"> 
   </form>
</body>
</html>

    <?php
        if(isset($_POST['upcat']))
        {
            $cname = $_POST['c_name'];
            
            $query = "UPDATE `tblcategory` SET `c_name`='$cname' WHERE c_id='$id'";
            $data=mysqli_query($conn,$query);
            
            if($data)
            {
                header('location: category.php');
            }
            else {
                echo "Invalid Data";
            }
        } 
    ?>
</div>