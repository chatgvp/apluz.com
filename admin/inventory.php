<?php
require_once('../backend/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="icon" href="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script src="https://kit.fontawesome.com/fae31e57e1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Apluz-Inventory</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user me-2"></i> My Account</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-gear me-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" id="logout" class="dropdown-item">
                        <i class="fas fa-arrow-right-from-bracket me-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    <!-- /.navbar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-3" data-sidebarbg="skin3">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link">
        <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .7">
        <span class="brand-text font-weight-light">Apluz</span>
      </a>

      <!-- Sidebar -->
      <div class="control-sidebar-slide">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../uploads/avatar-1.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="dashboard.php" id="dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="sales.php" id="sales" class="nav-link">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                  Sales
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="inventory.php" id="inventory" class="nav-link active">
                <i class="nav-icon fas bi bi-box-seam"></i>
                <p>
                  Inventory
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="orders.php" id="orders" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Orders
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="customers.php" id="customers" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="supplier.php" id="customers" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Suppliers
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="transaction.php" id="" class="nav-link">
              <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                  Transaction
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <div class="col-12">
            <div class="col mt-4">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
                        <div class="item">
                            <a href="#" class="card card-hover text-decoration-none" style="background-color: #3498db;">
                                <div class="card-body text-white text-center">
                                    <?php
                                    $sql = "SELECT * FROM product";
                                    $query = mysqli_query($connection, $sql);
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <p class="card-title text-center text-shadow-1">
                                        <h1><?php echo $count ?></h1>
                                    </p>
                                    <p class="text-center">Total Product</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
                        <div class="item ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#lowstock" class="card card-hover text-decoration-none" style="background-color: #F0FFFF;">
                                <div class="card-body text-white text-center">
                                    <?php
                                    $sql = "SELECT * FROM product WHERE product_quantity <= 20";
                                    $query = mysqli_query($connection, $sql);
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <p class="card-title text-center text-shadow-1">
                                        <h1 class="text-black"><?php echo $count ?></h1>
                                    </p>
                                    <p class="text-center text-black">Low Stock</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
                        <div class="item ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#outstock" class="card card-hover text-decoration-none" style="background-color: #2c3e50;">
                                <div class="card-body text-white text-center">
                                    <?php
                                    $sql = "SELECT category.category_id, category.category_name
                                    FROM category
                                    LEFT JOIN product ON category.category_id = product.category_id
                                    GROUP BY category.category_id
                                    HAVING COUNT(product.product_id) = 0";
                                    $query = mysqli_query($connection, $sql);
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <p class="card-title text-center text-shadow-1">
                                        <h1><?php echo $count ?></h1>
                                    </p>
                                    <p class="text-center">Out of Stock</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
                        <div class="item ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#MostStock" class="card card-hover text-decoration-none" style="background-color: #7fb3d5;">
                                <div class="card-body text-white text-center">
                                    <?php
                                    $sql = "SELECT * FROM product WHERE product_quantity >= 100";
                                    $query = mysqli_query($connection, $sql);
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <p class="card-title text-center text-shadow-1">
                                        <h1><?php echo $count ?></h1>
                                    </p>
                                    <p class="text-center">Most Stock</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
                        <div class="item ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#MostStock" class="card card-hover text-decoration-none" style="background-image: linear-gradient(to bottom right, #849B5C, #BFFFC7);">
                                <div class="card-body text-dark text-center">
                                    <?php
                                    $sql = "SELECT * FROM product WHERE product_quantity >= 100";
                                    $query = mysqli_query($connection, $sql);
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <p class="card-title text-center text-shadow-1">
                                    <h1 class="text-white"><?php echo $count ?></h1>
                                    </p>
                                    <p class="text-center text-white">Most Stock</p>
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        <div class="pt-3">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#add_modal">
                    <i class="bi bi-plus-circle"></i> Add new Item
                </button>
                <button type="button" class="btn btn-outline-primary mr-2" data-bs-toggle="modal" data-bs-target="#category_modal">
                    <i class="bi bi-plus-circle"></i> Add Category
                </button>
                <button type="button" class="btn btn-info mr-2" data-bs-toggle="modal" data-bs-target="#stockin_modal">
                    <i class="bi bi-plus-circle"></i> Stock In
                </button>
                <button type="button" class="btn btn-dark mr-2" data-bs-toggle="modal" data-bs-target="#stockout_modal">
                    <i class="bi bi-plus-circle"></i> Stock Out
                </button>
            </div>

          <br><br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Inventory</h5>
              <div class="table-responsive">
                <table id="inventory_table" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>category</th>
                      <th>description</th>
                      <th>specs</th>
                      <th>quantity</th>
                      <th>price</th>
                      <th>Functions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT 
                    product.category_id, 
                    product.product_id, 
                    product.product_quantity, 
                    product.product_image,
                    product.product_name,
                    category.category_name, 
                    product.product_description, 
                    product.product_specs, 
                    product.product_price,
                    supplier.supplier_name
                  FROM 
                    category 
                    INNER JOIN product ON category.category_id = product.category_id 
                    INNER JOIN supplier ON product.supplier_id = supplier.supplier_id;
                  ";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $supplier_name = $row['supplier_name'];
                      $product_id = $row['product_id'];
                      $product_image = $row['product_image'];
                      $product_name = $row['product_name'];
                      $product_price = $row['product_price'];
                      $product_quantity = $row['product_quantity'];
                      $category_name = $row['category_name'];
                      $category_id = $row['category_id'];
                      $product_description = $row['product_description'];
                      $product_specs = $row['product_specs'];
                    ?>
                      <tr>
                        <td><?php echo $product_id ?></td>
                        <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product_image) . '" alt="image" style="height:100px;width:100px;"/>'; ?></td>
                        <td><?php echo $product_name ?></td>
                        <td><?php echo $category_name ?></td>
                        <td><?php echo $product_description ?></td>
                        <td><?php echo $product_specs ?></td>
                        <td><?php echo $product_quantity ?></td>
                        <td><?php echo number_format($product_price, 2) ?></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary" data-bs-toggle="dropdown"><i class="bi bi-gear"></i> Option</button>
                            <ul class="dropdown-menu">
                              <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update_modal" 
                              data-product_id="<?php echo $product_id ?>" 
                              data-product_name="<?php echo $product_name ?>" 
                              data-product_description="<?php echo $product_description ?>"
                              data-product_specs="<?php echo $product_specs ?>"
                              data-product_price="<?php echo $product_price ?>"
                              data-product_quantity="<?php echo $product_quantity ?>" 
                              data-category_name="<?php echo $category_name ?>" 
                              data-category_id="<?php echo $category_id ?>" 
                              data-supplier_name="<?php echo $supplier_name ?>" 
                              id="update_product">Update</button></li>
                              <li><button class="dropdown-item" data-product_id="<?php echo $product_id ?>" data-product_name="<?php echo $product_name ?>" id="delete_product">Delete</button></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</body>
