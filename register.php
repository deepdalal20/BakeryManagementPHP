<?php
  include 'dbcon.php';
  $invaliduser = false;
  $invalidadmin = false;
  $passworderr = false;
  $showalert = false;
  $login = false;
  $exists = false;
  $existalert = false;
    if(strlen($_POST['regpass']) >= 8)
    {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $regpass = $_POST["regpass"];
      $contact = $_POST["contact"];
      
      $existssql = "select * from tbluser where email = '$email'";
      $existresult = mysqli_query($conn, $existssql);
      $numrows = mysqli_num_rows($existresult);

      if($exists == false)
      {
        $sql = "INSERT INTO `tbluser`(`name`, `email`, `password`, `contact`, `date`) VALUES ('$name','$email','$regpass','$contact',current_timestamp())";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            session_start();
            $_SESSION['loguname'] = $name;
            header("location: cust.php");
        }
      }
      else
      {
        echo "Account already exists";
      }
    }
    else
    {
      echo "Password must be of 8 or more characters";
    }
?>