<?php
    require_once("backend/database.php");
    session_start();
    if(isset($_GET['category_id'])){
    	$category_id = $_GET['category_id'];
        // Get the CAtegory Title Based on Category ID
        $sql = "SELECT category_name FROM `category` WHERE category_id = $category_id";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($query);
          $category_name = $row['category_name'];
        }
    ?>
<!DOCTYPE html>
<head>
    <title>Apluz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--2) Owl Carousel theme-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
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
              <div>
                  <form class="d-flex ms-5 ps-5" role="search">
                      <input
                          class="form-control me-2"
                          type="search"
                          placeholder="Search"
                          aria-label="Search"
                      />
                      <button type="submit" class="btn">
                          <i class="bi bi-search"></i>
                      </button>
                  </form>
                  </div>
                  <li class="nav-item">
                      <a class="nav-link" href="index.php">Home</a>
                  </li>
                <!--  <li class="nav-item">
                      <a class="nav-link" href="services.php">Service</a>
                  </li>-->
                  <li class="nav-item">
                      <a class="nav-link" href="signin/login.php"id="login">Sign In</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#"><h5><i class="bi bi-cart2"><sup><span class="badge bg-danger">0</span></sup></i></h5></a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
    <div class="container" id="content">
            <div class="shadow-lg mt-3 mb-5 pd-5 p-3">
            <h4 class="ps-2 pt-3"><?php echo $category_name;?> </h4>
            <hr>
            <div class="row">
                <!-- Here are the items-->
                <?php
                    $sql = "SELECT * FROM product WHERE category_id=$category_id";
                    $query = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_assoc($query))
                    {
                        $product_id = $row['product_id'];
                        $product_image = $row['product_image'];
                        $product_name = $row['product_name'];
                        $product_price = $row['product_price'];
                ?>
                <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
                    <div class="item ">
                          <a href="item_select.php?id=<?php echo $product_id?>"  class="card card-hover shadow text-decoration-none">
                          <div class="mx-auto mt-3">
                            <?php echo '<img class="img-fluid rounded" style="background-size:cover; height: 200px;" src="data:image/jpeg;base64,'.base64_encode($product_image).'"
                            alt="image"/>';?>
                            </div>
                            <div class="card-body text-dark text-center">
                            <p class="card-title text-center text-shadow-1"><?php echo $product_name?></p>
                            <p class="text-start"><strong>₱<?php echo number_format($product_price,2)?></strong></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                    }
                ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--owl corousel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function()
    {
        $("#payment_body").load("payment.php")
        $("#order_body").load("order.php")
        $("#orders_body").load("orders.php")
        $("#cart_table_body").load("cart.php")
        $('#cart_icon').load("cart_table_count.php")
    })
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
    })
    $('.owl-carousel').owlCarousel
    ({
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
<div class="modal fade" id="order_modal">
    <div class="modal-dialog modal-xl modal-dialog-centered" id="order_body">

    </div>
</div>
<div class="modal fade" id="orders_modal">
    <div class="modal-dialog modal-xl modal-dialog-centered" id="orders_body">

    </div>
</div>
<div class="modal fade" id="payment_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="payment_body">

    </div>
</div>
