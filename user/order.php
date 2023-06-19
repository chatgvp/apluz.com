<?php
require_once("../backend/database.php");
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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--2) Owl Carousel theme-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body class="d-flex flex-column min-vh-100 layout-top-nav">
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" height="40" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <div class="nav-item d-none d-sm-inline-block">
                        <input class="form-control form-control-navbar" list="datalistOptions" id="exampleDataList" placeholder="Search Item">
                        <datalist id="datalistOptions"></datalist>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#exampleDataList').on('input', function() {
                                var searchTerm = $(this).val();
                                $.ajax({
                                url: '../backend/search.php',
                                method: 'POST',
                                data: { search: searchTerm },
                                dataType: 'json',
                                success: function(data) {
                                    var options = '';
                                    $.each(data, function(index, value) {
                                        options += '<option value="' + value.product_name + '" data-id="' + value.product_id + '">';

                                    });
                                    $('#datalistOptions').html(options);

                                    var selectedOption = null;
                                    
                                    // add change event listener to input element
                                    $('#exampleDataList').change(function() {
                                    selectedOption = $('#datalistOptions option[value="' + $(this).val() + '"]');
                                    });
                                    
                                    // add click event listener to options
                                    $('#datalistOptions option').click(function() {
                                        selectedOption = $(this);
                                    });

                                    $('#exampleDataList').keyup(function() {
                                    if (selectedOption) {
                                        var productId = selectedOption.data('id');
                                        console.log(productId);
                                        window.location.href = 'item_select.php?username=<?php echo $username; ?>&num=<?php echo $user_id ?>&id=' + productId;
                                    }
                                    });
                                }
                                });
                            });
                        });
                    </script>
                    <li class="nav-item">
                        <a href="user.php?username=<?php echo $username ?>" class="nav-link active rounded">Home</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#cart_modal" id="cart_icon_modal">
                            <i class="fas fa-cart-shopping"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <span class="visually-hidden">Number of items in cart</span>
                            <span class="cart-count" id="cart_icon"></span>
                            </span>
                        </a>
                    </li>

                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-circle-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php?username=<?php echo $username ?>"><i class="fas fa-user me-2"></i> My Account</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="orders.php?username=<?php echo $username ?>"><i class="fas fa-shopping-bag me-2"></i>My Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" id="logout"><i class="fas fa-arrow-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" id="content">
        <div class="row mt-5">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="orders.php?username=<?php echo $username ?>">My Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
            </nav>
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
                <p><b>Order Date:</b><span> <?php echo  date('F j, Y, g:i a', strtotime($order_date)) ?></span></p>
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
                <?php if(isset($delivery_status)) { ?>
                    <div class="border border-secondary border-2 rounded p-3 mb-3">
                        <p><b>Courier Name:</b> <?php echo $courier_name ?></p>
                        <p><b>Courier Number:</b> <?php echo $courier_number ?></p>
                    </div>
                <?php }?>
            </div>
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
              $total_quantity =0;
              $sql = "SELECT product_name, order_table.product_price, SUM(order_table.product_quantity) AS total_quantity
              FROM order_table
              JOIN product ON order_table.product_id = product.product_id
              WHERE order_id = $order_id
              GROUP BY product.product_id
              ";
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
            <div>
                <button class="btn btn-success btn-sm" id="received">Received item?</button>
                <h5 class="text-success" id="received_item"></h5>
                <?php
                if (!isset($delivery_status)) {
                    echo "<script>$('#received').hide()</script>";
                } else {
                    echo "<script>$('#received').show()</script>";
                }
                if (isset($delivery_status) && $delivery_status == "delivered") {
                    echo "<script>$('#received').hide()</script>";
                    echo "<script>$('#received_item').html('Order Complete')</script>";
                    //echo "<script>alert('asdasdas')</script>";
                }
                ?>
                <script>
                    $(document).ready(function() {})
                    $(document).on('click', '#received', function() {
                        console.log('asdasd')
                        var value = {
                            "order_id": <?php echo $order_id ?>,
                            "payment_status": "paid",
                            "delivery_status": "delivered",
                            "Amount": <?php echo $total_price ?>,
                            "total_quantity": <?php echo $total_quantity?>
                        }
                        //alert(<?php echo $total_price ?>)
                        console.log('asdasd')
                        $.ajax({
                            type: "POST",
                            url: "../backend/complete_order.php",
                            data: value,
                            success: function(data) {
                                //console.log(data)
                                //alert(data)
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Order Complete',
                                    html: 'Thank you for ordering in our shop!<br> Have a nice day!',
                                    confirmButtonText: 'Continue',
                                    allowEscapeKey: false,
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload()
                                        //setInterval('location.reload()', 1500)
                                        //$('#received').hide()
                                    }
                                })
                                //;
                            }
                            //-------------------------------------------------------------------------------
                        })
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Complete',
                            html: 'Thank you for ordering in our shop!<br> Have a nice day!',
                            confirmButtonText: 'Continue',
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //location.href = '../user/user.php?username='+username;
                            }
                        })
                    })
                </script>
            </div>
        </div>
    </div>
</body>
<!-- Footer -->
<!-- <footer class="shadow-lg mt-5 text-center mt-auto">
    <div class="footer-copyright py-3">© 2022 Copyright:
        <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
    </div>
</footer> -->
<script>
    $(document).ready(function() {
        $("#cart_table_body").load("cart.php")
        $('#cart_icon').load("cart_table_count.php")
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
    })

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
</script>
<div class="modal fade" id="cart_modal">
    <div class="modal-dialog modal-xl modal-dialog-centered" id="cart_table_body"></div>
</div>
<div class="modal fade" id="payment_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="payment_body"></div>
</div>