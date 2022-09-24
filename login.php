<?php
session_start();
include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="loginstyle.css">
    <title> Login </title>
</head>
<body>
    <center>
        <a href="index.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
        <h1 style="color: white;"> Seewans Bakery </h1>
    </center>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- <select style="text-align: center; background-color: #ffa500; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="des[]">                               
                            <option  hidden> Select Designation</option>
                            <option  value="admin"> Admin </option>
                            <option  value="customer"> Customer </option> -->
                     <!-- </select> -->
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" name="logemail" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="logpass" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text" name="reme">Remember me</label>
                        </div>
                        <a href="#" class="text">Forgot password?</a>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Login" name="logsub">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Not a user?
                        <a href="register.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php
    if($conn){
        if(isset($_POST['logsub'])){
            echo "hrll";
            if(!empty($_POST['logemail']) && !empty($_POST['logpass']))
            {
                    $lemail = $_POST['logemail'];
                    $lpass = $_POST['logpass'];

                    $query = "SELECT * FROM tbluser where email='$lemail'";
                    $query2 = "SELECT * FROM tblstaff where semail='$lemail'";

                    // if($result = mysqli_query($conn,$query2))
                    // {
                    //     echo 'staff';
                    //     $row = $result -> fetch_assoc();
                    //     $aemail = $row["semail"];
                    //     $apass = $row["spassword"];
                    //     if($lemail == $aemail && password_verify($hashp,$apass))
                    //     {
                    //         header('location: admin.php');
                    //     }
                    // }    
                    // else if($result2 = mysqli_query($conn,$query))
                    // {
                    //     echo 'customer';
                    //         $row1 = $result2 -> fetch_assoc();
                    //         $uid = $row1["id"];
                    //         $uname = $row1["name"];
                    //         $uemail = $row1["email"];
                    //         $upass = $row1["password"];
                    //         $ucontact = $row1["contact"];
                    //        // $hashpwd = password_hash($pwd,PASSWORD_DEFAULT);
                    //         if($lemail == $uemail){
                    //             echo 'emailverify';
                    //             if(password_verify($hashp,$upass))
                    //             {
                    //             echo 'Done ok';
                    //             $_SESSION["loguname"] = $_POST['logemail'];
                    //             $_SESSION["loggedin"] = true;
                    //             echo $_SESSION['loguname'];
                    //             header('location: cust.php');
                    //         }else{
                    //             echo $upass."database <br>";
                    //             //echo $hashpwd;
                    //             echo 'fail';
                    //         }
                    //     }
                    // }
                        echo "out";
                    if($resultuser = mysqli_query($conn, $query))
                    {
                        echo "user";
                        $row = mysqli_fetch_assoc($resultuser);
                        $aemail = $row["email"];
                        $apass = $row["password"];
                        
                        echo $lemail;
                        echo $aemail;
                        echo password_hash($lpass, PASSWORD_DEFAULT).'<br>';
                        echo $apass;
                        if($lemail == $aemail && password_verify($lpass, $apass))
                        {
                            $_SESSION['loguname'] = $aname;
                            header('location: cust.php');
                        }
                        else if($resultstaff = mysqli_query($conn, $query2))
                        {
                            echo $lemail;
                            echo $aemail;
                            echo password_hash($lpass, PASSWORD_DEFAULT).'<br>';
                            echo $apass;
                            $row = mysqli_fetch_assoc($resultstaff);
                            $aname = $row["sname"];
                            $aemail = $row["semail"];
                            $apass = $row["spassword"];

                            if($lemail == $aemail && $lpass == $apass)
                            {
                                $_SESSION['loguname'] = $aname;
                                header('location: admin.php');
                            }
                        }
                    }    
                }
            else{
                echo 'Enter data properly';
            }
        }
    }
    else{
        echo 'Connection error';
    }
    ?>