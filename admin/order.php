<?php
require_once("../backend/database.php");
//$delivery_status = 0;
// $payment_amount = 0;
//   $payment_method = 0;
//   $payment_status = 0;
$order_id = $_GET['id'];
$order_table_sql = "SELECT * FROM `order_table` WHERE order_id = $order_id";
$order_table_query = mysqli_query($connection, $order_table_sql);
while ($row = mysqli_fetch_assoc($order_table_query)) {
  $user_id = $row['user_id'];
  $order_id = $row['order_id'];
  $product_id = $row['product_id'];
  $product_price = $row['product_price'];
  $product_quantity = $row['product_quantity'];
  $order_date = $row['order_date'];
  $order_status = $row['order_status'];
}

$payment_table_sql = "SELECT * FROM `payment_table` WHERE order_id = $order_id";
$payment_table_query = mysqli_query($connection, $payment_table_sql);
while ($row = mysqli_fetch_assoc($payment_table_query)) {
  $payment_id = $row['user_id'];
  $payment_amount = $row['payment_amount'];
  $payment_method = $row['payment_method'];
  $payment_status = $row['payment_status'];
}

$delivery_sql = "SELECT * FROM `delivery_table` WHERE order_id = $order_id";
$delivery_query = mysqli_query($connection, $delivery_sql);
while ($row = mysqli_fetch_assoc($delivery_query)) {
  $delivery_id = $row['delivery_id'];
  $delivery_date = $row['delivery_date'];
  $delivery_status = $row['delivery_status'];
  $courier_name = $row['courier_name'];
  $courier_number = $row['courier_number'];
}
$user_id_sql = "SELECT * FROM `user_table` WHERE user_id = $user_id";
$user_id_query = mysqli_query($connection, $user_id_sql);
while ($row = mysqli_fetch_assoc($user_id_query)) {
  $fname = $row['fname'];
  $lname = $row['lname'];
  $user_id = $row['user_id'];
  $username = $row['username'];
  $email = $row['email'];
  $contactNum = $row['contactNum'];
  $address = $row['address'];
}
?>
<!DOCTYPE html>

<head>
  <title>Apluz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/fae31e57e1.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="icon" href="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="sales.php">Sales</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sales Details</li>
        </ol>
      </nav>
      <div class="container" id="content">
        <div class="row mt-5">
          <b class="bg-light p-3">Shipping Details</b>
          <div class="col-5">
            <?php
            if ($order_status == "pending") {
              echo "<p><b>Status:</b> <span class='text-warning'> $order_status</span></p>";
            } else {
              echo "<p><b>Status:</b> <span class='text-success'> $order_status</span></p>";
            }
            ?>
            <p><b>Billed to:</b> <?php echo $fname . " " . $lname ?></p>
            <p><b>Contact Number:</b> <?php echo $contactNum ?></p>
            <p><b>Email:</b> <?php echo $email ?></p>
            <p><b>Address:</b> <?php echo $address ?></p>
          </div>
          <div class="col-4">
            <?php
            if ($payment_method == "Cash on Delivery") {
              echo "<p><b>Payment Method :</b><span> $payment_method</span></p>";
            } 
            elseif (!isset($payment_method))
            {
                echo "<p><b>Payment Method :</b><span> pending</span></p>";
            }
            else {
              echo "<p><b>Payment Method :</b><span> $payment_method</span></p>";
            }
            if ($payment_status == "paid") {
              echo "<p><b>Payment status: </b><span class='text-success'> $payment_status</span></p>";
            }
            if ($payment_status == "pending") {
              echo "<p><b>Payment status: </b><span class='text-warning'> $payment_status</span></p>";
            }
            ?>
            <p><b>Order #:</b><span> <?php echo $order_id ?></span></p>
            <p><b>Order Date:</b><span> <?php echo date('F j, Y', strtotime($order_date)); ?></span></p>
            <?php
            if (!isset($delivery_status)) {
              echo "<p><b>Delivery status:</b><span class='text-warning'> pending</span></p>";
            }
            if (isset($delivery_status) && $delivery_status == "shipping") {
              echo "<p><b>Delivery status:</b><span class='text-warning'> $delivery_status</span></p>";
            }
            if (isset($delivery_status) && $delivery_status != "shipping") {
              echo "<p><b>Delivery status:</b><span class='text-success'> $delivery_status</span></p>";
            }
            if (!isset($delivery_date)) {
              echo "<p><b>Estimated Delivery Date:</b><span class='text-warning'> pending</span></p>";
            } else {
              $deldate = date('F j, Y', strtotime($delivery_date));
              echo "<p><b>Estimated Delivery Date:</b><span class='text-success'> $deldate</span></p>";
            }
            ?>
          </div>
          <div class="col">
          


          <?php if(!isset($delivery_status)) { ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Delivery_modal" id="#d_modal">
                    Schedule Delivery
                </button>
            <?php } else { ?>
                <div class="border border-secondary border-2 rounded p-3 mb-3">
                    <p><b>Courier Name:</b> <?php echo $courier_name ?></p>
                    <p><b>Courier Number:</b> <?php echo $courier_number ?></p>
                </div>
            <?php } ?>

