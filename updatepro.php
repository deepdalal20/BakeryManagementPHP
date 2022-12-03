<?php
    session_start();
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }
     include 'dbcon.php';
     $id=$_GET['id'];
     $select = "SELECT * FROM tblproduct WHERE p_id='$id'";
     $data = mysqli_query($conn, $select);
     $row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>
      Update Product
    </title>
  </head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>Update product</h3>

<div>
  <form action="" method="post">
    <label for="fname">Product Name: </label>
    <input type="text" id="fname" name="p_name" value="<?php echo $row['p_name'];?>" required>

    <label for="fname">Product Price: </label>
    <input type="text" id="fname" name="p_price" value="<?php echo $row['p_price']?>" required>

    <label for="country">Category: </label>
    <select name="p_cat" id="country" class="box">
                     <?php 
                        $sql = "SELECT * FROM tblcategory";
                        $data = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($data)):
                    ?>
         <option value="<?php echo $row['c_name']; ?>"><?php echo $row['c_name']; ?></option>
         <?php
            endwhile;
         ?>
      </select><br>

    <label for="lname">Product Image: </label>
    <input type="file" id="lname" name="p_image" value="Upload Image" required> <br><br>

    <label for="country">Status: </label>
    <select name="p_status" id="country" class="box">
         <option value="instock">In Stock</option>
         <option value="outofstock">Out of Stock</option>
      </select>
  
    <input type="submit" name="upproduct" value="Submit">
  </form>
</div>

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
            
            $query = "UPDATE `tblproduct` SET `p_name`='$pname',`category`='$pcategory',`p_image`='$pimage',`p_price`='$pprice',`p_status`='$pstatus',`date`=current_timestamp() WHERE p_id='$id'";
            $data=mysqli_query($conn,$query);
            
            if($data)
            {
                header('location: edproduct.php');
            }
            else {
                echo "<script> alert('Invalid Inputs'); </script>";
            }
        } 
    ?>