<?php
require_once("backend/database.php");
session_start();
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
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100">
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
                    <li class="nav-item active bg-info rounded d-none d-sm-inline-block">
                        <a class="nav-link text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="signin/login.php" id="login">Sign In</a>
                    </li> -->
                    <li class="nav-item ">
                        <a href="signin/login.php" class="nav-link">LogIn</a>
                    </li>
                    <li class="nav-item ">
                        <a href="signin/signup.php" class="nav-link">SignUp</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        


    <!-- /.navbar -->
    <div class="container" id="content">
        <div class="shadow-lg mt-3 mb-5 pd-5 p-3">
            <h4 class="ps-2 pt-3">CATEGORIES</h4>
            <hr>
            <div class="list-group list-group-horizontal">
                <div class="owl-carousel owl-theme">
                <?php
                    $sql = "SELECT product_image, category_name, category.category_id FROM category INNER JOIN product ON category.category_id = product.category_id";
                    $query = mysqli_query($connection, $sql);
                    $category_name_select_one = array();
                    while($row = mysqli_fetch_assoc($query))
                    {
                        $category_id = $row['category_id'];
                        $category_name = $row['category_name'];
                        $product_image = $row['product_image'];
                        if(!in_array($category_name, $category_name_select_one, TRUE))
                        {
                            ?>
                            <div class="item list-group-item card-hover mb-5">
                                <a class=" text-decoration-none" href="category.php?category_id=<?php echo $category_id?>">
                                  <div class="mx-auto mt-3">
                                    <?php echo '<img class="img-fluid rounded" style="background-size:cover; height: 200px;" src="data:image/jpeg;base64,'.base64_encode($product_image).'"
                                    alt="image"/>';?>
                                  </div>
                                    <p class="card-text text-center text-black"><small><?php echo $category_name?></small></p>
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
        <div class="container">
            <section class="shadow-lg mt-3 mb-5 pd-5 p-3">
            <h4 class="ps-2 pt-3">PRODUCT</h4>
            <hr>
            <div class="row">
                <!-- Here are the items-->
                <?php
                    $sql = "SELECT product_id, product_name, product_image, product_price FROM product";
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
                        <a href="item_select.php?id=<?php echo $product_id?>" class="card card-hover shadow text-decoration-none">
                        <div class="mx-auto mt-3">
                            <?php echo '<img class="img-fluid rounded" style="background-size:cover; height: 1500px;" src="data:image/jpeg;base64,'.base64_encode($product_image).'"
                            alt="image"/>';?>
                            </div>
                            <div class="card-body text-dark text-center">
                            <p class="card-title text-center text-shadow-1"><?php echo $product_name?></p>
                            <p class="text-start"><strong>₱ <?php echo number_format($product_price,2)?></strong></p>
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

<!-- The Modal -->
<div class="modal" id="customerservicemodal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Request Service</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Subject">
                </div>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="20"></textarea>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Send</button>
            </div>

        </div>
    </div>
</div>
