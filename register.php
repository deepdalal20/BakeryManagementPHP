<?php
  include 'dbcon.php';
  if(!empty($_POST['name']) && !empty($_POST['regemail']) && !empty($_POST['regpass']) && !empty($_POST['contact']))
    {
      if(filter_var($_POST['regemail'], FILTER_VALIDATE_EMAIL))
      {
        if(is_numeric($_POST['contact']))
        {
          if(strlen($_POST['contact']) == 10)
              {
                  $name = $_POST['name'];
                  $regemail = $_POST['regemail'];
                  $pass = $_POST['pass'];
                  $hash_pass = password_hash($regpass, PASSWORD_DEFAULT);
                  $contact = $_POST['contact'];

                  $query = "INSERT INTO `tbluser`(`name`, `email`, `password`, `contact`, `date`) VALUES ('$name','$regemail','$hash_pass','$contact',current_timestamp())";

                  if($result = mysqli_query($conn, $query))
                  {
                      session_start();
                      $_SESSION['loguname'] = $name;
                      header('location: cust.php');
                  }
                  else
                  {
                      echo "Insertion Error";
                  }
              }
              else
              {
                  echo "Contact no can only be of 10 digit";
              }
        }
        else
        {
            echo "Enter valid contact number";
        }
      }
      else
      {
          echo "Enter valid Email";
      }
    }
    else
    {
        echo "Enter details properly";
    }
?>