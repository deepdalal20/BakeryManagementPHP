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
<html lang="en">
<head>
   <title>Restock</title>
</head>
<body>
   <form method="post">
      <h3>Restock</h3>
      Product Name: <?php echo $row['p_name']?> <br>
      Product Price: <?php echo $row['p_price']?><br>
      Available Quantity: <input type="text" name="qty" value="0" required><br>
      <input type="submit" name="restock" value="Restock"> 
   </form>
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