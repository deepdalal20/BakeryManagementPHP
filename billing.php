<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }    
    $u_id = $_SESSION['logaid']; 
    $gt = $_SESSION['gt'];
    $name= $_SESSION['loganame'];
    $email = $_SESSION['logaemail'];
    $con = $_SESSION['logacon'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shipping Details Page </title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="billstyle.css">

</head>
<body>

<div class="container">

    <form action="" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">Shipping Details</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="john deo" name="bname" required>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com" name="bemail" required>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality" name="baddress" required>
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="mumbai" name="bcity" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="india" name="bstate" required>
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456" name="pincode" required>
                    </div>
                </div>
            </div>

        </div>

        <input type="submit" value="proceed to checkout" name="submit" class="submit-btn">
    </form>
    <?php
        if(isset($_POST['submit']))
        {   
                $_SESSION['oname'] = $_POST['bname'];
                $_SESSION['oemail'] = $_POST['bemail'];
                $_SESSION['oadd'] = $_POST['baddress'];
                $_SESSION['ocity'] = $_POST['bcity'];
                $_SESSION['ostate'] = $_POST['bstate'];
                $_SESSION['ozipcode'] = $_POST['pincode'];
                header ('location: pay.php');
        }
    ?>

</div>    
    
</body>
</html>