<?php
    session_start();
    include 'dbcon.php';
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }
?>

<?php
    if(isset($_POST['regcat'])){
        $cname = $_POST['c_name'];
        
        $query = "INSERT INTO `tblcategory`(`c_name`) VALUES ('$cname')";
        $data = mysqli_query($conn, $query);
        
       if ($data) {
        //  echo "Done";
        header('location: category.php');
       }
       else {
         echo "Some Error occured!!";
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Add New Category</title>
</head>
<body>
   <form method="post">
      <h3>Add New Category</h3>
        New Category Name: <input type="text" name="c_name" placeholder="Enter Category name" required>
        <br><br>
      <input type="submit" name="regcat" value="Register new product"> 
   </form>
</body>
</html>