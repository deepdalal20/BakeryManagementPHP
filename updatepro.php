<?php
     include 'dbcon.php';
     $id=$_GET['id'];
     $select = "SELECT * FROM tblproduct WHERE p_id='$id'";
     $data = mysqli_query($conn, $select);
     $row = mysqli_fetch_array($data);
?>
<!--Pending-->
<div>
    <form action="" method="POST">
              Name:<input value="<?php echo $row['Name'] ?>" type="text" name="name" placeholder="name"><br><br>
                Age:<input value="<?php echo $row['Age'] ?>" type="number" name="age" placeholder="age"><br><br>
               Salary:<input value="<?php echo $row['Salary'] ?>" type="number" name="salary" placeholder="salary"><br><br>

               <input type="submit" name="Update_btn" value="Update"><br><br>
    </form>

    <?php
        if(isset($_POST['Update_btn']))
        {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $salary = $_POST['salary'];
            
            $query = "UPDATE crud12 SET name='$name',age='$age',salary='$salary' WHERE id='$id'";
            $data=mysqli_query($conn,$query);
            
            if($data)
            {
                header('location: display.php');
            }
            else {
                echo "Invalid Data";
            }
        } 
    ?>
</div>