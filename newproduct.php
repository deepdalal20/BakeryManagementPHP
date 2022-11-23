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
        $df = 0;
        
        $query = "INSERT INTO `tblproduct`(`p_name`, `category`, `p_image`, `p_price`, `p_status`, `delete_flag`, `date`) VALUES ('$pname','$pcategory','$pimage','$pprice','$pstatus','$df',current_timestamp())";
        $data = mysqli_query($conn, $query);
        
       if ($data) {
        //  echo "Done";
        header('location: edproduct.php');
       }
       else {
         echo "Some Error occured!!";
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Add New Product</title>
</head>
<body>
   <form method="post">
      <h3>Add New Product</h3>
      Product Name: <input type="text" name="p_name" placeholder="enter product name" required><br>
      Product Category: 
      <select name="p_cat" class="box">
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
      Image: <input type="file" name="p_image" placeholder="confirm image" required><br>
      Product Price: <input type="text" name="p_price" placeholder="enter product price" maxlength="10" required><br>
      Status: <select name="p_status" class="box">
         <option value="instock">In Stock</option>
         <option value="outofstock">Out of Stock</option>
      </select><br><br>
      <input type="submit" name="regproduct" value="Register new product"> 
   </form>
</body>
</html>