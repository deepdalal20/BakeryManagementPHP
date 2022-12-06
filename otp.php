<?php
  include 'dbcon.php';
?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require('PHPMailer.php');
    require('Exception.php');
    require('SMTP.php');

    $showsuccess = false;
    $showerror = false;

    if (isset($_POST['getotp'])) {
      if(strlen($_POST['contact'])==10)
      {
        if(strlen($_POST['regpass'])>=8)
        {
        $name = $_POST['name'];
        $regemail = $_POST['regemail'];
        $pass = $_POST['regpass'];
        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
        $contact = $_POST['contact'];

        $email = filter_var($regemail, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Enter Valid Email');</script>";
        } else {

            $emailSql = "SELECT * FROM tbluser where email = '$email' ";
            $query = mysqli_query($conn, $emailSql);
            $emailcount = mysqli_num_rows($query);

            if ($emailcount > 0) {
                echo "<script>alert('Email already exists');</script>";
            } else {

                $email = $_POST['regemail'];
                $otp = rand(100000, 999999);

                $mail = new PHPMailer(true);

                try {

                    //Server settings

                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'pateldryfruit55@gmail.com';
                    $mail->Password   = 'smdklbxjrbplrqtg';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;



                    //Recipients
                    $mail->setFrom('20bmiit106@gmail.com', 'Seewans Bakery');
                    $mail->addAddress($email);     //Add a recipient

                    $mail->isHTML(true);
                    //$msg=file_get_contents("beefree-wbrjvkqo22s.php");

                    $mail->Subject = 'Sign Up Verification';

                    $mail->Body    = "Thanks For Registering! <br> Here is the One Time Password for  " . $otp;

                    $mail->MsgHTML = ('h');



                    $mail->send();

                    $sql = "INSERT INTO `tbluser`(`name`, `email`, `password`, `contact`, `otp`, `date`) VALUES ('$name','$regemail','$hash_pass','$contact', '$otp', current_timestamp())";
                    $run = mysqli_query($conn, $sql);
                    if ($run) {
                        echo "<script>alert('Otp Sent to your Email!');</script>";
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
          }
        }
        else
        {
          echo "<script> alert('Enter atlease 8 character password');</script>";
        }
      }
      else
      {
        echo "<script> alert('Enter Valid Contact');</script>";
      }
    }
    ?>
<html>
    <head>
        <link rel="stylesheet" href="form_style.css">
        <title> Register </title>
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
                        <h2>REGISTER</h2>
                        <form action="" method="post">
                            <input type="hidden" class="input-box" value="<?php echo $email;?>" name="regemail">
                            <input type="int" class="input-box" placeholder="Enter OTP" name="regotp" required>
                            <button type="submit" class="submit-btn" name="submit">Submit</button>
                        </form>
                        <a href="login.php"><button type="button" class="btn">I've an account</button></a>
                    </div> 
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/81448a00ad.js" crossorigin="anonymous"></script>
    </body>
</html> 
<?php
    $regerror = false;
    $regsuccess = false;

    if (isset($_POST['submit'])) {
        $regemail = $_POST['regemail'];
        $regotp = $_POST['regotp'];

        $regquery = "SELECT * from tbluser where email='$regemail' and otp ='$regotp'";
        $result = mysqli_query($conn, $regquery);
        $row = mysqli_fetch_array($result);
        $regcount = mysqli_num_rows($result);

        if ($regcount == 1) 
        {
            $aid = $row['id'];
            $aname = $row['name'];
            $aemail = $row['email'];
            $acon = $row['contact'];

            session_start();
            $_SESSION['logaid'] = $aid;
            $_SESSION['loganame'] = $aname;
            $_SESSION['logaemail'] = $aemail;
            $_SESSION['logacon'] = $acon;
            header('location:cust.php');
        } else {
          echo "<script>alert('Invalid OTP! Insert Correct OTP!');</script>";
        }
    }
    ?>