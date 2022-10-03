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
   <title>Add Parts</title>
</head>
<body>
   <form method="post">
      <h3>Add New Product</h3>
      <input type="text" name="p_name" placeholder="enter product name" required><br>
      <input type="text" name="p_cat" placeholder="enter product category" required><br>
      <input type="file" name="p_image" placeholder="confirm image" required><br>
      <input type="text" name="p_price" placeholder="enter product price" maxlength="10" required><br>
      <select name="p_status" class="box">
         <option value="instock">In Stock</option>
         <option value="outofstock">Out of Stock</option>
      </select>
      <input type="submit" name="regproduct" value="Register new product"> 
   </form>
</body>
</html>