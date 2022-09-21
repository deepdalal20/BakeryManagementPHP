<?php
    include 'dbcon.php';
    
    if(!empty($_POST['logemail']) && !empty($_POST['logpass']))
    {
        if(filter_var($_POST['logemail'], FILTER_VALIDATE_EMAIL))
        {  
            $lemail = $_POST['logemail'];
            $lpass = $_POST['logpass'];
  
            $query = "SELECT * FROM 'tbluser' WHERE email='$lemail'";
  
            if($result = mysqli_query($conn, $query))
            {
                $row = $result->fetch_assoc();
                $did = $row["id"];
                $dname = $row["name"];
                $demail = $row["email"];
                $dpass = $row["password"];
                $dcontact = $row["contact"];
                $ddate = $row["date"];
  
                if($demail == $lemail && $lpass == $dpass)
                {
                    session_start();
                    $_SESSION['loguname'] = $dname;
                    header('location: cust.php');
                }
                else
                {
                    echo "Password or email id doesnt match";
                }
            }
            else
            {
                echo "Query failed";
            }
        }
        else
        {
            echo "Enter valid Email Id";
        }
    }
    else
    {
        echo "Enter Details Properly";
    }
?>
  