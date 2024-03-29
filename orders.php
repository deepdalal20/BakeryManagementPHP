<?php
    include 'dbcon.php';
    session_start();
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
    <link rel="stylesheet" href="admin.css">
    <title>Orders</title>
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./select2/css/select2.min.css">
    <script src="./Font-Awesome-master/js/all.min.js"></script>
    <style>
        :root{
            --bs-success-rgb:71, 222, 152 !important;
        }
        html,body{
            height:100%;
            width:100%;
        }
        @media screen{
            body{
                background-size:cover;
                background-repeat:no-repeat;
                background-position:center center;
                backdrop-filter: brightness(0.7);
            }
        }
        main{
            height:100%;
            display:flex;
            flex-flow:column;
        }
        #page-container{
            flex: 1 1 auto; 
            overflow:auto;
        }
        #topNavBar{
            flex: 0 1 auto; 
        }
        .thumbnail-img{
            width:50px;
            height:50px;
            margin:2px
        }
        .truncate-1 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
        .truncate-3 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .modal-dialog.large {
            width: 80% !important;
            max-width: unset;
        }
        .modal-dialog.mid-large {
            width: 50% !important;
            max-width: unset;
        }
        @media (max-width:720px){
            
            .modal-dialog.large {
                width: 100% !important;
                max-width: unset;
            }
            .modal-dialog.mid-large {
                width: 100% !important;
                max-width: unset;
            }  
        
        }
        .display-select-image{
            width:60px;
            height:60px;
            margin:2px
        }
        img.display-image {
            width: 100%;
            height: 45vh;
            object-fit: cover;
            background: black;
        }
        /* width */
        ::-webkit-scrollbar {
        width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f1f1f1; 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #888; 
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #555; 
        }
        .img-del-btn{
            right: 2px;
            top: -3px;
        }
        .img-del-btn>.btn{
            font-size: 10px;
            padding: 0px 2px !important;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a href="#"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
          <a class="navbar-brand" href="#"><h2>Seewans Bakery</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Orders Details</a>
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
                <a class="nav-link" href="customer.php">Customer</a>
              </li>
            </ul>
            <a href="logout.php"><button class="btn btn-outline-warning" type="submit">Logout</button></a>
        </div>
        </div>
</nav>
<div class="card rounded-0 shadow">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Placed Orders</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center p-0">Order ID</th>
                    <th class="text-center p-0">User ID</th>
                    <th class="text-center p-0">Name</th>
                    <th class="text-center p-0">Email</th>
                    <th class="text-center p-0">Address</th>
                    <th class="text-center p-0">City</th>
                    <th class="text-center p-0">State</th>
                    <th class="text-center p-0">Pin</th>
                    <th class="text-center p-0">Total Amount</th>
                    <th class="text-center p-0">Payment ID</th>
                    <th class="text-center p-0">Order Date</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $sql = "SELECT * FROM tblorderdetail";
                $data = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($data);
                if($num > 0)
                {
                while($row = mysqli_fetch_assoc($data)):
            ?>
                <tr>
                    <td class="py-0 px-1"><?php echo $row['od_id']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['u_id']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_name']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_email']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_address']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_city']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_state']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_pin']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_total']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_pay']; ?></td>
                    <td class="py-0 px-1"><?php echo $row['od_date']; ?></td>
                    <td class="py-0 px-1">
                    <div class="btn-group" role="group">
                    <a href="orderby.php?id=<?php echo $row['u_id'];?>"><button  type="button" class="btn btn-primary btn-sm rounded-0 py-0">
                            View
                            </button></a>
                    </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
            <?php
                }
                else
                {
                    ?>
                    <td class="py-0 px-1">No Orders Placed</td>
                    <?php
                }
            ?>
        </table>
    </div>
</div>
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    </body>
</html>
