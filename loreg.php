<?php
  include 'dbcon.php';
  $invaliduser = false;
  $invalidadmin = false;
  $passworderr = false;
  $showalert = false;
  $login = false;
  $exists = false;
  $existalert = false;
  if(isset($_POST['regsub']))
  { 
    if(strlen($_POST['regpass']) >= 8)
    {
        $name = $_POST['name'];
        $regemail = $_POST['regemail'];
        $pass = $_POST['pass'];
        $hash_pass = password_hash($regpass, PASSWORD_DEFAULT);
        $contact = $_POST['contact'];
      
      $existssql = "select * from tbluser where email = '$regemail'";
      $existresult = mysqli_query($conn, $existssql);
      $numrows = mysqli_num_rows($existresult);
      if($numrows > 0)
      {
        $exists = true;
      }
      else
      {
        $exists = false;
      }

      if($exists == false)
      {
        $sql = "INSERT INTO `tbluser`(`name`, `email`, `password`, `contact`, `date`) VALUES ('$name','$regemail','$hash_pass','$contact',current_timestamp())";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
          $showalert = true;
        }
      }
      else
      {
        $existalert = true;
      }
    }
    else
    {
      $passworderr = true;
    }
  }
?>
<?php
  $loggedin = false;
  if(isset($_POST['Lsub']))
  {
    if($_POST['designation'] == "customer")
    {
      $loguname = $_POST['loguname'];
      $logpass = $_POST['logpass'];
      $query = "SELECT * FROM `tbluser` WHERE roll='customer' AND (username='$loguname' AND password='$logpass')";
      $res = mysqli_query($conn, $query);
      $num = mysqli_num_rows($res);
      if ($num >= 1)
      {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['loguname'] = $name;
        header('location: cust.php');
      }
      else
      {
        $invaliduser = true;
      }
    }
    else if($_POST['designation'] == "admin")
    {
      $loguname = $_POST['loguname'];
      $logpass = $_POST['logpass'];
      $query = "SELECT * FROM `tbluser` WHERE roll='admin' AND (username='$loguname' AND password='$logpass')";
      $res = mysqli_query($conn, $query);
      $num = mysqli_num_rows($res);
      if ($num >= 1)
      {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['loguname'] = $loguname;
        header("location: admin.php");
      }
      else
      {
        $invalidadmin = true;
      }
    }
  }

?>
<html>
    <head>
        <link rel="stylesheet" href="form_style.css">
    </head>
    <body>
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
                                <input type="radio" id="Admin" name="designation"> <label style="color: white; padding-right: 20px">Admin</label>
                                <input type="radio" id="Customer" name="designation" value="Customer"><label style="color: white;">Customer</label>
                            </center>
                            <br>
                            <input type="email" class="input-box" placeholder="Your Email Id " name="logemail" required>
                            <input type="password" class="input-box" placeholder="Password " name="logpass" required>
                            <input type="checkbox" name="reme"><span>Remember Me</span>
                            <button type="submit" class="submit-btn" name="logsub">Submit</button>  
                        </form>
                        <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                        <a href="">Forgot Password</a>
                    </div>
                    <div class="card-back">
                        <h2>REGISTER</h2>
                        <form action="" method="post">
                            <input type="text" class="input-box" placeholder="Name" name="name" required>
                            <input type="email" placeholder="Email" class="input-box" name="regemail" required>
                            <input type="password" class="input-box" placeholder="Password" name="regpass" required>
                            <input type="int" class="input-box" placeholder="Contact Number" name="contact" required>
                            <input type="checkbox" name="reme"><span>Remember Me</span>
                            <button type="submit" class="submit-btn" name="regsub">Submit</button>
                        </form>
                        <button type="button" class="btn" onclick="openLogin()">I've an account</button>
                    </div>
                </div>
            </div>
        </div>
<script>
    var card = document.getElementById("card");

    function openRegister(){
        card.style.transform="rotateY(-180deg)";
    }

    function openLogin(){
        card.style.transform="rotateY(0deg)";
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/81448a00ad.js" crossorigin="anonymous"></script>
    <?php
      if($showalert == true)
      {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['loguname'] = $name;
        header('location: cust.php');
      }

      if($passworderr == true)
      {
        echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Your password should be contains 6 characters or more</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }

      if($invaliduser == true)
      {
        echo '
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>User Not Found!</strong>Please Register First!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }

      if($invalidadmin == true)
      {
        echo '
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Admin Not Found!</strong>Please Contact Admin!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }

      if($existalert == true)
      {
        echo '
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Username already taken!</strong>Select another username!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }
    ?>
    </body>
</html> 
