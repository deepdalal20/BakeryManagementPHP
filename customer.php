<?php
    session_start();
    include 'dbcon.php';
    if(!isset($_SESSION['loguname'])){
        header('location:login.php');
    }    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="staff.css">
    <title>Customer</title>
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./select2/css/select2.min.css">
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a href="admin.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
          <a class="navbar-brand" href="admin.php"><h2>Seewans Bakery</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">Orders Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="category.php"> Category</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="edproduct.php"> Update Products</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="stock.php"> Update Stock</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Customer</a>
              </li>
            </ul>
            <a href="logout.php"><button class="btn btn-outline-warning" type="submit">Logout</button></a>
          </div>
        </div>
</nav>

<div class="card rounded-0 shadow">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Customer Details</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="30%">
                <col width="25%">
                <col width="25%">
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center p-0">ID</th>
                    <th class="text-center p-0">Name</th>
                    <th class="text-center p-0">Email</th>
                    <th class="text-center p-0">Contact</th>
                </tr>
            </thead>
            <tbody>
            <?php 
              $sql = "SELECT * FROM tbluser";
              $data = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($data)):
            ?>
                <tr>
                    <td class="py-0 px-1"><?php echo $row['id']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['name']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['email']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['contact']; ?></td>
                    <th class="text-center py-0 px-1">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm rounded-0 py-0" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a class="dropdown-item delete_data" href="deletecust.php?id=<?php echo $row['id'] ?>">Delete</a></li>
                            </ul>
                        </div>
                    </th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
      <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>