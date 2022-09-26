<?php
    session_start();
    if(!isset($_SESSION['loganame'])){
        header('location:login.php');
    }    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
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
</style>
    <title>Cart</title>
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
                <a class="nav-link" href="profile.php">Profile</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="wishlist.php">Wishlist</a>
              </li> 
              <li class="nav-item">
              <a class="btn btn-outline-light btn-floating m-1 active " aria-current="page" href="#" role="button">
                <i class="fa-solid fa-cart-shopping"></i>
              </a>
              </li>
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
            <a href="logout.php"><button class="btn btn-outline-warning" type="submit">Logout</button></a>
          </div>
        </div>
      </nav>
      <section class="uts">
        <div>
             <h1 class="primary-head">Cart</h1>
        </div>
    </section>
	<section class="m-b-remove">
	<div class="container2">

		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td id="name" data-label="Name">24K Gold Cake</td>
					<td id="price" data-label="Price">₹3000</td>
					<td id="quntity" data-label="Quantity">2</td>
					<td id="total" data-label="Total">₹6000</td>
				</tr>

				<tr>
					<td id="name" data-label="Name">Royal Chocolate Cake</td>
					<td id="price" data-label="Price">₹450</td>
					<td id="quntity" data-label="Quantity">1</td>
					<td id="total" data-label="Total">₹450</td>
				</tr>

				<tr>
					<td id="name" data-label="Name">Amul Chocolate</td>
					<td id="price" data-label="Price">₹50</td>
					<td id="quntity" data-label="Quantity">5</td>
					<td id="total" data-label="Total">₹250</td>
				</tr>

				<tr>
					<td id="name" data-label="Name">Wheat Bread</td>
					<td id="price" data-label="Price">₹50</td>
					<td id="quntity" data-label="Quantity">3</td>
					<td id="total" data-label="Total">₹150</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
	<section class="m-remove">
		<div class="main-cart">
			<div class="cart-left">
      <div>
            <a href="product.php"> <input type="button" value="Return to Shopping"> </a>
            <br>
          </div>

			</div>

			<div class="cart-right">
				<table class="table1">

					<h2 class="center">Cart total</h2>
					<hr class="carttotals">

					<tbody>
						<tr>
							<td class="subtotal" data-label="subtotal">Subtotal</td>
							<td class="price" data-label="price">₹6850</td>
						</tr>

						<tr>
							<td class="subtotal" data-label="S.No">total</td>
							<td class="price" data-label="Name">₹6850</td>
						</tr>

					</tbody>
				</table>
        <br>
        <div>
            <a href="output.php"> <input type="button" value="CheckOut"> </a>
          </div>
			</div>
		</div>
    <div>
            <a href="product.php"> <input type="button" value="Cancel Order"> </a>
            <br>
          </div>

	</section>        
            <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    </body>
    </html>