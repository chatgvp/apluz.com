<?php
require_once("../backend/database.php");
/*
    //session_start();
    //$user_id = $_SESSION['user_id'];
    //$order_id = $_POST['order_id'];
    //$username = $_GET['username'];
    //$user_sql = "SELECT user_id FROM `user_table` where username = '$username'";
    //$user_query = mysqli_query($connection, $user_sql);
    //$row = mysqli_fetch_assoc($user_query);
    //$user_id = $row['user_id'];
    //echo $user_id;

    $sql = "SELECT * FROM `order_table`";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query))
    {
        $order_id = $row['order_id'];
    }

    $order_table_sql = "SELECT * FROM `order_table`";
    $order_table_query = mysqli_query($connection, $order_table_sql);
    while($row = mysqli_fetch_assoc($order_table_query))
    {
        $order_id = $row['order_id'];
        $user_id = $row['user_id'];
        $product_id = $row['product_id'];
        $item_price = $row['item_price'];
        $item_quantity = $row['item_quantity'];
        $order_date = $row['order_date'];
        $payment_method = $row['payment_method'];
        $payment_status = $row['payment_status'];
        $delivery_status = $row['delivery_status'];
        $status = $row['status'];
        $delivery_date = $row['delivery_date'];
    }
    $user_id_sql = "SELECT * FROM `user_table` WHERE user_id = $user_id";
    $user_id_query = mysqli_query($connection, $user_id_sql);
    while($row = mysqli_fetch_assoc($user_id_query))
    {
        $fname = $row['fname'];
        $lname = $row['lname'];
        //$_SESSION['user_id'] = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $contactNum = $row['contactNum'];
        $address = $row['address'];
    }
    */
?>
<!DOCTYPE html>

<head>
    <title>Apluz</title>
    <script src="https://kit.fontawesome.com/fae31e57e1.js" crossorigin="anonymous"></script>
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
                            <a href="sales.php" id="sales" class="nav-link active">
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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sales</h5>
                    <div class="table-responsive">
                        <table id="sales_table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 20x;">Sales ID</th>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <!-- <th>Product</th> -->
                                    <th>Quantity</th>
                                    <!-- <th>price</th> -->
                                    <th>Revenue</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $order_sql = "SELECT
                                sales.sales_id,
                                sales.sales_created,
                                order_table.order_id,
                                SUM(order_table.product_quantity) AS product_quantity,
                                order_table.product_price,
                                sales.Amount
                            FROM
                                sales
                                INNER JOIN order_table ON sales.order_id = order_table.order_id
                                INNER JOIN product ON order_table.product_id = product.product_id
                            GROUP BY
                                order_table.order_id
                            ";
                                $order_query = mysqli_query($connection, $order_sql);
                                while ($row = mysqli_fetch_assoc($order_query)) {
                                    $sales_id = $row['sales_id'];
                                    $sales_created = $row['sales_created'];
                                    $order_id = $row['order_id'];
                                    // $product_name = $row['product_name'];
                                    $product_quantity = $row['product_quantity'];
                                    // $product_price = $row['product_price'];
                                    $revenue = $row['Amount'];
                                ?>
                                    <tr>
                                        <td><?php echo $sales_id ?></td>
                                        <td><?php echo  date('F j, Y, g:i a', strtotime($sales_created)); ?></td>
                                        <td><?php echo $order_id ?></td>
                                        <!-- <td><?php echo $product_name ?></td> -->
                                        <td><?php echo $product_quantity ?></td>
                                        <!-- <td class="text-right"><?php echo  number_format($product_price) ?></td> -->
                                        <td class="text-right"><?php echo number_format($revenue) ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="order.php?id=<?php echo $order_id ?>">view</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th style="width: 20x;">Sales ID</th>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>price</th>
                                    <th>Revenue</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot> -->
                        </table>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Monthly Sales Report</h5>
                                <?php
                                $revenue = array();
                                $monthDate = array();
                                $sales_sql = "SELECT
                                sales.sales_id,
                                date_format(sales.sales_created,'%M %Y') AS month_date,
                                year(sales.sales_created) AS year_date,
                                order_table.order_id,
                                product.product_name,
                                order_table.product_quantity,
                                order_table.product_price,
                                SUM(sales.Amount) AS total_sales
                                FROM
                                sales
                                INNER JOIN order_table ON sales.order_id = order_table.order_id
                                INNER JOIN product ON order_table.product_id = product.product_id
                                GROUP BY year_date,month_date";
                                if (isset($connection)) {
                                    // execute your query here
                                    $result = mysqli_query($connection, $sales_sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $revenue[] = intval($row["total_sales"]);
                                        $monthDate[] = ($row["month_date"]);
                                    }
                                } else {
                                    // show an error message
                                    echo "Error: Database connection not established.";
                                }
                                ?>


                                <div>
                                    <canvas id="myChart"></canvas>
                                    <label for="date" class="col-1 col-form-label">From</label>
                                    <input onchange="starFilterDate(this)" min="2021-01" value="2023-01" type="month">
                                    <label for="date" class="col-1 col-form-label">To</label>
                                    <input onchange="endFilterDate(this)" min="2021-01" value="2023-01" type="month">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
<!-- Footer -->
<footer class="shadow-lg mt-5 text-center mt-auto">
    <div class="footer-copyright py-3">© 2022 Copyright:
        <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sales_table').DataTable();
    });
    $(document).on('click', '#logout', function() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Logging out',
            text: 'Redirecting to Login...',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        }).then(
            function() {
                window.location.href = "logout.php";
            }
        )
    })
    const monthlyDateArray = <?php echo json_encode($monthDate); ?>;
    const monthlyDate = monthlyDateArray.map((day, index) => {
        let monthjs = new Date(day);
        return monthjs.setHours(0, 0, 0, 0);
    });
    //console.log(monthlyDate);

    //  SETUP BLOCK
    const revenue = <?php echo json_encode($revenue); ?>;
    const data = {
        labels: monthlyDate,
        datasets: [{
            label: "Sales",
            data: revenue,
            borderWidth: 1,
        }],
    };

    //  CONFIG BLOCK
    const config = {
        type: "bar",
        data,
        options: {
            scales: {
                x: {
                    min: '2023-01',
                    max: '2023-05',
                    type: 'time',
                    time: {
                        unit: 'month'
                    }
                },
                y: {
                    beginAtZero: true,
                },
            },
        },
    };

    //  RENDER BLOCK
    const myChart = new Chart(
        document.getElementById("myChart"),
        config
    );

    function starFilterDate(date) {
        const startDate = new Date(date.value);
        const startDateFilter = startDate.setHours(0, 0, 0, 0);
        console.log(startDate.setHours(0, 0, 0, 0));
        myChart.config.options.scales.x.min = startDateFilter;

        myChart.update();
    };

    function endFilterDate(date) {
        const endDate = new Date(date.value);
        const endDateFilter = endDate.setHours(0, 0, 0, 0);
        console.log(endDate.setHours(0, 0, 0, 0));
        myChart.config.options.scales.x.max = endDateFilter;

        myChart.update();
    };
</script>
<div class="modal fade" id="cart_modal">
    <div class="modal-dialog modal-xl modal-dialog-centered" id="cart_table_body">
    </div>
</div>