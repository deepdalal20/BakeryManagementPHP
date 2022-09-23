

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
                                <input type="radio" name="designation" value="admin"> <label style="color: white; padding-right: 20px">Admin</label>
                                <input type="radio" name="designation" value="Customer"><label style="color: white;">Customer</label>
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
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Attention please!</strong> Your password should be contains 8 characters or more
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }

      if($existalert == true)
      {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Attention please!</strong> Email already taken! Select another email!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    ?>
    </body>
</html> 
