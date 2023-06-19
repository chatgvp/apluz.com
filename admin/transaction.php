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
              <a href="transaction.php" id="" class="nav-link active">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 p-3 border border-secondary">
                <h4>Order History</h4>
                <div style="height: 300px; overflow-y: scroll;">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM transaction WHERE action LIKE '%order%' OR action LIKE '%Order%' ORDER BY transaction_id DESC;

           
                        ";
                        $query = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $action = $row['action'];
                            $date = $row['date_time'];
                        ?>
                            <tr>
                            <td><?php echo $action ?></td>
                            <td><?php echo $date ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-3 border border-secondary">
            <h4>Inventory History</h4>
                <div style="height: 300px; overflow-y: scroll;">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM transaction WHERE action LIKE '% stocked In%' OR 
                        action LIKE '%stocked out%' OR action LIKE '%product%' ORDER BY transaction_id DESC;          
                        ";
                        $query = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $action = $row['action'];
                            $date = $row['date_time'];
                        ?>
                            <tr>
                            <td><?php echo $action ?></td>
                            <td><?php echo $date ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-3 border border-secondary">
                <h4>User History</h4>
                <div style="height: 300px; overflow-y: scroll;">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM transaction WHERE action LIKE '%User%' AND action LIKE '%has been added%' ORDER BY transaction_id DESC;
           
                        ";
                        $query = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $action = $row['action'];
                            $date = $row['date_time'];
                        ?>
                            <tr>
                            <td><?php echo $action ?></td>
                            <td><?php echo $date ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-3 border border-secondary">
                <h4>Supplier History</h4>
                <div style="height: 300px; overflow-y: scroll;">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * FROM transaction 
                        WHERE action LIKE '%Supplier%' 
                        AND (action LIKE '%has been added%' OR action LIKE '%has been updated%') 
                        ORDER BY transaction_id DESC;
                        ;
           
                        ";
                        $query = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $action = $row['action'];
                            $date = $row['date_time'];
                        ?>
                            <tr>
                            <td><?php echo $action ?></td>
                            <td><?php echo $date ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Action</th>
                <th>Date</th>
                </tr>
            </thead>
                <tbody>
                <?php
                $sql = "SELECT *
                        FROM transaction
                        ORDER BY transaction_id DESC            
                ";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                $action = $row['action'];
                $date = $row['date_time'];
                ?>
                        <tr>
                        <td><?php echo $action ?></td>
                        <td><?php echo $date ?></td>
                        </tr>
                <?php
                }
                ?>
                </tbody>
            </table>

    </div>

</body>
<footer class="shadow-lg mt-5 text-center mt-auto">
    <div class="footer-copyright py-3">© 2022 Copyright:
        <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
    </div>
</footer>
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

    // $(document).ready(function() {
    //     $('.table').DataTable();
    // });

</script>