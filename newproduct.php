<?php
    session_start();
    include 'dbcon.php';
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }
?>

<?php
    if(isset($_POST['regproduct'])){
        $pname = $_POST['p_name'];
        $pcategory = $_POST['p_cat'];
        $pimage = $_POST['p_image'];
        $pprice = $_POST['p_price'];
        $pstatus = $_POST['p_status'];
        
        $query = "INSERT INTO `tblproduct`(`p_name`, `category`, `p_image`, `p_price`, `p_status`, `date`) VALUES ('$pname','$pcategory','$pimage','$pprice','$pstatus',current_timestamp())";
        $data = mysqli_query($conn, $query);
        
       if ($data) {
        //  echo "Done";
        header('location: edproduct.php');
       }
       else {
         echo "<script> alert('Some Error occured!!'); </script>";
       }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>
      New Product
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

<h3>Add new product</h3>

<div>
  <form action="" method="post">
    <label for="fname">Product Name: </label>
    <input type="text" id="fname" name="p_name" placeholder="Enter Product name" required>

    <label for="fname">Product Price: </label>
    <input type="text" id="fname" name="p_price" placeholder="Enter Product Price" required>

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
    <input type="file" id="lname" name="p_image" placeholder="Upload Image" required> <br><br>

    <label for="country">Status: </label>
    <select name="p_status" id="country" class="box">
         <option value="instock">In Stock</option>
         <option value="outofstock">Out of Stock</option>
      </select>
  
    <input type="submit" name="regproduct" value="Submit">
  </form>
</div>

</body>
</html>