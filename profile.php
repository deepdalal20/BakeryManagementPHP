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
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="#">Profile</a>
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
<div class="container">
        <div class="Blank">

        </div>

        <div class="Profile">
            <div class="profile">
                <div class="left">

                    <div class="lefttop">

                        <div class="editprofile">
                            <h2>Customer Profile</h2>
                        </div>
                    </div>

                    <div class="inputleft">
                        <label for="">First Name</label>
                        <input type="text">
                        <label for="">Email Address</label>
                        <input type="email">
                    </div>

                </div>
                <div class="right">

                    <div class="lefttop">                     
                       
                    </div>

                    <div class="inputright">
                        <label for="">Last Name</label>
                        <input type="text">
                        <label for="">Contact No</label>
                        <input type="email">
                    </div>

                    
                    <div class="editprofile">
                        <div class="lastbtn">
                            <button class="editbtn">Edit profile</button>
                        </div>
                    </div>

                </div>
            </div>

      <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>
</html>