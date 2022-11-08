<?php
    include 'dbcon.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="loginstyle.css">
    <title> Forget Password</title>
</head>
<body>
    <center>
        <a href="index.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
        <h1 style="color: white;"> Seewans Bakery </h1>
    </center>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Forget Password</span>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <input type="email" placeholder="Enter your email" name="femail" required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                        <input type="password" class="password" placeholder="Enter new password" name="fpass1" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm new password" name="confpass" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Login" name="fpass">
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
    <?php
        if(isset($_POST['fpass']))
        {
            if(!empty($_POST['femail']))
            {
                $email = $_POST['femail'];
                $pass1 = $_POST['fpass1'];
                $h_pass = password_hash($pass1, PASSWORD_DEFAULT);

                $ch = "SELECT * FROM tbluser WHERE email = '$email'";
                $che = mysqli_query($conn, $ch);
                $check = mysqli_num_rows($che); 

                if($check > 0)
                {
                    if($_POST['fpass1'] == $_POST['confpass'])
                    {
                        $query = "UPDATE `tbluser` SET `password`='$h_pass' WHERE email='$email'";
                        $data = mysqli_query($conn, $query);
                        if($data)
                        {
                            header('location: login.php');
                        }
                        else
                        {
                            echo "Password not updated";
                        }
                    }
                    else
                    {
                        echo "Password Not Match";
                    }
                }
                else
                {
                    echo "User not found";
                }
            }  
            else
            {
                echo "Please enter the email";
            } 
        }
    ?>
    </body>
</html>