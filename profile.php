<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }    
    $sname = $_SESSION['loganame'];
    $u_id = $_SESSION['logaid'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="staff.css">
    <title>Customer Profile</title>
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
                <a class="nav-link" href="product.php">Product</a>
              </li>  
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                My Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item active " aria-current="page" href="#">Profile</a></li>
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
<div class="container">
        <div class="Blank">

        </div>
        <div class="Profile">
            <div class="profile">
                <div class="left">
                    <div class="lefttop">
                        <div class="editprofile">
                            <h2>Profile</h2>
                        </div>
                    </div>
                    <?php 
                        $sql = "SELECT * FROM tbluser WHERE id='$u_id'";
                        $data = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($data);
                    ?>
                    <div class="inputleft">
                        <label for="">Name</label>
                        <h4><?php echo $row['name']; ?></h4>
                        <label for="">Email</label>
                        <h4><?php echo $row['email']; ?></h4>
                    </div>
                    <div class="lastbtn">
                      <a href="cust.php"><input type="submit" class="editbtn" value="Return To Home"></a>
                    </div>
                </div>
                <div class="right">

                    <div class="lefttop">                     
                       
                    </div>

                    <div class="inputright">
                        <label for="">Contact</label>
                        <h4><?php echo $row['contact']; ?></h4>
                        <label for="">Account Created on:</label>
                        <h4><?php echo $row['date']; ?></h4>
                    </div>
                    <div class="editprofile">
                        <div class="lastbtn">
                          <a href="logout.php"><input type="submit" class="editbtn" value="Logout"></a>
                        </div>
                    </div>

                </div>
            </div>

      <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>