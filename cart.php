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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                  <li><a class="dropdown-item" href="orderhistory.php">Order History</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
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
					<th>Quantity</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
      <?php
          include 'dbcon.php';
          
          $query = "select * from tblcart where u_id = '$u_id'";
          $result= mysqli_query($conn, $query);
          $row1 = mysqli_num_rows($result);
          if($row1 < 1)
          {
          ?>
            <tr>
              <td>Cart is Empty</td>
          </tr>
          <?php
          }
          else
          {
          while($row = mysqli_fetch_assoc($result)):
      ?>
				<tr>
					<td id="name" data-label="Name"><?php echo $row['crt_name'];?></td>
          <td id="image" data-label="image"><img src="<?php echo $row['crt_image'];?>" style="width: 100px; height: 100px;"></td>
					<td id="price" data-label="Price"><?php echo $row['crt_price'];?></td>
          <td id="quntity" data-label="Quantity">
            <form action="updatecrt.php" method="post">
              <?php
                  $query1 = "select * from tblord where u_id = '$u_id'";
                  $result1= mysqli_query($conn, $query1);
                  $row1 = mysqli_fetch_assoc($result1);
              ?>
                <input type="hidden" name="cart_id" value="<?php echo $row['crt_id']; ?>">
                <input type="number" min="1" name="cart_quantity" value="<?php echo $row['crt_qty'];?>">
                <input type="submit" name="update_cart" value="Update" class="option-btn">
            </form>
            <?php
              $total=($row['crt_qty']* $row['crt_price']);
              $grandtotal += $total;
              $_SESSION['gt'] = $grandtotal;
            ?>
					<td id="total" data-label="Total">₹<?php echo $total; ?></td>
          <td> <form method="post" action="removecrt.php">
                <input type="hidden" name="cart_id" value="<?php echo $row['crt_id']; ?>">
                <input type="submit" value="Remove"></a>
            </form>    
          </td>
				</tr>
      <?php 
        endwhile;
      }
      ?>
			</tbody>
		</table>
	</div>
</section>
	<section class="m-remove">
		<div class="main-cart">
			<div class="cart-left">
      <div>
            <a href="product.php"> <input type="submit" value="Return to Shopping"> </a> 
            <br>
          </div>
			</div>
			<div class="cart-right">
				<table class="table1">

					<h2 class="center">Cart total</h2>
					<hr class="carttotals">

					<tbody>
					<tr>
					  <td class="price" data-label="Name">₹<?php echo $grandtotal; ?></td>
					</tr>

					</tbody>
				</table>
        <br>
            <a href="billing.php"> <input type="submit" value="Check Out"> </a>
            <a href="clearcrt.php"> <input type="submit" value="Clear Cart"> </a>
			</div>
		</div>
	</section>     
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>