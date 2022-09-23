<?php
   session_start();

   if(!isset($_SESSION['loguname']))
   {
      header("location: loreg.php");
   }
   else
   {
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
    input[type=button] {
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
              <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="wishlist.php">Wishlist</a>
              </li> 
              <li class="nav-item">
              <a class="btn btn-outline-light btn-floating m-1" href="cart.php" role="button">
                <i class="fa-solid fa-cart-shopping"></i>
              </a>
              </li>
              
            </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
      <a href="index.php"><button class="btn btn-outline-warning" type="submit">Logout</button></a>
    </div>
  </div>
</nav>

<h2> Breads & Buns </h2>
<section id="section-a" class="grid">
  <ul>
        <?php
          include 'dbcon.php';
          $query = "select * from tblproduct where category='Breads and Buns' ";
          $result= mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result)):
        ?>
            <li>
                <div class="card">
                <img src="<?php echo $row['p_image']; ?>" style="float: right; width: 400; height: 200;">
                  <div class="card-content">
                    <h3 class="card-title"> <?php echo $row['p_name']; ?></h3>
                    <form method="post">
                        <input type="text" size="8" placeholder="Quantity" style="height: 30px; font-size=10px;">
                  </form>      
                  <br>
                    <p> Price: ₹<?php echo $row['p_price']; ?>/dozens </p>    
                  </div>
                  <input type="button" value="Add to Cart">
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
                    <h3 class="card-title"> <?php echo $row['p_name']; ?></h3>
                    <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 30px; font-size=10px;">
                  </form>      
                  <br>
                    <p> Price: ₹<?php echo $row['p_price']; ?>/piece </p>    
                  </div>
                  <input type="button" value="Add to Cart">
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
                    <h3 class="card-title"> <?php echo $row['p_name']; ?></h3>
                    <form method="post">
                        <input type="text" size="8" placeholder="quantity" style="height: 30px; font-size=10px;">
                        <select name="weight" style="width: 70px; height: 28px;">
                        <option value="500g">500g</option>
                        <option value="1kg">1kg</option>
              </select>
                  </form>      
                  <br>
                    <p> Price: ₹<?php echo $row['p_price']; ?>/kg </p>    
                  </div>
                  <input type="button" value="Add to Cart">
                </div>
              </li> 
        <?php endwhile; ?>
          </ul>
          </section>
        <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <?php
   }
?>
</body>
</html>