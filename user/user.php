<?php
require_once("../backend/database.php");
session_start();
$username = $_GET['username'];
$sql = "SELECT * FROM `user_table` WHERE username = '$username'";
$query = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $fname = $row['fname'];
    $lname = $row['lname'];
    $user_id = $row['user_id'];
    $username = $row['username'];
    $email = $row['email'];
    $contactNum = $row['contactNum'];
}
$_SESSION['user_id'] = $user_id;
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
    <!-- <nav class="main-header navbar navbar-expand navbar-light bg-light navbar-white shadow">
        <div class="container-xl">
            <a href="user.php?username=<?php echo $username ?>" class="navbar-brand">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" alt="Apluz Logo" style="height: 40px;">
                <span class="brand-text font-weight-light">Apluz</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item active bg-info d-none d-sm-inline-block">
                        <a href="user.php?username=<?php echo $username ?>" class="nav-link active rounded">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="orders.php?username=<?php echo $username ?>" class="nav-link rounded">My Orders</a>
                    </li>
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
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#cart_modal" id="cart_icon_modal">
                            <i class="fas fa-cart-shopping"></i>
                            <span class="badge bg-danger navbar-badge" id="cart_icon"></span>
                        </a>
                    </li>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-circle-user"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php?username=<?php echo $username ?>"><i class="fas fa-user me-2"></i> My Account</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-gear me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" id="logout"><i class="fas fa-arrow-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </div>

                </ul>
            </div>
        </div>
    </nav> -->
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
    <div class="container-xl" id="content">
        <div class="shadow-lg mt-3 mb-5 pd-5 p-3">
            <h4 class="ps-2 pt-3">CATEGORIES</h4>
            <hr>
            <div class="list-group list-group-horizontal">
                <div class="owl-carousel owl-theme">
                    <?php
                    $sql = "SELECT product_image, category_name, category.category_id FROM category INNER JOIN product ON category.category_id = product.category_id";
                    $query = mysqli_query($connection, $sql);
                    $category_name_select_one = array();
                    while ($row = mysqli_fetch_assoc($query)) {
                        $category_id = $row['category_id'];
                        $category_name = $row['category_name'];
                        $product_image = $row['product_image'];
                        if (!in_array($category_name, $category_name_select_one, TRUE)) {
                    ?>
                            <div class="item list-group-item card-hover mb-5">
                                <a class=" text-decoration-none" href="category.php?username=<?php echo $username ?>&category_id=<?php echo $category_id ?>">
                                    <div class="mx-auto mt-3">
                                        <?php echo '<img class="img-fluid rounded" style="background-size:cover; height: 200px;" src="data:image/jpeg;base64,' . base64_encode($product_image) . '"
                                    alt="image"/>'; ?>
                                    </div>
                                    <p class="card-text text-center text-black"><small><?php echo $category_name ?></small></p>
                                </a>
                            </div>
                    <?php
                        }
                        array_push($category_name_select_one, $category_name);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <section class="shadow-lg mt-3 mb-5 pd-5 p-3">
                <h4 class="ps-2 pt-3">PRODUCT</h4>
                <hr>
                <div class="row">
                    <!-- Here are the items-->
                    <?php
                    $sql = "SELECT product_id, product_name, product_image, product_price FROM product";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $product_id = $row['product_id'];
                        $product_image = $row['product_image'];
                        $product_name = $row['product_name'];
                        $product_price = $row['product_price'];
                    ?>
                        <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
                            <div class="item ">
                                <a href="item_select.php?username=<?php echo $username; ?>&num=<?php echo $user_id ?>&id=<?php echo $product_id ?>" class="card card-hover shadow text-decoration-none">
                                    <div class="mx-auto mt-3">
                                        <?php echo '<img class="img-fluid rounded" style="background-size:cover; height: 200px;" src="data:image/jpeg;base64,' . base64_encode($product_image) . '" 
                            alt="image"/>'; ?>
                                    </div>
                                    <div class="card-body text-dark text-start">
                                        <p class="card-title text-center text-shadow-1"><?php echo $product_name ?></p>
                                        <br>
                                        <p class="text-end"><b>₱<?php echo number_format($product_price) ?></b></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
    

</body>
<!-- Footer -->
<footer class="shadow-lg mt-5 text-center mt-auto">
    <div class="footer-copyright py-3">© 2022 Copyright:
        <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--owl corousel-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $("#payment_body").load("payment.php")
        //$("#order_body").load("order.php")
        //$("#orders_body").load("orders.php")
        $("#cart_table_body").load("cart.php")
        $('#cart_icon').load("cart_table_count.php")
    })
//     $(document).ready(function() {
//   $('#search-button').click(function() {
//     var searchValue = $('#search-input').val().trim();
//     if (searchValue != '') {
//       $.ajax({
//         url: 'search.php',
//         method: 'POST',
//         data: {search: searchValue},
//         success: function(response) {
//           $('#search-results').html(response);
//         }
//       });
//     }
//   });
// });

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
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

</html>
<div class="modal fade" id="cart_modal">
    <div class="modal-dialog modal-xl modal-dialog-centered" id="cart_table_body">
    </div>
</div>
<div class="modal fade" id="payment_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="payment_body">

    </div>
</div>