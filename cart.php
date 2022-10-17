<?php
    include 'dbcon.php';
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
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
            <a class="btn btn-outline-warning active " aria-current="page" href="#" role="button">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
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
          <th>Image</th>
					<th>Price</th>
					<th colspan=2>Quantity</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
      <?php
          include 'dbcon.php';
          $query = "select * from tblcart";
          $result= mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result)):
          $total = $_POST['crt_price']*$_POST['crt_qty'];
      ?>
				<tr>
					<td id="name" data-label="Name"><?php echo $row['crt_name'];?></td>
          <td id="image" data-label="image"><img src="<?php echo $row['crt_image'];?>" style="width: 100px; height: 100px;"></td>
					<td id="price" data-label="Price"><?php echo $row['crt_price'];?></td>
					<td id="quntity" data-label="Quantity"><?php echo $row['crt_qty'];?></td>
          <td> adkf </td>
					<td id="total" data-label="Total">₹ <?php echo $total; ?></td>
				</tr>
      <?php endwhile; ?>
			</tbody>
		</table>
	</div>
</section>
	<section class="m-remove">
		<div class="main-cart">
			<div class="cart-left">
      <div>
            <a href="product.php"> <input type="submit" value="Return to Shopping"> </a> 
            <input type="submit" value="Update Cart">
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
            <a href="output.php"> <input type="submit" value="Check Out"> </a>
            <form method="post">
              <input type="submit" name="delete_all" value="Clear Cart" class="button">
            </form>
			</div>
		</div>
	</section>  
  <?php
  if(isset($_POST['update_update_btn'])){
     $update_value = $_POST['update_quantity'];
     $update_id = $_POST['update_quantity_id'];
     $update_quantity_query = mysqli_query($conn, "UPDATE `tblcart` SET crt_qty = '$update_value' WHERE tbl_id = '$update_id'");
     if($update_quantity_query){
        header('location: cart.php');
     };
  };
  
  if(isset($_GET['remove'])){
     $remove_id = $_GET['remove'];
     mysqli_query($conn, "DELETE FROM `tblcart` WHERE crt_id = '$remove_id'");
     header('location: cart.php');
  };
  
  if(isset($_POST['delete_all'])){
     mysqli_query($conn, "DELETE FROM `tblcart`");
     header('location:cart.php');
  }
?>      
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>