<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Payment Page </title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="billstyle.css">

</head>
<body>

<div class="container">

    <form action="orderdet.php" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

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

            <div class="col">

                <h3 class="title">payment</h3>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo" name="cname" required>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" name="cnumber" required>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january" name="cmonth" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" name="cyear" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="123" max="3" name="cvv" required>
                    </div>
                </div>
                <?php  
                    $query = "select * from tblcart";
                    $result= mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)):
                        $total=($row['crt_qty']* $row['crt_price']);
                        $grandtotal += $total;
                    endwhile;
                ?>
                <div class="inputBox">
                    <span>Your Total Amount is:</span>
                    <span><?php echo $grandtotal;?> </span>
                    <input type="hidden" value="<?php echo $grandtotal;?>" name="grandtotal">
                </div>
            </div>
        </div>

        <input type="submit" value="proceed to checkout" name="submit" class="submit-btn">
    </form>
    <?php
        if(isset($_POST['submit']))
        {   
            if(strlen($_POST['cvv']) == 3)
            {
                header ('location: orderdet.php');
            }
            else
            {
                echo "Enter CVV precisely";
            }
        }
    ?>

</div>    
    
</body>
</html>