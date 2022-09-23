<?php
session_start();
include 'dbcon.php';
$loggedin = false;
if (isset($_SESSION['loggedin'])) {
    $loggedin = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="loginstyle.css">
    <title> Login/Register </title>
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
                    <select style="text-align: center; background-color: #ffa500; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="des">                               
                            <option  hidden> Select Designation</option>
                            <option  value="admin"> Admin </option>
                            <option  value="customer"> Customer </option>
                     </select>
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
        $loggedin = false;
        $notselected = false;
        if (isset($_SESSION['loggedin'])) {
            $loggedin = true;
        }

        if (isset($_POST['logsub'])) {
            $lemail = $_POST['logemail'];
            $lpass = $_POST['logpass'];
            $login = false;
            $notexist = false;

            if ($_POST['des'] == "customer") {
                $sql = "SELECT * FROM `tbluser` WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num == 1) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (password_verify($lpass, $row['password'])) {
                            $login = true;
                            $loguname = $row['name'];
                        }
                    }
                } else {
                    $notexist = "User Not Exist! Register First!";
                }
                if ($login) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['loguname'] = $loguname;
                    header("location: cust.php");
                }
                if ($notexist) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ' . $notexist . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            } else if ($_POST['des'] == "admin") {
                $sql = "SELECT * FROM `tblstaff` WHERE semail='$lemail'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num == 1) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (password_verify($lpassword, $row['spassword'])) {
                            $admin = true;
                            $loguname = $row['sname'];
                        }
                    }
                } else {
                    $adminnotexist = "Admin Not Exist! Contact Admin!";
                }

                if ($admin) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['loguname'] = $loguname;
                    header("location: admin.php");
                }
                if ($adminnotexist) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ' . $notexist . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
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
                        }
                        else
                        {
                            pwField.type = "password";

                            pwShowHide.forEach(icon =>{
                                icon.classList.replace("uil-eye", "uil-eye-slash");
                            })
                        }
                    }) 
                })
            })
    </script>
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>    
    </body>
</html>
