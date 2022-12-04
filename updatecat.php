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
<html>
<head>
    <title>
      Update Category
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

<h3>Update Category</h3>

<div>
  <form action="" method="post">
    <label for="fname">Update Category Name: </label>
    <input type="text" id="fname" name="c_name" value="<?php echo $row['c_name']?>" required>
  
    <input type="submit" name="upcat" value="Submit">
  </form>
</div>

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
                echo "<script> alert('Invalid Data'); </script>";
            }
        } 
    ?>