<?php
    session_start();
    include 'dbcon.php';
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }
    $id=$_GET['id'];
    $select = "SELECT * FROM tblproduct WHERE p_id='$id'";
    $data = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($data);    
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Restock
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

<h3>Restock</h3>

<div>
  <form action="" method="post">
    <label for="fname">Product Name: </label> <?php echo $row['p_name']?> <br><br>

    <label for="fname">Product Price: </label> <?php echo $row['p_price']?> <br><br>

    <label for="lname">Available Quantity: </label>
    <input type="text" id="lname" name="qty" value="0" required> <br><br>
  
    <input type="submit" name="restock" value="Submit">
  </form>
</div>

</body>
</html>

<?php
    if(isset($_POST['restock']))
    {
        $qty = $_POST['qty'];
        $check = "select * from tblstock where p_id = '$id'";
        $data1 = mysqli_query($conn, $check);
        $numrows = mysqli_num_rows($data1);
        if($numrows > 0)
        {
            $query = "UPDATE `tblstock` SET `avl_stock`='$qty',`date`=current_timestamp() WHERE p_id='$id'";
            $data=mysqli_query($conn,$query);
            if($data)
            {
                header('location: stock.php');
            }
            else {
                echo "Invalid Data";
            }
        }
        else
        {
            $query = "INSERT INTO `tblstock`(`p_id`, `avl_stock`, `date`) VALUES ('$id','$qty', current_timestamp())";
            $data = mysqli_query($conn, $query);
                
            if ($data) 
            {
                header('location: stock.php');
            }
            else {
                echo "Some Error occured!!";
            }
        }
        
    }
?>