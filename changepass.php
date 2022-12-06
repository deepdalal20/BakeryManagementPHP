<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }   
    $u_id = $_SESSION['logaid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="loginstyle.css">
    <title> Change Password</title>
</head>
<body>
    <center>
        <a href="cust.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
        <h1 style="color: white;"> Seewans Bakery </h1>
    </center>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Change Password</span>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <input type="text" placeholder="Enter your old password" name="oldpass" required>
                    <i class="uil uil-lock icon"></i>
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
                        <input type="submit" value="Reset Password" name="fpass">
                    </div>
                </form>
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
            if(strlen($_POST['fpass1']) >= 8)
            {
                $lpass = $_POST['oldpass']; //Old pssword user
                $pass1 = $_POST['fpass1']; //New Password
                $h_pass = password_hash($pass1, PASSWORD_DEFAULT);
                if(!empty($_POST['fpass']) && !empty($_POST['fpass1']) && !empty($_POST['confpass']))
                {
                    if($_POST['fpass1'] == $_POST['confpass'])
                    {
                        $ch = "SELECT * FROM tbluser where id='$u_id'";
                        $che = mysqli_query($conn, $ch);
                        $row = mysqli_fetch_assoc($che);                        
                        $apass = $row["password"]; //Old password db fetch
                        if(password_verify($lpass, $apass))
                        {
                            $query = "UPDATE `tbluser` SET `password`='$h_pass' WHERE id='$u_id'";
                            $data = mysqli_query($conn, $query);
                            if($data)
                            {
                                echo "<script> alert('Password updated'); </script>";
                                header('location: cust.php');
                            }
                            else
                            {
                                echo "<script> alert('Password not updated'); </script>";
                            }
                        }
                        else
                        {
                            echo "<script> alert('Old password do not match'); </script>";
                        }
                    }
                    else
                    {
                        echo "<script> alert('New Passwords do not match.'); </script>";
                    }
                }
                else
                {
                    echo "<script> alert('Enter all the details'); </script>";
                }
            }
            else
            {
                echo "<script> alert('New Password must be of atleast 8 characters.'); </script>";
            }
        }
    ?>
    </body>
</html>