<footer class="shadow-lg mt-5 text-center mt-auto">
  <div class="footer-copyright py-3">© 2022 Copyright:
    <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
  </div>
</footer>

</html>

<!----------------------------------------------------------Add product Modal------------------------------------------------------->
<div class="modal fade" id="add_modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Add new item</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="add_form">
        <div class="row">
            <div class="col">
                <div class="form-outline mb-3 mt-3">
                    <label for="product_supplier" class="form-label">Supplier</label>
                    <select name="item_supplier" class="form-select" id="product_supplier">
                        <?php
                        $sql = "SELECT supplier_id, supplier_name FROM supplier";
                        $query = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                        $category_id = $row['supplier_id'];
                        $category_name = $row['supplier_name'];
                        ?>
                        <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
          <div class="form-floating mb-3 mt-3">
            <input type="text" id="product_name" placeholder=" " class="form-control" />
            <label for="product_name">Product Name</label>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3 mt-3">
                <input type="number" id="product_price" placeholder=" " class="form-control" />
                <label for="product_price">Product price </label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3 mt-3">
                <input type="number" id="product_quantity" placeholder=" " class="form-control" />
                <label for="product_price">Product Quantity </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-outline mb-3 mt-3">
                <label for="product_category" class="form-label">Category</label>
                <select name="item_category" class="form-select" id="product_category">
                  <?php
                  $sql = "SELECT category_id, category_name FROM category";
                  $query = mysqli_query($connection, $sql);
                  while ($row = mysqli_fetch_assoc($query)) {
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                  ?>
                    <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="product_image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="product_image">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="product_description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Specs</label>
            <textarea class="form-control" id="product_specs" rows="3"></textarea>
          </div>
        </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal" id="add_product"><i class="bi bi-plus-circle"></i> Add</button>
      </div>

    </div>
  </div>
</div>
<!----------------------------------------------------------Add category Modal------------------------------------------------------->
<div class="modal fade" id="category_modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Add new item</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-floating mb-3 mt-3">
          <input type="text" id="category_name" placeholder=" " class="form-control" />
          <label for="category_name">Add Category</label>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="add_category"><i class="bi bi-plus-circle"></i> Add</button>
      </div>

    </div>
  </div>
</div>
<!----------------------------------------------------------stockin Modal------------------------------------------------------->
<div class="modal fade" id="stockin_modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Stock in</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="form-outline mb-3 mt-3">
                        <label for="product_supplier" class="form-label">Select Supplier</label>
                        <select name="item_supplier" class="form-select" id="product_supplier">
                            <option value="3">--------Select Supplier--------</option>
                            <?php
                            $sql = "SELECT supplier_id, supplier_name FROM supplier";
                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                            $supplier_id = $row['supplier_id'];
                            $supplier_name = $row['supplier_name'];
                            ?>
                            <option value="<?php echo $supplier_id ?>"><?php echo $supplier_name ?></option>
                            <?php
                            }
                            ?>

                        </select>
                        <div id="product_data">
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var supplier_id;
                $(document).on("change", "#product_supplier", function() {
                    supplier_id = $(this).val();
                    $.ajax({
                    url: "../backend/fetch_stockin.php",
                    method: "POST",
                    data: { supplier_id: supplier_id },
                    success: function(data) {
                        var products = JSON.parse(data);
                        var table = "<table class='table table-bordered table-striped mt-5'>";
                        table +=
                        "<thead class='thead-dark'><tr><th>Product Name</th><th>Product ID</th><th>Product quantity</th><th>Product price</th><th>Stock In</th></tr></thead><tbody>";

                        for (var i = 0; i < products.length; i++) 
                        {
                            table += "<tr>";
                            table += "<td>" + products[i].product_name + "</td>";
                            table += "<td>" + products[i].product_id + "</td>";
                            table += "<td>" + products[i].product_quantity + "</td>";
                            table += "<td> $" + products[i].product_price + "</td>";
                            table +=
                                "<td><input type='number' class='form-control stockIn' data-product-id='" +
                                products[i].product_id +
                                "'></td>";
                            table += "</tr>";
                        }
                        table += "</tbody></table>";
                        $("#product_data").html(table);
                    }
                    });
                });
                $(document).on("click", "#add_stock", function()
                {
                    var products = {};
                    $(".stockIn").each(function() 
                    {
                        var productId = $(this).data("product-id");
                        var stockIn = $(this).val();
                        if(stockIn == '')
                        {
                            stockIn = 0;
                        }
                        products[productId] = stockIn;
                    });
                    console.log(products);
                    // console.log(supplier_id);
                    if (Object.keys(products).length === 0) {
                        console.log("products object is empty");
                    } else {
                        $.ajax({
                            url: "../backend/stock.php",
                            method: "POST",
                            data: { products, type: "stockin", supplier_id: supplier_id },
                            success: function(data) {
                                console.log(data)
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: false,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Product Updated Successfully'
                                })
                                setInterval('refreshPage()', 1500);
                            }
                        });
                    }
                });
            });
        </script>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="add_stock"><i class="bi bi-plus-circle"></i> Stock In</button>
      </div>

    </div>
  </div>
