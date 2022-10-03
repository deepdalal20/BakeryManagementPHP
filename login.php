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
            if(!empty($_POST['logemail']) && !empty($_POST['logpass']))
            {
                    $lemail = $_POST['logemail'];
                    $lpass = $_POST['logpass'];

                    $query = "SELECT * FROM tbluser where email='$lemail'";
                    $query2 = "SELECT * FROM tblstaff where semail='$lemail'";

                    if($resultuser = mysqli_query($conn, $query))
                    {
                        $row = mysqli_fetch_assoc($resultuser);
                        $aemail = $row["email"];
                        $apass = $row["password"];
                        $aname = $row["name"];
                        if($lemail == $aemail && password_verify($lpass, $apass))
                        {
                            $_SESSION['loganame'] = $aname;
                            header('location:cust.php');
                            if(isset($_POST['reme']))
                            {
                                setcookie("Email", $lemail, time()+60*60*24);
                                setcookie("Pass", $lpass, time()+60*60*24);
                            }
                        }
                        else if($resultstaff = mysqli_query($conn, $query2))
                        {
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
                        else{
                            echo '<script>alert("Something went wrong")</script>';
                        }
                    }    
                }
            else{
                echo 'Enter data precisely.';
            }
        }
    }
    else{
        echo 'Connection error';
    }
    ?>
    <script>
        const container = document.querySelector(".container"),
            pwShowHide = document.querySelectorAll(".showHidePw"),
            pwFields = document.querySelectorAll(".password");

        pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })
    </script>
    </body>
</html>