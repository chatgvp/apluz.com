<?php
require_once("../backend/database.php");
?>
<!DOCTYPE html>

<head>
  <title>Apluz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="icon" href="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script src="https://kit.fontawesome.com/fae31e57e1.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="../style.css">
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
              <a href="inventory.php" id="inventory" class="nav-link">
                <i class="nav-icon fas bi bi-box-seam"></i>
                <p>
                  Inventory
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="orders.php" id="orders" class="nav-link active">
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
      <div class="card">
        <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active position-relative" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                    All
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Pending" type="button" role="tab" aria-controls="Pending" aria-selected="false">Pending
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Approved" type="button" role="tab" aria-controls="Approved" aria-selected="false">Approved
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
    <table id="orders_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Order ID</th>
                  <th>Amount</th>
                  <th>Payment Method</th>
                  <th>Payment status</th>
                  <th>Order Date</th>
                  <th>Delivery status</th>
                  <th>Order Status</th>
                  <th>Delivery date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT DISTINCT order_id, CONCAT(user_table.fname,' ',user_table.lname) as name from order_table, user_table where order_table.user_id = user_table.user_id ORDER BY order_date DESC";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                  $name = $row['name'];
                  $order_id = $row['order_id'];
                  $order_sql = "SELECT * FROM `order_table` WHERE order_id = $order_id";
                  $order_query = mysqli_query($connection, $order_sql);
                  while ($row = mysqli_fetch_assoc($order_query)) {
                    $order_date = $row['order_date'];
                    $order_status = $row['order_status'];
                    $total_price = $row['product_quantity'] * $row['product_price'];
                  }
                  $payment_sql = "SELECT * FROM payment_table WHERE order_id = $order_id";
                  $payment_query = mysqli_query($connection, $payment_sql);
                  while ($row = mysqli_fetch_assoc($payment_query)) {
                    $payment_method = $row['payment_method'];
                    $payment_status = $row['payment_status'];
                  }

                  $delivery_sql = "SELECT delivery_date, delivery_status FROM delivery_table WHERE order_id = $order_id";
                  $delivery_query = mysqli_query($connection, $delivery_sql);
                  while ($row = mysqli_fetch_assoc($delivery_query)) {
                    $delivery_date = $row['delivery_date'];
                    $delivery_status = $row['delivery_status'];
                  }
                ?>
                  <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $order_id ?></td>
                    <td><?php echo $total_price ?></td>
                    <td><?php echo $payment_method ?></td>
                    <?php
                    if (isset($payment_status)) {
                      echo "<td>" . $payment_status . "</td>";
                    } else {
                      echo "<td>pending</td>";
                    }
                    ?>
                    <td><?php echo date('F j, Y, g:i a', strtotime($order_date ));?></td>
                    <?php
                    $delivery_status_sql = "SELECT delivery_status as d_status FROM delivery_table WHERE order_id = $order_id";
                    $delivery_status_query = mysqli_query($connection, $delivery_status_sql);
                    $delivery_status_row = mysqli_fetch_assoc($delivery_status_query);

                    if (!isset($delivery_status_row['d_status'])) {
                      //$delivery_sql = "SELECT delivery_date, delivery_status FROM delivery_table WHERE order_id = $order_id";
                      //$delivery_query = mysqli_query($connection, $delivery_sql);
                      echo "<td>pending</td>";
                    } else {
                      echo "<td>$delivery_status</td>";
                    }
                    ?>
                    <td><?php echo $order_status ?></td>
                    <?php
                    if (isset($delivery_date)) {
                      echo "<td>" . date('F j, Y, g:i a', strtotime($delivery_date)) . "</td>";
                    } else {
                      echo "<td>pending</td>";
                    }
                    ?>
                    <td>
                      <a class="btn btn-primary" href="order.php?id=<?php echo $order_id ?>">view</a>
                    </td>
                  </tr>
                <?php }  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Order ID</th>
                  <th>Amount</th>
                  <th>Payment Method</th>
                  <th>Payment status</th>
                  <th>Order Date</th>
                  <th>Delivery status</th>
                  <th>Order Status</th>
                  <th>Delivery date</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
  </div>
  <div class="tab-pane fade" id="Pending" role="tabpanel" aria-labelledby="Pending-tab">
  <table id="orders_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Order ID</th>
                  <th>Amount</th>
                  <th>Payment Method</th>
                  <th>Payment status</th>
                  <th>Order Date</th>
                  <th>Delivery status</th>
                  <th>Order Status</th>
                  <th>Delivery date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT DISTINCT order_id, CONCAT(user_table.fname,' ',user_table.lname) as name 
                FROM order_table 
                INNER JOIN user_table ON order_table.user_id = user_table.user_id 
                WHERE order_table.order_status = 'pending'
                ORDER BY order_date DESC;
                ";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                  $name = $row['name'];
                  $order_id = $row['order_id'];
                  $order_sql = "SELECT * FROM `order_table` WHERE order_id = $order_id";
                  $order_query = mysqli_query($connection, $order_sql);
                  while ($row = mysqli_fetch_assoc($order_query)) {
                    $order_date = $row['order_date'];
                    $order_status = $row['order_status'];
                    $total_price = $row['product_quantity'] * $row['product_price'];
                  }
                  $payment_sql = "SELECT * FROM payment_table WHERE order_id = $order_id";
                  $payment_query = mysqli_query($connection, $payment_sql);
                  while ($row = mysqli_fetch_assoc($payment_query)) {
                    $payment_method = $row['payment_method'];
                    $payment_status = $row['payment_status'];
                  }

                  $delivery_sql = "SELECT delivery_date, delivery_status FROM delivery_table WHERE order_id = $order_id";
                  $delivery_query = mysqli_query($connection, $delivery_sql);
                  while ($row = mysqli_fetch_assoc($delivery_query)) {
                    $delivery_date = $row['delivery_date'];
                    $delivery_status = $row['delivery_status'];
                  }
                ?>
                  <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $order_id ?></td>
                    <td><?php echo $total_price ?></td>
                    <td><?php echo $payment_method ?></td>
                    <?php
                    if (isset($payment_status)) {
                      echo "<td>" . $payment_status . "</td>";
                    } else {
                      echo "<td>pending</td>";
                    }
                    ?>
                    <td><?php echo date('F j, Y, g:i a', strtotime($order_date ));?></td>
                    <?php
                    $delivery_status_sql = "SELECT delivery_status as d_status FROM delivery_table WHERE order_id = $order_id";
                    $delivery_status_query = mysqli_query($connection, $delivery_status_sql);
                    $delivery_status_row = mysqli_fetch_assoc($delivery_status_query);

                    if (!isset($delivery_status_row['d_status'])) {
                      //$delivery_sql = "SELECT delivery_date, delivery_status FROM delivery_table WHERE order_id = $order_id";
                      //$delivery_query = mysqli_query($connection, $delivery_sql);
                      echo "<td>pending</td>";
                    } else {
                      echo "<td>$delivery_status</td>";
                    }
                    ?>
                    <td><?php echo $order_status ?></td>
                    <?php
                    if (isset($delivery_date)) {
                      echo "<td>" . date('F j, Y, g:i a', strtotime($delivery_date)) . "</td>";
                    } else {
                      echo "<td>pending</td>";
                    }
                    ?>
                    <td>
                      <a class="btn btn-primary" href="order.php?id=<?php echo $order_id ?>">view</a>
                    </td>
                  </tr>
                <?php }  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Order ID</th>
                  <th>Amount</th>
                  <th>Payment Method</th>
                  <th>Payment status</th>
                  <th>Order Date</th>
                  <th>Delivery status</th>
                  <th>Order Status</th>
                  <th>Delivery date</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
  </div>
  <div class="tab-pane fade" id="Approved" role="tabpanel" aria-labelledby="Approved-tab">
  <table id="orders_table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Order ID</th>
                  <th>Amount</th>
                  <th>Payment Method</th>
                  <th>Payment status</th>
                  <th>Order Date</th>
                  <th>Delivery status</th>
                  <th>Order Status</th>
                  <th>Delivery date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT DISTINCT order_id, CONCAT(user_table.fname,' ',user_table.lname) as name 
                FROM order_table 
                INNER JOIN user_table ON order_table.user_id = user_table.user_id 
                WHERE order_table.order_status = 'approved'
                ORDER BY order_date DESC;
                ";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                  $name = $row['name'];
                  $order_id = $row['order_id'];
                  $order_sql = "SELECT * FROM `order_table` WHERE order_id = $order_id";
                  $order_query = mysqli_query($connection, $order_sql);
                  while ($row = mysqli_fetch_assoc($order_query)) {
                    $order_date = $row['order_date'];
                    $order_status = $row['order_status'];
                    $total_price = $row['product_quantity'] * $row['product_price'];
                  }
                  $payment_sql = "SELECT * FROM payment_table WHERE order_id = $order_id";
                  $payment_query = mysqli_query($connection, $payment_sql);
                  while ($row = mysqli_fetch_assoc($payment_query)) {
                    $payment_method = $row['payment_method'];
                    $payment_status = $row['payment_status'];
                  }

                  $delivery_sql = "SELECT delivery_date, delivery_status FROM delivery_table WHERE order_id = $order_id";
                  $delivery_query = mysqli_query($connection, $delivery_sql);
                  while ($row = mysqli_fetch_assoc($delivery_query)) {
                    $delivery_date = $row['delivery_date'];
                    $delivery_status = $row['delivery_status'];
                  }
                ?>
                  <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $order_id ?></td>
                    <td><?php echo $total_price ?></td>
                    <td><?php echo $payment_method ?></td>
                    <?php
                    if (isset($payment_status)) {
                      echo "<td>" . $payment_status . "</td>";
                    } else {
                      echo "<td>pending</td>";
                    }
                    ?>
                    <td><?php echo date('F j, Y, g:i a', strtotime($order_date ));?></td>
                    <?php
                    $delivery_status_sql = "SELECT delivery_status as d_status FROM delivery_table WHERE order_id = $order_id";
                    $delivery_status_query = mysqli_query($connection, $delivery_status_sql);
                    $delivery_status_row = mysqli_fetch_assoc($delivery_status_query);

                    if (!isset($delivery_status_row['d_status'])) {
                      //$delivery_sql = "SELECT delivery_date, delivery_status FROM delivery_table WHERE order_id = $order_id";
                      //$delivery_query = mysqli_query($connection, $delivery_sql);
                      echo "<td>pending</td>";
                    } else {
                      echo "<td>$delivery_status</td>";
                    }
                    ?>
                    <td><?php echo $order_status ?></td>
                    <?php
                    if (isset($delivery_date)) {
                      echo "<td>" . date('F j, Y, g:i a', strtotime($delivery_date)) . "</td>";
                    } else {
                      echo "<td>pending</td>";
                    }
                    ?>
                    <td>
                      <a class="btn btn-primary" href="order.php?id=<?php echo $order_id ?>">view</a>
                    </td>
                  </tr>
                <?php }  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Order ID</th>
                  <th>Amount</th>
                  <th>Payment Method</th>
                  <th>Payment status</th>
                  <th>Order Date</th>
                  <th>Delivery status</th>
                  <th>Order Status</th>
                  <th>Delivery date</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
  </div>
          <h5 class="card-title">Orderss</h5>
          <div class="table-responsive">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- Footer -->
<footer class="shadow-lg mt-5 text-center mt-auto">
  <div class="footer-copyright py-3">© 2022 Copyright:
    <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
  </div>
</footer>
<script>
//   $(document).ready(function() {
//    $('#orders_table').DataTable();

//     //$("#cart_table_body").load("cart.php")
//     // $('#cart_icon').load("cart_table_count.php")
//   })

    $(document).ready(function() {
        $('#orders_table').DataTable({
        "order": [[0, "desc"]],
        "columnDefs": 
            [{
                "type": "date-dd-mmm-yyyy",
                "targets": 0
            }]
        });
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
</script>
<div class="modal fade" id="cart_modal">
  <div class="modal-dialog modal-xl modal-dialog-centered" id="cart_table_body">
  </div>
</div>