</div>
<!----------------------------------------------------------stockout Modal------------------------------------------------------->
<div class="modal fade" id="stockout_modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>Stock out</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="product_supplier">Select Supplier</label>
                <select name="item_supplier" class="form-select" id="product_supplier_stockout">
                <option value="">--------Select Supplier--------</option>
                <?php
                $sql = "SELECT supplier_id, supplier_name FROM supplier";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $supplier_id = $row['supplier_id'];
                    $supplier_name = $row['supplier_name'];
                ?>
                <option value="<?php echo $supplier_id ?>"><?php echo $supplier_name ?></option>
                <?php
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Reasons (optional)" id="stockout_reason">
            </div>
            <div id="product_data_stockout"></div>
        </div>
        <script>
            $(document).ready(function() {
                var supplier_id;
                $(document).on("change", "#product_supplier_stockout", function() {
                    supplier_id = $(this).val();
                    // const supplier_id = $(this).val();
                    $.ajax({
                    url: "../backend/fetch_stockin.php",
                    method: "POST",
                    data: { supplier_id: supplier_id },
                    success: function(data) {
                        var products = JSON.parse(data);
                        var table = "<table class='table table-bordered table-striped mt-5'>";
                        table +=
                        "<thead class='thead-dark'><tr><th>Product Name</th><th>Product ID</th><th>Product quantity</th><th>Product price</th><th>Stock Out</th></tr></thead><tbody>";

                        for (var i = 0; i < products.length; i++) 
                        {
                            table += "<tr>";
                            table += "<td>" + products[i].product_name + "</td>";
                            table += "<td>" + products[i].product_id + "</td>";
                            table += "<td>" + products[i].product_quantity + "</td>";
                            table += "<td> $" + products[i].product_price + "</td>";
                            table +=
                                "<td><input type='number' class='form-control stockOut' data-product-id='" +
                                products[i].product_id +
                                "'></td>";
                            table += "</tr>";
                        }
                        table += "</tbody></table>";
                        $("#product_data_stockout").html(table);
                    }
                    });
                });
                $(document).on("click", "#add_stock_out", function()
                {
                    var reason = $("#stockout_reason").val();
                    var products = {};
                    console.log(reason)
                    $(".stockOut").each(function() 
                    {
                        // var productId = $(this).data("product-id");
                        // var stockOut = $(this).val();
                        // products[productId] = stockOut;
                        var productId = $(this).data("product-id");
                        var stockOut = $(this).val();
                        if(stockOut == '')
                        {
                            stockOut = 0;
                        }
                        products[productId] = stockOut;
                    });
                    if (Object.keys(products).length === 0) {
                        console.log("products object is empty");
                    } else {
                        $.ajax({
                            url: "../backend/stock.php",
                            method: "POST",
                            data: { products, type: "stockout", supplier_id: supplier_id, reason: reason },
                            success: function(data) {
                                // console.log(data)
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: false,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Product Updated Successfully'
                                })
                                setInterval('refreshPage()', 1500);
                            }
                        });
                    }
                });
            });
        </script>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal" id="add_stock_out"><i class="bi bi-plus-circle"></i> Stock out</button>
      </div>

    </div>
  </div>
