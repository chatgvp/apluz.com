<?php
require_once('../backend/database.php');
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
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
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
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" alt="AdminLTE Logo" class="brand-image rounded-circle elevation-2" style="opacity: .7">
                <span class="brand-text font-weight-light">Apluz</span>
            </a>

            <!-- Sidebar -->
            <div class="control-sidebar-slide">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../uploads/avatar-1.png" class="rounded-circle elevation-2" alt="User Image">
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
                            <a href="customers.php" id="customers" class="nav-link active">
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
                    <h5 class="card-title">Users</h5>
                    <div class="table-responsive">
                        <table id="customer_table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Contact number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `user_table`";
                                $query = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $user_id = $row['user_id'];
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $contactNum = $row['contactNum'];
                                ?>
                                    <tr>
                                        <td><?php echo $user_id ?></td>
                                        <td><?php echo $fname ?></td>
                                        <td><?php echo $lname ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $contactNum ?></td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Contact number</th>
                                </tr>
                            </tfoot>
                        </table>
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

</html>
<script>
    $(document).ready(function() {
        $('#customer_table').DataTable();
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