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

<h2> Breads & Buns </h2>
<section id="section-a" class="grid">
  <ul>
        <?php
          $query = "select * from tblproduct where category='Breads and Buns' ";
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

          <h2> Chocolates </h2>
<section id="section-a" class="grid">
  <ul>
        <?php
          include 'dbcon.php';
          $query = "select * from tblproduct where category='Chocolates' ";
          $result= mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result)):
        ?>
            <li>
                <div class="card">
                <img src="<?php echo $row['p_image']; ?>" style="float: right; width: 400; height: 200;">
                  <div class="card-content">
                  <h3> <?php echo $row['p_name']; ?></h3>
                  <p> Price: ₹<?php echo $row['p_price']; ?>/piece </p>
                  <form method="post" action="">
                        Qty: <input type="int" size="2" name="product_quantity" value="1">
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

          <h2> Cakes </h2>
<section id="section-a" class="grid">
  <ul>
        <?php
          include 'dbcon.php';
          $query = "select * from tblproduct where category='Cakes' ";
          $result= mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result)):
        ?>
            <li>
                <div class="card">
                <img src="<?php echo $row['p_image']; ?>" style="float: right; width: 400; height: 200;">
                  <div class="card-content">
                    <h3> <?php echo $row['p_name']; ?></h3>
                    <p> Price: ₹<?php echo $row['p_price']; ?>/100 gram </p>
                    <form method="post" action="">
                      Qty: <input type="int" size="2" name="product_quantity" value="1">
                        <!-- <select name="weight" style="width: 70px; height: 28px;">
                          <option value="0.5">500g</option>
                          <option value="1">1kg</option>
                        </select> -->
                        <input type="hidden" name="product_name" value="<?php echo $row['p_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['p_price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $row['p_image']; ?>">
                        <br><input type="submit" name="add_to_cart" value="Add to Cart">
                        <br><input type="submit" name="add_to_wl" value="Wishlist">
                  </form>          
                  </div>
                </div>
              </li> 
          <?php endwhile; ?>
          </ul>
          </section>

          <?php
            if(isset($_POST['add_to_cart'])){

              $product_name = $_POST['product_name'];
              $product_price = $_POST['product_price'];
              $product_image = $_POST['product_image'];
              $product_quantity = $_POST['product_quantity'];
          
              $select_cart = "SELECT * FROM `tblcart` WHERE crt_name = '$product_name'";
              $scart = mysqli_query($conn, $select_cart);
          
              if(mysqli_num_rows($scart) > 0){
                echo "<script>Product already added</script>";
              }else{
                $insert_product = "INSERT INTO `tblcart`(crt_name, crt_price, crt_qty, crt_image) VALUES('$product_name', '$product_price', '$product_quantity', '$product_image')";
                $icart = mysqli_query($conn, $insert_product);

                if($icart)
                {
                  echo "<script> product added to cart succesfully </script>";
                }
                else
                {
                  echo "Something Went Wrong";
                }
              }
            }

            if(isset($_POST['add_to_wl'])){

              $product_name = $_POST['product_name'];
              $product_price = $_POST['product_price'];
              $product_image = $_POST['product_image'];
          
              $select_cart = "SELECT * FROM `tblwishlist` WHERE wl_name = '$product_name'";
              $scart = mysqli_query($conn, $select_cart);
          
              if(mysqli_num_rows($scart) > 0){
                echo "<script>Product already added</script>";
              }else{
                $insert_product = "INSERT INTO `tblwishlist`(`wl_name`, `wl_price`, `wl_image`) VALUES('$product_name', '$product_price', '$product_image')";
                $icart1 = mysqli_query($conn, $insert_product);

                if($icart1)
                {
                  echo "<script> product added to cart succesfully </script>";
                }
                else
                {
                  echo "Something Went Wrong";
                }
              }
            }

            if(isset($_POST['add_to_cart'])){

              $product_name = $_POST['product_name'];
              $product_price = $_POST['product_price'];
              $product_image = $_POST['product_image'];
              $product_quantity = $_POST['product_quantity'];
              $insert_product = "INSERT INTO `tblord`(u_id, ord_name, ord_price, ord_qty, ord_image) VALUES('$u_id', '$product_name', '$product_price', '$product_quantity', '$product_image')";
              $icart = mysqli_query($conn, $insert_product);
              if($icart)
                {
                  echo "<script> product added to cart succesfully </script>";
                }
              else
                {
                  echo "Something Went Wrong";
                }
              }
          ?>
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>