</div>

<!----------------------------------------------------------Update Modal------------------------------------------------------->
<div class="modal fade" id="update_modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><b>update item</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="row">
            <div class="col">
                <div class="form-outline mb-3 mt-3">
                    <label for="update_product_supplier" class="form-label">Supplier</label>
                    <select name="item_supplier" class="form-select" id="update_product_supplier" disabled>
                        <option value="" id="update_supplier_name"></option>
                    </select>
                </div>
            </div>
        </div>
        <input type="hidden" id="update_product_id">
        <div class="form-floating mb-3 mt-3">
          <input type="text" id="update_product_name" placeholder=" " class="form-control" disabled/>
          <label for="product_name">Product Name</label>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3 mt-3">
              <input type="number" id="update_product_price" placeholder=" " class="form-control"/>
              <label for="product_price">Product price </label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3 mt-3">
              <input type="number" id="update_product_quantity" placeholder=" " class="form-control" disabled/>
              <label for="product_price">Product Quantity </label>
            </div>
          </div>
        </div>
        <div class="form-outline mb-3 mt-3">
          <label for="product_category" class="form-label" >Category</label>
          <select name="item_category" class="form-select" id="update_product_category" disabled>
            <?php
            $sql = "SELECT category_id, category_name FROM category";
            $query = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
              $category_id = $row['category_id'];
              $category_name = $row['category_name'];
            ?>
              <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <form>
          <div class="form-group">
            <label for="product_image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="update_product_image" disabled>
          </div>
        </form>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Description</label>
          <textarea class="form-control" id="update_product_description" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Specs</label>
          <textarea class="form-control" id="update_product_specs" rows="3"></textarea>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="update_product_button"><i class="bi bi-plus-circle"></i> Update</button>
      </div>

    </div>
  </div>
