<?php
require_once("../backend/database.php");
?>
<!DOCTYPE html>

<head>
  <title>Apluz</title>
  <script src="https://kit.fontawesome.com/fae31e57e1.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="icon" href="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/peity/3.3.0/jquery.peity.min.js" integrity="sha512-L5mXjK4YbZPFEuunivJM+SKJG5qxqElc8RlaLDRd1Z5TtDACmugfzIRyFnYSGD4jPYoEMJbXhUJFZsBWDV8yLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="jquery.peity.js"></script>

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
        <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" alt="AdminLTE Logo" class="brand-image rounded-circle elevation-2" style="opacity: .7">
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
              <a href="dashboard.php" id="dashboard" class="nav-link active">
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
              <a href="inventory.php" id="inventory" class="nav-link">
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
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="col" id="content">
        <div id="content-dashboard">
          <div class="row pt-3 px-5">
            <div class="col">
              <div class="small-box bg-gradient-info">
                <div class="inner">
                  <?php
                  $sales = 0;
                  $sql = "SELECT Amount FROM sales";
                  $query = mysqli_query($connection, $sql);
                  //$stocks = mysqli_fetch_assoc($query);
                  while ($row = mysqli_fetch_assoc($query)) {
                    $sales = $sales + $row['Amount'];
                  }
                  ?>
                  <h3><?php echo "₱ " . number_format($sales, 2) ?></h3>
                  <p>Sales</p>
                </div>
                <div class="icon">
                  <i class="fas fa-receipt"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="small-box bg-gradient-maroon">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(*) as stocks FROM product";
                  $query = mysqli_query($connection, $sql);
                  $stocks = mysqli_fetch_assoc($query);
                  ?>
                  <h3><?php echo $stocks['stocks'] ?></h3>
                  <p>Product</p>
                </div>
                <div class="icon">
                  <i class="bi bi-box-seam"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="small-box bg-gradient-purple">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(*) as orders FROM order_table";
                  $query = mysqli_query($connection, $sql);
                  $orders = mysqli_fetch_assoc($query);
                  ?>
                  <h3><?php echo $orders['orders'] ?></h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="row px-5">
            <div class="col">
              <div class="small-box bg-gradient-teal">
              <div div class="inner">
                  <?php
                  $sales = 0;
                  $sql = "SELECT Amount FROM sales";
                  $query = mysqli_query($connection, $sql);
                  //$stocks = mysqli_fetch_assoc($query);
                  while ($row = mysqli_fetch_assoc($query)) {
                    $sales = $sales + $row['Amount'];
                  }
                  ?>
                  <h3><?php echo "₱ " . number_format($sales, 2) ?></h3>
                  <p>Sales</p>
                </div>
                <div class="icon">
                  <i class="bi bi-people"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="small-box bg-gradient-success">
                <div class="inner">
                  <h3>44</h3>
                  <p>This month Sales</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- SELECT
  YEAR(sales_created) AS year,
  MONTH(sales_created) AS month,
  SUM(Amount) AS total_sales
FROM
  sales
WHERE
  YEAR(sales_created) = 2023
GROUP BY
  YEAR(sales_created),
  MONTH(sales_created)
ORDER BY
  year, month; -->

      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card mt-0">
            <div class="row">
              <div class="col-md-6">
                <div class="center text-center mt-2"><span class="line">10,15,8,14,13,10,10</span>
                  <h6>10%</h6>
                </div>
              </div>
              <div class="col-md-6 border-left text-center pt-2">
                <h3 class="mb-0 fw-bold">150</h3>
                <span class="text-muted">New Users</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mt-0">
            <div class="row">
              <div class="col-md-6">
                <div class="center text-center mt-2"><span class="bar">3,5,6,16,8,10,6</span>
                  <h6>-40%</h6>
                </div>
              </div>
              <div class="col-md-6 border-left text-center pt-2">
                <h3 class="mb-0 fw-bold">4560</h3>
                <span class="text-muted">Orders</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mt-0">
            <div class="row">
              <div class="col-md-6">
                <div class="text-center mt-2"><span class="line">12,6,9,23,14,10,17</span>
                  <h6>+60%</h6>
                </div>
              </div>
              <div class="col-md-6 border-left text-center pt-2">
                <h3 class="mb-0 ">5672</h3>
                <span class="text-muted">Active Users</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mt-0">
            <div class="row">
              <div class="col-md-6">
                <div class="text-center mt-2"><span class="bar">12,6,9,23,14,10,13</span>
                  <h6>+30%</h6>
                </div>
              </div>
              <div class="col-md-6 border-left text-center pt-2">
                <h3 class="mb-0 fw-bold">2560</h3>
                <span class="text-muted">Register</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<script>
  $(".line").peity("line");
  $(".bar").peity("bar");

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
</script>