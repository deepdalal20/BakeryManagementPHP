<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }    
    $u_id = $_SESSION['logaid'];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Products</title>
  <style>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #333;
    color: #fff;
    font-size: 1.1em;
    line-height: 1.5;
    text-align: center;
  }
      #section-a {
    padding: 2em 1em 1em;
  }
  
  #section-a ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  #section-a li {
    margin-bottom: 1em;
    background: #fff;
    color: #333;
  }
  
  .card-content {
    padding: 1.5em;
  }
  
  #main-footer {
    padding: 1em;
    background: #000;
    color: #fff;
    text-align: center;
  }
  
  #main-footer a {
    color: #2690d4;
    text-decoration: none;
  }
  
  @media (min-width: 700px) {
    .grid {
      display: grid;
      grid-template-columns: 1fr repeat(2, minmax(auto, 25em)) 1fr;
    }
  
    .content-wrap,
    #section-a ul {
      grid-column: 2/4;
    }
  
    .box,
    #main-footer div {
      grid-column: span 2;
    }
  
    #section-a ul {
      display: flex;
      justify-content: space-around;
    }
  
    #section-a li {
      width: 31%;
    }
    input[type=submit] {
  background-color: #fa9200;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
}
  }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="cust.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
    <a class="navbar-brand" href="cust.php"><h2>Seewans Bakery</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="cust.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus1.php">AboutUs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="#">Product</a>
              </li>  
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                My Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                  <li><a class="dropdown-item" href="orderhistory.php">Order History</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>              
            </ul>
      <a class="btn btn-outline-warning" href="cart.php" role="button">
                <i class="fa-solid fa-cart-shopping"></i>
              </a>
    </div>
  </div>
</nav>

<?php
  $query = "select * from tblcategory";
  $result1= mysqli_query($conn, $query);
  while($row1 = mysqli_fetch_assoc($result1)):
?>
<section id="section-a" class="grid">
<h2> <?php $cat = $row1['c_name']; echo $cat; ?> </h2>
  <ul>
        <?php
          $query = "select * from tblproduct where category='$cat' ";
          $result= mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result)):
        ?>
            <li>
                <div class="card">
                <img src="<?php echo $row['p_image']; ?>" style="float: right; width: 400; height: 200;">
                  <div class="card-content">
                    <h3> <?php echo $row['p_name']; ?></h3>
                    <p> Price: ₹<?php echo $row['p_price']; ?>/dozens </p> 
                    <form method="post" action="">
                        Qty: <input type="int" size="2" name="product_quantity" value="1">
                        <input type="hidden" name="product_id" value="<?php echo $row['p_id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $row['p_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['p_price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $row['p_image']; ?>">
                        <br><input type="submit" name="add_to_cart" value="Add to Cart">
                        <br><input type="submit" name="add_to_wl" value="Wishlist">
                  </form>   
                  <br>   
                  </div>
                </div>
              </li>
        <?php endwhile; ?>
          </ul>
          </section>
          <?php endwhile; ?>

          <?php
            if(isset($_POST['add_to_cart']))
            {
              $product_id = $_POST['product_id'];
              $product_name = $_POST['product_name'];
              $product_price = $_POST['product_price'];
              $product_image = $_POST['product_image'];
              $product_quantity = $_POST['product_quantity'];
              if($product_quantity <= 0)
              {
                echo "<script> alert('Product Quantity must be greater than 0'); </script>";
              }
              else
              {
                $stock = "SELECT * FROM `tblstock` WHERE p_id = '$product_id'";
                $stockcheck = mysqli_query($conn, $stock);
                $row = mysqli_fetch_assoc($stockcheck);
                $st = $row['avl_stock'];
                if($product_quantity <= $st)
                {
                    $select_cart = "SELECT * FROM `tblcart` WHERE u_id = '$u_id'";
                    $scart = mysqli_query($conn, $select_cart);
                    $row = mysqli_fetch_assoc($scart);
                    $pr = $row['crt_name'];
                
                    if($product_name == $pr)
                    {
                      echo "<script>alert('Product already added');</script>";
                    }
                    else
                    {
                      $insert_product = "INSERT INTO `tblcart`(p_id, u_id, crt_name, crt_price, crt_qty, crt_image) VALUES('$product_id', '$u_id', '$product_name', '$product_price', '$product_quantity', '$product_image')";
                      $icart = mysqli_query($conn, $insert_product);

                      if($icart)
                      {
                        echo "";
                      }
                      else
                      {
                        echo "<script> alert('Some Error Occured'); </script>";
                      }
                    }
                  }
                  else
                  {
                    echo "<script> alert('Not Enough Stock'); </script>";
                  }
              }
            }

            if(isset($_POST['add_to_wl'])){

              $product_name = $_POST['product_name'];
              $product_price = $_POST['product_price'];
              $product_image = $_POST['product_image'];
          
              $select_cart = "SELECT * FROM `tblwishlist` WHERE u_id = '$u_id'";
              $scart = mysqli_query($conn, $select_cart);
              $row = mysqli_fetch_assoc($scart);
              $pr = $row['wl_name'];
          
              if($product_name == $pr){
                echo "<script> alert('Product already added'); </script>";
              }else{
                $insert_product = "INSERT INTO `tblwishlist`(`u_id`, `wl_name`, `wl_price`, `wl_image`) VALUES('$u_id', '$product_name', '$product_price', '$product_image')";
                $icart1 = mysqli_query($conn, $insert_product);

                if($icart1)
                {
                  echo "Product added to Wishlist succesfully";
                }
                else
                {
                  echo "<script> alert('Some Error Occured'); </script>";
                }
              }
            }

            
          ?>
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>