<div class="modal fade" id="Delivery_modal" tabindex="-1" aria-labelledby="Delivery_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Delivery_modalLabel">Delivery</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>Modal body text goes here.</p>
            <form>
          <div class="mb-3">
            <label for="courierName" class="form-label">Courier Name</label>
            <input type="text" class="form-control" id="courierName" placeholder="Enter courier name">
          </div>
          <div class="mb-3">
            <label for="courierNumber" class="form-label">Courier Number</label>
            <input type="number" class="form-control" id="courierNumber" placeholder="Enter courier number">
          </div>
        </form>
        <div class="mb-3">
            <label for="courierName" class="form-label">Estimated Delivery Date</label>
            <input type="date" class="form-control" id="date">
            <br><br><br>
            <!-- <button class="btn btn-success btn-sm" style="float:right;" id="submit">Submit</button> -->
        </div>
            <!-- <div id="div_date">
                
                <input type="date" class="form-control" id="date">
                    <br><br><br>
                    <button class="btn btn-success btn-sm" style="float:right;" id="submit">Submit</button>
                </div> -->
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submit">Save changes</button>
      </div>
    </div>
  </div>
</div>



            <br><br>
            
          </div>
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-2 text-center">
                    <div class="timeline-dot">
                    <span class="fa-stack fa-md">
                        <i class="fas fa-circle fa-stack-2x text-primary" id="process"></i>
                        <i class="fas fa-store fa-stack-1x fa-inverse"></i>
                    </span>
                    </div>
                    <p class="mt-3 mb-0">Processing/Packing</p>
                    </div>
                    <div class="col-md-1 text-center">
                    <hr class="timeline-line">
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="timeline-dot">
                            <span class="fa-stack fa-md">
                                <i class="fas fa-circle fa-stack-2x" id="shipping"></i>
                                <i class="fas fa-truck fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                    <p class="mt-3 mb-0">Shipping</p>
                    </div>
                    <div class="col-md-1 text-center">
                    <hr class="timeline-line">
                    </div>
                    <div class="col-md-2 text-center">
                    <div class="timeline-dot">
                        <span class="fa-stack fa-md">
                            <i class="fas fa-circle fa-stack-2x"  id="delivered"></i>
                            <i class="fas fa-check fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <p class="mt-3 mb-0">Delivered</p>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
          <b class="bg-light p-3">Items</b>
          <table class="table " id="inventory_table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total_price = 0;
              $total_quantity = 0;
              $sql = "SELECT product_name, order_table.product_price, SUM(order_table.product_quantity) AS total_quantity
              FROM order_table
              JOIN product ON order_table.product_id = product.product_id
              WHERE order_id = $order_id
              GROUP BY product.product_id";
              $query = mysqli_query($connection, $sql);
              while ($row = mysqli_fetch_assoc($query)) {
                $product_name = $row['product_name'];
                $product_price = $row['product_price'];
                $product_quantity = $row['total_quantity'];
                //$product_quantity = $row['product_quantity'];
                $total_price = $total_price + ($product_price * $product_quantity);
                $total_quantity = $total_quantity + $product_quantity;
              ?>
                <tr>
                  <td><?php echo $product_name ?></td>
                  <td><?php echo $product_price ?></td>
                  <td><?php echo $product_quantity ?></td>
                  <td><?php echo $product_quantity * $product_price ?></td>
                </tr>
              <?php
              } //
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th class="text-end me-5 pe-5" name="totalPayment" colspan="3">Total Payment:</th>
                <th class="text-start py-1 px-2  totalPayment"><strong>₱<?php echo number_format($total_price, 2) ?></strong></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
        



</body>
<!-- Modal -->


<!-- Footer -->
<footer class="shadow-lg mt-5 text-center mt-auto">
  <div class="footer-copyright py-3">© 2022 Copyright:
    <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
  </div>
</footer>
<script>
  $(document).ready(function() {
    // $('#div_date').hide()
    // $(document).on('click', '#schedule', function() {
    //   $('#div_date').show()
    // })
    <?php if (isset($delivery_status)): ?>
        <?php if ($delivery_status == 'pending'): ?>
            $('#process').addClass('text-primary');
        <?php elseif ($delivery_status == 'shipping'): ?>
            $('#shipping').addClass('text-primary');
            $('#process').removeClass('text-primary');
        <?php elseif ($delivery_status == 'delivered'): ?>
            $('#process').removeClass('text-primary');
            $('#shipping').removeClass('text-primary');
            $('#delivered').addClass('text-success');
        <?php endif; ?>
    <?php endif; ?>



    $(document).on('click', '#submit', function() {
      var date_value = $("#date").val()
      var courierName = $("#courierName").val();
        var courierNumber = $("#courierNumber").val();
      var value = {
        "order_id": <?php echo $order_id ?>,
        "delivery_status": "shipping",
        "delivery_date": date_value,
        "order_status": "approved",
        "user_id": <?php echo $user_id ?>,
        "payment_id": <?php echo $payment_id ?>,
        "courier_name": courierName,
        "courier_number": courierNumber
      }
      console.log(value)
      $.ajax({
        type: "POST",
        url: "../backend/submit_order.php",
        data: value,
        success: function(data) {
        //   alert(data)
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Order respond',
            showConfirmButton: false,
            timer: 1500
          })
          setInterval('location.reload()', 1500)
          //;
        }
      })
    })
  })
  $(document).on('click', '#logout', function() {
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Logging out',
      text: 'Redirecting to Login...',
      showConfirmButton: false,
      timer: 2500,
      timerProgressBar: true,
    }).then(
      function() {
        window.location.href = "logout.php";
      }
    )
  })
</script>