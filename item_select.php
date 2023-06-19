<?php
    require_once('backend/database.php');
    session_start();
    $product_id = $_GET['id'];
    $_SESSION['product_id'] = $product_id;
    $sql = "SELECT product_price, product_quantity FROM `product` WHERE product_id = '$product_id'";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query))
    {
        $product_quantity = $row['product_quantity'];
        $product_price = $row['product_price'];
    }
?>

<!DOCTYPE html>
    <head>
        <title>Apluz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="star-rating-svg.css">
        <script src="jquery.star-rating-svg.js"></script>
        <style>
        .swal-size{
            width:350px !important;
            height: 250px !important;
        }
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100">
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="navbar">
          <div class="container">
              <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" style="height: 40px;">
              <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                  <ul class="navbar-nav">
                  <li class="nav-item">
                        <form class="d-flex">
                            <div class="input-group">
                                <input class="form-control form-control-navbar" list="datalistOptions" id="exampleDataList" placeholder="Search Item">
                                <div class="m-2"></div>
                                <datalist id="datalistOptions"></datalist>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#exampleDataList').on('input', function() {
                                        var searchTerm = $(this).val();
                                        $.ajax({
                                        url: 'backend/search.php',
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
                                            console.log(selectedOption)
                                            // add click event listener to options
                                            $('#datalistOptions option').click(function() {
                                            selectedOption = $(this);
                                            });

                                            $('#exampleDataList').keyup(function() {
                                            if (selectedOption) {
                                                var productId = selectedOption.data('id');
                                                console.log(productId);
                                                window.location.href = 'item_select.php?id=' + productId;
                                            }
                                            });
                                        }
                                        });
                                    });
                                });
                            </script>
                        </form>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="signin/login.php" class="nav-link">LogIn</a>
                        </li>
                        <li class="nav-item">
                            <a href="signin/signup.php" class="nav-link">SignUp</a>
                        </li>
                  </ul>
              </div>
          </div>
      </nav>
        <div class="container border p-5 my-5  shadow shadow-lg" id="content">
        <?php
            $sql = "SELECT product_quantity, product.category_id, product_id, product_id,product_image, product_name,category_name, product_description, product_specs, Product_price
            FROM category INNER JOIN product ON category.category_id = product.category_id WHERE product_id = $product_id";
            $query = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($query))
            {
                $product_id = $row['product_id'];
                $product_image = $row['product_image'];
                $product_name = $row['product_name'];
                $product_price = $row['Product_price'];
                $product_name = $row['product_name'];
                $category_name = $row['category_name'];
                $product_quantity = $row['product_quantity'];
                $product_description = $row['product_description'];
                $product_specs = $row['product_specs'];
            }
        ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Apluz</a></li>
            <li class="breadcrumb-item"><a href="#">Categories</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $category_name?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $product_name?></li>
        </ol>
        </nav>
        <div class="row">
            <div class="col-10 col-xl-6 d-flex justify-content-center">
                <div class="px-auto">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product_image) . '" alt="image" class="img-fluid" />'; ?>
                </div>
            </div>
            <div class="col-md-6 pt-3 px-3">
                <h3><b><?php echo $product_name ?></b></h3>
                <h6><b>₱ <?php echo number_format($product_price,2)?></b></h6><span><p class="text-success">Lowest Price Guaranteed</p>
                </span>
                <h6><b>Category:</b> <span><?php echo $category_name?></span></h6>
                <h6><b>Product Description:</h6>
                    <p align="justify"></b><?php echo $product_description?></p>
                <h6><b>Quantity:</b></h6>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline border" id="count_minus">-</button>
                    <input class="input-group border" style="width: 50px;" id="count_num" value="1">
                    <button type="button" class="btn border" id="count_plus">+</button>
                    <span class="input-group-text" id="available"><?php echo $product_quantity?> Pieces Available</span>
                </div>
                <script>
                    var count = 0;
                    $(document).on('click', '#count_plus', function(){
                        count ++;
                        $("#count_num").val(count);
                        if(count><?php echo $product_quantity?>)
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'we only have <?php echo $product_quantity?> pieces available'
                            })
                        }
                    })
                    $(document).on('click', '#count_minus', function(){
                        count --;
                        $("#count_num").val(count);
                        if(count><?php echo $product_quantity?>)
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'we only have <?php echo $product_quantity?> pieces available'
                            })
                        }
                        if($("#count_num").val()<=0)
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You cannot Order 0'
                            })
                        }
                    })
                    $(document).on('input', '#count_num', function(){
                        count = $("#count_num").val();
                        if($("#count_num").val()><?php echo $product_quantity?>)
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'we only have <?php echo $product_quantity?> pieces available'
                            })
                        }
                        if($("#count_num").val()<=0)
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'we only have <?php echo $product_quantity?> pieces available'
                            })
                        }
                    })

                </script>
                <br><br>
                <button class="btn btn-outline-danger" id="add_cart">
                    <i class="bi bi-cart2">
                        <span> add to cart</span>
                    </i>
                </button>
                <button class="btn btn-primary" id="buy_now">Buy Now</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <h6><strong>Specs</strong></h6>
                <p align="justify"><?php echo $product_specs ?></p>
            </div>
        </div>
    </body>
    <!-- Footer -->
    <!-- <footer class="shadow-lg mt-5 text-center mt-auto">
        <div class="footer-copyright py-3">© 2022 Copyright:
            <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
        </div>
    </footer> -->
</html>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="jquery.star-rating-svg.js"></script>
<script>
    $(document).ready(function()
    {
      $("#payment_body").load("payment.php")
      $("#order_body").load("order.php")
      $("#orders_body").load("orders.php")
      $("#cart_table_body").load("cart.php")
      $('#cart_icon').load("cart_table_count.php")
      $(document).on('click', '#add_cart', function()
      {
          window.location.href = "signin/login.php";
      })
      $(document).on('click', '#buy_now', function()
      {
          window.location.href = "signin/login.php";
      })
    });
    $(document).on('click', '#logout', function()
    {
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Logging out',
        text: 'Redirecting to Login...',
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
        }).then(
            function()
            {
                window.location.href = "../index.php";
            }
        )
    });
</script>
