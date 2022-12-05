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

        $existssql = "select * from tblcategory where c_name = '$cname'";
        $existresult = mysqli_query($conn, $existssql);
        $numrows = mysqli_num_rows($existresult);
        if($numrows <= 0)
        {
            $query = "INSERT INTO `tblcategory`(`c_name`) VALUES ('$cname')";
            $data = mysqli_query($conn, $query);
            
          if ($data) {
            header('location: category.php');
          }
          else {
            echo "<script> alert('Some Error Occured'); </script>";
          }
        }
        else
        {
          echo "<script> alert('Category already listed'); </script>";
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>
      New Category
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
  background-color: #fa9200;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #fa9200;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>
<h3>New Category</h3>
<div>
  <form action="" method="post">
    <label for="fname">New Category Name: </label>
    <input type="text" id="fname" name="c_name" placeholder="Enter Category name" required>
  
    <input type="submit" name="regcat" value="Submit">
  </form>
</div>

</body>
</html>