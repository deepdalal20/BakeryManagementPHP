<?php
include 'dbcon.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="form_style.css">
        
        <title>Login</title>
    </head>
    <body>
    <?php
    $login = false;
    $loggedin = false;
    $notexist = false;
    $notselected = false;
    if (isset($_POST['logsub'])) {
        $lemail = $_POST['logemail'];
        $lpass = $_POST['logpass'];
        
        if ($_POST['designation'] == "customer") {
            $sql = "SELECT * FROM 'tbluser' WHERE email='$lemail'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (password_verify($lpassword, $row['password'])) {
                        $login = true;
                        $loguname = $row['name'];
                    }
                }
            } else {
                $notexist = "User Not Exist! Register First!";
            }
            if ($login == true) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['loguname'] = $name;
                header("location: cust.php");
            }
            if ($notexist) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> ' . $notexist . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        } else if ($_POST['role'] == "admin") {
            $sql = "select * from tblstaff where semail='$lemail'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (password_verify($lpassword, $row['spassword'])) {
                        $admin = true;
                        $loganame = $row['sname'];
                    }
                }
            } else {
                $adminnotexist = "Admin Not Exist! Contact Admin!";
            }

        }
        if ($admin) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['loganame'] = $loganame;
            header("location: admin.php");
          }
        if ($adminnotexist) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> ' . $adminnotexist . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }



    
    ?>
<div class="banner">
    <center>
        <a href="index.php"> <img class="btn"  src="seewans.png" width="72" height="57"> </a>
        <h1 style="color: white;">Seewans Bakery</h1>
    </center>
        <div class="container">
            <div class="card">
                <div class="inner-box" id="card">
                    <div class="card-front">
                        <h2>LOGIN</h2>
                        <form action="" method="post">
                            <center>
                            <select style="width: 90px; height: 30px; text-align: center; background-color: #7d2ae8; color: white; font-size: 14px; border-radius: 5px 5px 5px 5px;" name="designation">                               
                                    <option  hidden> designation</option>
                                    <option  value="admin"> Admin </option>
                                    <option  value="customer"> Customer </option>
                                </select>
                            </center>
                            <br>
                            <input type="email" class="input-box" placeholder="Your Email Id " name="logemail" required>
                            <input type="password" class="input-box" placeholder="Password " name="logpass" required>
                            <input type="checkbox" name="reme"><span>Remember Me</span>
                            <button type="submit" class="submit-btn" name="logsub">Submit</button>  
                        </form>
                        <a href="register.php"><button type="button" class="btn">I'm New Here</button></a>
                        <a href="">Forgot Password</a>
                    </div>  
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/81448a00ad.js" crossorigin="anonymous"></script>
    </body>
</html> 