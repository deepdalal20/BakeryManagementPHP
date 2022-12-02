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

require('config.php');
require('razorpay-php/Razorpay.php');

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$price = $gt;
$customername = $name;
$contactno = $con;
$orderData = [
    'receipt'         => 3456,
    'amount'          => $price * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Seewans Bakery",
    "description"       => "A Bakery Shop",
    "image"             => "seewans.png",
    "prefill"           => [
    "name"              => $customername,
    "email"             => $email,
    "contact"           => $contactno,
    ],
    "notes"             => [
    "address"           => "Surat",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
?>

<html>
    <head>
        <title>
            Razor Pay
        </title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div>
            <a href="cust.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
            <h1 style="color: white;"> Seewans Bakery </h1>
        </div>
                <div class="form login">
                    <form action="verify.php" method="POST">
                    <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="<?php echo $data['key']?>"
                        data-amount="<?php echo $data['amount']?>"
                        data-currency="INR"
                        data-name="<?php echo $data['name']?>"
                        data-image="<?php echo $data['image']?>"
                        data-description="<?php echo $data['description']?>"
                        data-prefill.name="<?php echo $data['prefill']['name']?>"
                        data-prefill.email="<?php echo $data['prefill']['email']?>"
                        data-prefill.contact="<?php echo $data['prefill']['contact']?>"
                        data-notes.shopping_order_id="3456"
                        data-order_id="<?php echo $data['order_id']?>"
                        <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
                        <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
                    >
                    </script>
                    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                    <input type="hidden" name="shopping_order_id" value="3456">
                    </form>
                </div>
    </body>
</html>