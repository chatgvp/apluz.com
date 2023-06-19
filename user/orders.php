<?php
require_once("../backend/database.php");
$username = $_GET['username'];
$sql = "SELECT user_id as id FROM `user_table` WHERE username = '$username'";
$user_id_query = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($user_id_query);
$user_id = $user['id'];
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
    <div class="container pt-5" id="content">
    <h1><b>Your Orders</b></h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active position-relative" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
            All
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white" id="span-all">
                
            </span>
        </button>
    </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link position-relative" id="profile-tab" data-bs-toggle="tab" data-bs-target="#toreceive" type="button" role="tab" aria-controls="toreceive" aria-selected="false">To Receive
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white" id="span-toreceive">
            
        </span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab" data-bs-target="#toship" type="button" role="tab" aria-controls="toship" aria-selected="false">To Ship
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white" id="span-toship">
            
        </span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link position-relative" id="contact-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab" aria-controls="contact" aria-selected="false">Received
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white" id="span-received">
            
        </span>
    </button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
  <table class="table table-striped mt-5" id="table">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT order_table.order_id, MAX(product.product_image) AS product_image
                        FROM order_table 
                        JOIN user_table ON order_table.user_id = user_table.user_id 
                        JOIN product ON order_table.product_id = product.product_id
                        WHERE order_table.user_id = $user_id
                        GROUP BY order_table.order_id
                    
                    
                    ";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $product_image = $row['product_image'];
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
                            <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product_image) . '" alt="image" style="height:100px;width:100px;"/>'; ?></td>
                            <td><?php echo $order_id ?></td>
                            <td><?php echo number_format($total_price) ?></td>
                            <td><?php echo $payment_method ?></td>
                            <?php
                            if (isset($payment_status)) {
                                if($payment_status == 'paid')
                                {
                                    echo "<td class='text-success'>" . $payment_status . "</td>";
                                }
                                else{
                                    echo "<td class='text-warning'>" . $payment_status . "</td>";
                                }
                                
                            } else {
                                echo "<td class='text-warning'>pending</td>";
                            }
                            ?>
                            <td><?php echo date('F j, Y, g:i a', strtotime($order_date)) ?></td>
                            <?php
                            $delivery_status_sql = "SELECT delivery_status as d_status FROM delivery_table WHERE order_id = $order_id";
                            $delivery_status_query = mysqli_query($connection, $delivery_status_sql);
                            $delivery_status_row = mysqli_fetch_assoc($delivery_status_query);

                            if (!isset($delivery_status_row['d_status'])) {
                                echo "<td class='text-warning'>pending</td>";
                            } else {
                                if($delivery_status == 'shipping')
                                {
                                    echo "<td class='text-info'>$delivery_status</td>";
                                }
                                else{
                                    echo "<td class='text-success'>$delivery_status</td>";
                                }
                            }
                            if($order_status == 'approved')
                            {
                                echo "<td class='text-success'>$order_status</td>";
                            }
                            else{
                                echo "<td class='text-warning'>$order_status</td>";
                            }
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
            </table>
  </div>
  <div class="tab-pane fade" id="toreceive" role="tabpanel" aria-labelledby="toreceive-tab">
  <table class="table table-striped mt-5" id="table">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT order_table.order_id, MAX(product.product_image) AS product_image
                    FROM order_table 
                    JOIN user_table ON order_table.user_id = user_table.user_id 
                    JOIN delivery_table ON order_table.order_id = delivery_table.order_id 
                    JOIN payment_table ON order_table.order_id = payment_table.order_id 
                    JOIN product ON order_table.product_id = product.product_id
                    WHERE delivery_table.delivery_status = 'shipping' 
                      AND order_table.order_status = 'approved' 
                      AND payment_table.payment_status = 'pending' 
                      AND order_table.user_id = $user_id
                    GROUP BY order_table.order_id
                    ORDER BY delivery_table.delivery_date DESC
                    
                    
                    ";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $product_image = $row['product_image'];
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
                            <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product_image) . '" alt="image" style="height:100px;width:100px;"/>'; ?></td>
                            <td><?php echo $order_id ?></td>
                            <td><?php echo number_format($total_price) ?></td>
                            <td><?php echo $payment_method ?></td>
                            <?php
                            if (isset($payment_status)) {
                                if($payment_status == 'paid')
                                {
                                    echo "<td class='text-success'>" . $payment_status . "</td>";
                                }
                                else{
                                    echo "<td class='text-warning'>" . $payment_status . "</td>";
                                }
                                
                            } else {
                                echo "<td>pending</td>";
                            }
                            ?>
                            <td><?php echo date('F j, Y, g:i a', strtotime($order_date)) ?></td>
                            <?php
                            $delivery_status_sql = "SELECT delivery_status as d_status FROM delivery_table WHERE order_id = $order_id";
                            $delivery_status_query = mysqli_query($connection, $delivery_status_sql);
                            $delivery_status_row = mysqli_fetch_assoc($delivery_status_query);

                            if (!isset($delivery_status_row['d_status'])) {
                                echo "<td>pending</td>";
                            } else {
                                if($delivery_status == 'shipping')
                                {
                                    echo "<td class='text-info'>$delivery_status</td>";
                                }
                                else{
                                    echo "<td class='text-warning'>$delivery_status</td>";
                                }
                            }
                            if($order_status == 'approved')
                            {
                                echo "<td class='text-success'>$order_status</td>";
                            }
                            else{
                                echo "<td class='text-warning'>$order_status</td>";
                            }
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
            </table>
  </div>
  <div class="tab-pane fade" id="toship" role="tabpanel" aria-labelledby="contact-tab">
  <table class="table table-striped mt-5" id="table">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = " SELECT order_table.order_id, MIN(product.product_image) AS product_image
                        FROM order_table 
                        JOIN user_table ON order_table.user_id = user_table.user_id 
                        JOIN product ON order_table.product_id = product.product_id
                        WHERE order_table.order_status = 'pending' 
                        AND order_table.user_id = $user_id
                        GROUP BY order_table.order_id
                        
                    ";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $product_image = $row['product_image'];
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
                            <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product_image) . '" alt="image" style="height:100px;width:100px;"/>'; ?></td>
                            <td><?php echo $order_id ?></td>
                            <td><?php echo number_format($total_price) ?></td>
                            <td><?php echo $payment_method ?></td>
                            <?php
                            if (isset($payment_status)) {
                                if($payment_status == 'paid')
                                {
                                    echo "<td class='text-success'>" . $payment_status . "</td>";
                                }
                                else{
                                    echo "<td class='text-warning'>" . $payment_status . "</td>";
                                }
                                
                            } else {
                                echo "<td>pending</td>";
                            }
                            ?>
                            <td><?php echo date('F j, Y, g:i a', strtotime($order_date)) ?></td>
                            <?php
                            $delivery_status_sql = "SELECT delivery_status as d_status FROM delivery_table WHERE order_id = $order_id";
                            $delivery_status_query = mysqli_query($connection, $delivery_status_sql);
                            $delivery_status_row = mysqli_fetch_assoc($delivery_status_query);

                            if (!isset($delivery_status_row['d_status'])) {
                                //$delivery_sql = "SELECT delivery_date, delivery_status FROM delivery_table WHERE order_id = $order_id";
                                //$delivery_query = mysqli_query($connection, $delivery_sql);
                                echo "<td class='text-warning'>pending</td>";
                            } else {
                                echo "<td class='text-warning'>$delivery_status</td>";
                            }
                            if($order_status == 'approved')
                            {
                                echo "<td class='text-success'>$order_status</td>";
                            }
                            else{
                                echo "<td class='text-warning'>$order_status</td>";
                            }
                            if (isset($delivery_date)) {
                                echo "<td>" . date('F j, Y, g:i a', strtotime($delivery_date)) . "</td>";
                            } else {
                                echo "<td >pending</td>";
                            }
                            ?>
                            <td>
                                <a class="btn btn-primary" href="order.php?id=<?php echo $order_id ?>">view</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
  </div>
  <div class="tab-pane fade" id="received" role="tabpanel" aria-labelledby="contact-tab">
  <table class="table table-striped mt-5" id="table">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT order_table.order_id, MAX(product.product_image) AS product_image
                    FROM order_table 
                    JOIN user_table ON order_table.user_id = user_table.user_id 
                    JOIN delivery_table ON order_table.order_id = delivery_table.order_id 
                    JOIN product ON order_table.product_id = product.product_id
                    WHERE delivery_table.delivery_status = 'delivered' 
                    AND order_table.order_status = 'approved' 
                    AND order_table.user_id = $user_id
                    GROUP BY order_table.order_id
                    ORDER BY delivery_table.delivery_date DESC
                    
                    ";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $product_image = $row['product_image'];
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
                            <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product_image) . '" alt="image" style="height:100px;width:100px;"/>'; ?></td>
                            <td><?php echo $order_id ?></td>
                            <td><?php echo number_format($total_price) ?></td>
                            <td><?php echo $payment_method ?></td>
                            <?php
                            if (isset($payment_status)) {
                                echo "<td class='text-success'>" . $payment_status . "</td>";
                            } else {
                                echo "<td>pending</td>";
                            }
                            ?>
                            <td><?php echo date('F j, Y, g:i a', strtotime($order_date)) ?></td>
                            <?php
                            $delivery_status_sql = "SELECT delivery_status as d_status FROM delivery_table WHERE order_id = $order_id";
                            $delivery_status_query = mysqli_query($connection, $delivery_status_sql);
                            $delivery_status_row = mysqli_fetch_assoc($delivery_status_query);

                            if (!isset($delivery_status_row['d_status'])) {
                                echo "<td>pending</td>";
                            } else {
                                echo "<td class='text-success'>$delivery_status</td>";
                            }
                            if($order_status == 'approved')
                            {
                                echo "<td class='text-success'>$order_status</td>";
                            }
                            else{
                                echo "<td class='text-warning'>$order_status</td>";
                            }
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
            </table>
  </div>
</div>
        
        <div class="table-responsive">
            
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
    $(document).ready(function() {
        $("#payment_body").load("payment.php")
        $("#cart_table_body").load("cart.php")
        $('#cart_icon').load("cart_table_count.php")
        $('#span-all').load("all_count.php")
        $('#span-toreceive').load("toreceive_count.php")
        $('#span-toship').load("toship_count.php")
        $('#span-received').load("received_count.php")
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
    <div class="modal-dialog modal-xl modal-dialog-centered" id="cart_table_body">
    </div>
</div>
<div class="modal fade" id="payment_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="payment_body">

    </div>
</div>