</div>

<!--------------------------------------- lOW Stcok ---------------------------------------------------->
<div class="modal" id="lowstock">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <?php
        $sql = "SELECT * FROM product WHERE product_quantity <= 20";
        $query = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($query);
        ?>
        <h4 class="modal-title">Out of Stock (<?php echo $count ?>)</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-striped" id="inventory_table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>category</th>
              <th>quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT product.category_id, product_id, product_quantity, product_name,category_name
                    FROM category INNER JOIN product ON category.category_id = product.category_id WHERE  product_quantity <= 20";
            $query = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
              $product_id = $row['product_id'];
              $product_name = $row['product_name'];
              $product_quantity = $row['product_quantity'];
              $category_name = $row['category_name'];
              $category_id = $row['category_id'];
            ?>
              <tr>
                <td><?php echo $product_id ?></td>
                <td><?php echo $product_name ?></td>
                <td><?php echo $category_name ?></td>
                <td><?php echo $product_quantity ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!--------------------------------------- Out of Stock ---------------------------------------------------->
<div class="modal" id="outstock">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <?php
        $sql = "SELECT category.category_id, category.category_name
        FROM category
        LEFT JOIN product ON category.category_id = product.category_id
        GROUP BY category.category_id
        HAVING COUNT(product.product_id) = 0;
        ";
        $query = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($query);
        ?>
        <h4 class="modal-title">Out of Stock (<?php echo $count ?>)</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <table class="table table-striped" id="inventory_table">
  <thead>
    <tr>
      <th>Category</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT category.category_id, category.category_name
              FROM category
              LEFT JOIN product ON category.category_id = product.category_id
              GROUP BY category.category_id
              HAVING COUNT(product.product_id) = 0;";
      $query = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($query)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
    ?>
      <tr>
        <td><?php echo $category_name ?></td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--------------------------------------- Most Stock ---------------------------------------------------->
