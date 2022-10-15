<?php
     include 'dbcon.php';
     $id=$_GET['id'];
     $select = "SELECT * FROM tblproduct WHERE p_id='$id'";
     $data = mysqli_query($conn, $select);
     $row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Update Product</title>
</head>
<body>
   <form method="post">
      <h3>Update Product</h3>
      Product Name: <input type="text" name="p_name" value="<?php echo $row['p_name']?>" required><br>
      Product Category: <input type="text" name="p_cat" value="<?php echo $row['category']?>" required><br>
      Image: <input type="file" name="p_image" value="<?php echo $row['p_image']?>" required><br>
      Product Price: <input type="text" name="p_price" value="<?php echo $row['p_price']?>" maxlength="10" required><br>
      Product Status: <select name="p_status" class="box">
         <option value="instock">In Stock</option>
         <option value="outofstock">Out of Stock</option>
      </select><br><br>
      <input type="submit" name="upproduct" value="Update product"> 
   </form>
</body>
</html>

    <?php
        if(isset($_POST['upproduct']))
        {
            $pname = $_POST['p_name'];
            $pcategory = $_POST['p_cat'];
            $pimage = $_POST['p_image'];
            $pprice = $_POST['p_price'];
            $pstatus = $_POST['p_status'];
            $df = 0;
            
            $query = "UPDATE `tblproduct` SET `p_name`='$pname',`category`='$pcategory',`p_image`='$pimage',`p_price`='$pprice',`p_status`='$pstatus',`delete_flag`='$df',`date`=current_timestamp() WHERE p_id='$id'";
            $data=mysqli_query($conn,$query);
            
            if($data)
            {
                header('location: edproduct.php');
            }
            else {
                echo "Invalid Data";
            }
        } 
    ?>
</div>