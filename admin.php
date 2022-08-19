<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>Admin/Staff</title>
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./select2/css/select2.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./DataTables/datatables.min.css">
    <script src="./DataTables/datatables.min.js"></script>
    <script src="./select2/js/select2.full.min.js"></script>
    <script src="./Font-Awesome-master/js/all.min.js"></script>
    <script src="./js/script.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a href="index.php"> <img class="btn"  src="seewans.png" alt="" width="72" height="57"> </a>
          <a class="navbar-brand" href="index.php"><h2>Seewans Bakery</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="#">Admin Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edproduct.php"> Edit Products</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="staff.php">Staff</a>
              </li>
            </ul>
          </div>
        </div>
</nav>
        <div class="content py-3">
    <div class="card rounded-0 shadow">
        <div class="card-body">
            <h3>Seewans Bakery</h3>
            <hr>
            <div class="col-12">
                <div class="row gx-3 row-cols-4">
                    <div class="col">
                        <div class="card text-dark">
                            <div class="card-body">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="col-auto pe-1">
                                        <span class="fa fa-th-list fs-3 text-primary"></span>
                                    </div>
                                    <div class="col-auto flex-grow-1">
                                        <div class="fs-8"><b>Available Catrgories</b></div>
                                        <div class="fs-10 text-end fw-bold">
                                            20
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark">
                            <div class="card-body">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="col-auto pe-1">
                                        <span class="fas fa-shopping-bag fs-3 text-secondary"></span>
                                    </div>
                                    <div class="col-auto flex-grow-1">
                                        <div class="fs-8"><b>Products</b></div>
                                        <div class="fs-10 text-end fw-bold">
                                            15
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark">
                            <div class="card-body">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="col-auto pe-1">
                                        <span class="fa fa-file-alt fs-3 text-info"></span>
                                    </div>
                                    <div class="col-auto flex-grow-1">
                                        <div class="fs-8"><b>Total Stocks</b></div>
                                        <div class="fs-10 text-end fw-bold">
                                            20
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-dark">
                            <div class="card-body">
                                <div class="w-100 d-flex align-items-center">
                                    <div class="col-auto pe-1">
                                        <span class="fa fa-coins fs-3 text-warning"></span>
                                    </div>
                                    <div class="col-auto flex-grow-1">
                                        <div class="fs-8"><b>Today's Sales</b></div>
                                        <div class="fs-10 text-end fw-bold">
                                            0
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <h3>Stock Available</h3>
                        <hr>
                        <table class="table table-striped table-hover table-bordered" id="inventory">
                            <colgroup>
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="py-0 px-1">Category</th>
                                    <th class="py-0 px-1">Product Code</th>
                                    <th class="py-0 px-1">Product Name</th>
                                    <th class="py-0 px-1">Available Quantity</th>
                                    <th class="py-0 px-1">Update Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td class="td py-0 px-1">Buns</td>
                                        <td class="td py-0 px-1">001</td>
                                        <td class="td py-0 px-1">Dabeli Buns</td>
                                        <td class="td py-0 px-1">30</td>
                                        <td class="td py-0 px-1 text-end"><a href="#">Restock</a></td>
                                    </tr>
                                    <tr>
                                        <td class="td py-0 px-1">Buns</td>
                                        <td class="td py-0 px-1">002</td>
                                        <td class="td py-0 px-1">Pav Bhaji Buns</td>
                                        <td class="td py-0 px-1">40</td>
                                        <td class="td py-0 px-1 text-end"><a href="#">Restock</a></td>
                                    </tr>
                                    <tr>
                                        <td class="td py-0 px-1">Chocolates</td>
                                        <td class="td py-0 px-1">003</td>
                                        <td class="td py-0 px-1">KitKat</td>
                                        <td class="td py-0 px-1">50</td>
                                        <td class="td py-0 px-1 text-end"><a href="#">Restock</a></td>
                                    </tr>
                                    <tr>
                                        <td class="td py-0 px-1">Cake</td>
                                        <td class="td py-0 px-1">004</td>
                                        <td class="td py-0 px-1">24K Gold Cake</td>
                                        <td class="td py-0 px-1">2</td>
                                        <td class="td py-0 px-1 text-end"><a href="#">Restock</a></td>
                                    </tr>
                                    <tr>
                                        <td class="td py-0 px-1">Cake</td>
                                        <td class="td py-0 px-1">005</td>
                                        <td class="td py-0 px-1">Royal Chocolate</td>
                                        <td class="td py-0 px-1">3</td>
                                        <td class="td py-0 px-1 text-end"><a href="#">Restock</a></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://kit.fontawesome.com/96531cd29f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
  </body>
</html>