<div class="modal" id="MostStock">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <?php
        $sql = "SELECT * FROM product WHERE product_quantity > 100";
        $query = mysqli_query($connection, $sql);
        $count = mysqli_num_rows($query);
        ?>
        <h4 class="modal-title">Most Stock (<?php echo $count ?>)</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-striped" id="inventory_table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>category</th>
              <th>quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT product.category_id, product_id, product_quantity, product_name,category_name
                    FROM category INNER JOIN product ON category.category_id = product.category_id WHERE  product_quantity > 100";
            $query = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
              $product_id = $row['product_id'];
              $product_name = $row['product_name'];
              $product_quantity = $row['product_quantity'];
              $category_name = $row['category_name'];
              $category_id = $row['category_id'];
            ?>
              <tr>
                <td><?php echo $product_id ?></td>
                <td><?php echo $product_name ?></td>
                <td><?php echo $category_name ?></td>
                <td><?php echo $product_quantity ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#inventory_table').DataTable();
  });
  $(document).on('click', '#logout', function() {
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Logging out',
      text: 'Please wait...',
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
    }).then(
      function() {
        window.location.href = "logout.php";
      }
    )
  })
  $(document).on('click', '#add_product', function() {
    event.preventDefault();
    var supplier_id = $("#product_supplier").val();
    var product_name = $("#product_name").val();
    var product_price = $("#product_price").val();
    var product_quantity = $("#product_quantity").val();
    var product_category = $("#product_category").val();
    var product_image = $("#product_image").val();
    var product_description = $("#product_description").val();
    var product_specs = $("#product_specs").val();
    var fdadd = new FormData();
    var product_image = $('#product_image')[0].files;
    if (product_image.length > 0) {
      fdadd.append("product_image", product_image[0])
      fdadd.append("product_name", product_name)
      fdadd.append("supplier_id", supplier_id)
      fdadd.append("product_price", product_price)
      fdadd.append("product_quantity", product_quantity)
      fdadd.append("product_category", product_category)
      fdadd.append("product_description", product_description)
      fdadd.append("product_specs", product_specs)
    } else {
      alert("error occured")
    }

    console.log(fdadd)
    Swal.fire({
      title: 'Are you sure you want to add ' + product_name,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Add it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "../backend/add_product.php",
          data: fdadd,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            console.log(data)
            if (data == "error") {
              alert("error occured")
              return false;
            } else {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: false,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                icon: 'success',
                title: 'Product Added Successfully'
              })
              setInterval('refreshPage()', 1500);
            }
          }
        });
      }
    })
  });
  $(document).on('click', '#update_product', function() {
    var product_id = $(this).data('product_id');
    var product_name = $(this).data('product_name');
    //var product_image = $(this).data('product_image');
    var supplier_name = $(this).data('supplier_name');
    var product_description = $(this).data('product_description');
    var product_specs = $(this).data('product_specs');
    var product_price = $(this).data('product_price');
    var product_quantity = $(this).data('product_quantity');
    var category_name = $(this).data('category_name');
    var category_id = $(this).data('category_id');
    $("#update_supplier_name").text(supplier_name);
    $("#update_product_id").val(product_id);
    $("#update_product_name").val(product_name);
    $("#update_product_quantity").val(product_quantity);
    $("#update_product_description").val(product_description);
    $("#update_product_specs").val(product_specs);
    $("#update_product_price").val(product_price);
    $("#update_product_category").val(category_id);
  });
  $(document).on('click', '#update_product_button', function() {
    var product_id = $("#update_product_id").val();
    var product_name = $("#update_product_name").val();
    var product_price = $("#update_product_price").val();
    var product_quantity = $("#update_product_quantity").val();
    var product_category = $("#update_product_category").val();
    var product_description = $("#update_product_description").val();
    var product_specs = $("#update_product_specs").val();
    var fdupdate = new FormData();
    var product_image = $('#update_product_image')[0].files;
    fdupdate.append("product_id", product_id)
    fdupdate.append("product_name", product_name)
    fdupdate.append("product_price", product_price)
    fdupdate.append("product_quantity", product_quantity)
    fdupdate.append("product_category", product_category)
    fdupdate.append("product_description", product_description)
    fdupdate.append("product_specs", product_specs)
    if (product_image.length > 0) {
      fdupdate.append("product_image", product_image[0])
    }
    Swal.fire({
      title: 'Are you sure you want to update ' + product_name + '?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Update it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "../backend/update_product.php",
          data: fdupdate,
          cache: false,
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: false,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })
            Toast.fire({
              icon: 'success',
              title: 'Product Updated Successfully'
            })
            setInterval('refreshPage()', 1500);
          }
        });
      }
    })

  })
  $(document).on('click', '#delete_product', function() {
    var product_id = $(this).data('product_id');
    var product_name = $(this).data('product_name');
    var values = {
      "product_id": product_id
    }
    Swal.fire({
      title: 'Are you sure you want to delete ' + product_name + '?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        delete_product(values)
      }
    })
  });

  function delete_product(values) {
    $.ajax({
      type: "POST",
      url: "../backend/delete_product.php",
      data: values,
      cache: false,
      success: function(data) {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: false,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })
        Toast.fire({
          icon: 'success',
          title: 'Product Deleted Successfully'
        })
        setInterval('refreshPage()', 1500);
      }
    });
  }

  function refreshPage() {
    location.reload(true);
  }
  $(document).on('click', '#add_category', function() {
    var category_name = $("#category_name").val();
    check_category(category_name)

  });

  function check_category(category_name) {
    var values = {
      "category_name": category_name
    }
    $.ajax({
      type: "POST",
      url: "../backend/category_exist.php",
      data: values,
      cache: false,
      success: function(data) {
        if (data == "success") {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: false,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          Toast.fire({
            icon: 'warning',
            title: 'Category Already Exist'
          })
          setInterval('refreshPage()', 1500);
        }
        if (data == "invalid") {
          $.ajax({
            type: "POST",
            url: "../backend/add_category.php",
            data: values,
            cache: false,
            success: function(data) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: false,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                icon: 'success',
                title: 'Category Added Successfully'
              })
              setInterval('refreshPage()', 1500);
            }
          });
        }
      }
    });
  }
</script>