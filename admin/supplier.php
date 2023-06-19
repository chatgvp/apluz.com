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
                            <a href="customers.php" id="customers" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="supplier.php" id="customers" class="nav-link active">
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Supplier Info</h4>
                            <form class="form-horizontal">
                                <div class="mt-5 row">
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="supplier_name" placeholder="name@example.com">
                                            <label for="supplier_name">Supplier Name</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="supplier_address" placeholder="Address">
                                            <label for="supplier_address">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="telephone" placeholder="Contact Number">
                                            <label for="telephone">Contact Number</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="abc@gmail.com">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="button" id="savebtn" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Suppliers</h5>
                            <div class="table-responsive">
                                <table id="customer_table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Contact number</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `supplier`";
                                        $query = mysqli_query($connection, $sql);
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $supplier_id = $row['supplier_id'];
                                            $supplier_name = $row['supplier_name'];
                                            $supplier_address = $row['supplier_address'];
                                            $telephone = $row['telephone'];
                                            $email = $row['email'];
                                            $supplier_created  = $row['supplier_created'];
                                            $supplier_updated  = $row['supplier_updated'];
                                        ?>
                                            <tr>
                                                <td><?php echo $supplier_name ?></td>
                                                <td><?php echo $supplier_address ?></td>
                                                <td><?php echo $telephone ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><small>Created:<b> <?php echo date('F j, Y, g:i a', strtotime($supplier_created)) ?></b><br>
                                                    Last Update:<b> <?php echo date('F j, Y, g:i a', strtotime($supplier_updated)) ?></b></small>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn rounded-circle btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_modal" id="edit" data-supplier_id="<?php echo $supplier_id ?>" data-supplier_name="<?php echo $supplier_name ?>" data-supplier_address="<?php echo $supplier_address ?>" data-telephone="<?php echo $telephone ?>" data-email="<?php echo $email ?>"><i class="fas fa-pencil"></i></button>
                                                    <button class="btn rounded-circle btn-sm btn-outline-danger" id="dltbtn" data-supplier_id="<?php echo $supplier_id ?>" data-supplier_name="<?php echo $supplier_name ?>"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Contact number</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
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

<!----------------------------------------------------------Update Modal------------------------------------------------------->
<div class="modal fade" id="edit_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><b>update Supplier</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="update_product_id">
                <form class="form-horizontal">
                    <div class="mt-3 row">
                        <div class="col-md">
                            <input type="hidden" class="form-control" id="e_supplier_id">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="e_supplier_name">
                                <label for="supplier_name">Supplier Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="e_supplier_address">
                                <label for="supplier_address">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="e_telephone">
                                <label for="telephone">Contact Number</label>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="e_email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="editbtn">Save</button>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#customer_table').DataTable();

        function alertDialog(title, content, icon) {
            Swal.fire(
                title,
                content,
                icon
            )
        }
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
    });
    $(document).on('click', '#savebtn', function() {
        var supplier_name = $("#supplier_name").val();
        var supplier_address = $("#supplier_address").val();
        var telephone = $("#telephone").val();
        var email = $("#email").val();
        console.log(telephone)
        check_supplier(supplier_name, supplier_address, telephone, email)

    });
    // console.log(telephone)
    function check_supplier(supplier_name, supplier_address, telephone, email) {
        var values = {
            "supplier_name": supplier_name,
            "supplier_address": supplier_address,
            "telephone": telephone,
            "email": email
        }
        $.ajax({
            type: "POST",
            url: "../backend/supplier_exist.php",
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
                        title: 'Supplier Already Exist!'
                    })
                }
                if (data == "invalid") {
                    $.ajax({
                        type: "POST",
                        url: "../backend/add_supplier.php",
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
                                title: 'Supplier Added Successfully'
                            })
                            setInterval('refreshPage()', 1500);
                        }
                    });
                }
            }
        });
    }
    $(document).on('click', '#edit', function() {
        var supplier_id = $(this).data('supplier_id');
        var supplier_name = $(this).data('supplier_name');
        var supplier_address = $(this).data('supplier_address');
        var telephone = $(this).data('telephone');
        var email = $(this).data('email');

        $("#e_supplier_id").val(supplier_id);
        $("#e_supplier_name").val(supplier_name);
        $("#e_supplier_address").val(supplier_address);
        $("#e_telephone").val(telephone);
        $("#e_email").val(email);
    });
    $(document).on('click', '#editbtn', function() {
        var supplier_id = $("#e_supplier_id").val();
        var supplier_name = $("#e_supplier_name").val();
        var supplier_address = $("#e_supplier_address").val();
        var telephone = $("#e_telephone").val();
        var email = $("#e_email").val();

        Swal.fire({
            title: 'Are you sure you want to update ' + supplier_name + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            update_supplier(supplier_id, supplier_name, supplier_address, telephone, email);

        })
    });

    function update_supplier(supplier_id, supplier_name, supplier_address, telephone, email) {
        var values = {
            "supplier_id": supplier_id,
            "supplier_name": supplier_name,
            "supplier_address": supplier_address,
            "telephone": telephone,
            "email": email
        }
        // console.log(values)
        $.ajax({
            type: "POST",
            url: "../backend/update_supplier.php",
            data: values,
            cache: false,
            // contentType: false,
            // cache: false,
            // processData: false,
            success: function(data) {
                // console.log(data)
                // console.log(values)
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
                    title: 'Supplier Updated Successfully'
                })
                // console.log(data)
                setInterval('refreshPage()', 1500);
            }
        });
    }
        $(document).on('click', '#dltbtn', function() {
        var supplier_id = $(this).data('supplier_id');
        var supplier_name = $(this).data('supplier_name');
        var values = {
            "supplier_id": supplier_id
        }
        Swal.fire({
            title: 'Are you sure you want to delete ' + supplier_name + '?',
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
            url: "../backend/delete_supplier.php",
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
</script>