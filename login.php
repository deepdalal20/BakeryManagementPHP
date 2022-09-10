<?php
  $loggedin = false;
  if(isset($_POST['Lsub']))
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
        $_SESSION['loguname'] = $loguname;
        header("location: cust.php");
      }
      else
      {
        echo "Error";
      }
  }
?>
<?php
      if($showalert == true)
      {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registered Successful!</strong> Now you can Login!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
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