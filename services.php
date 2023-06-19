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
   <link rel="stylesheet" type="text/css" href="style.css?v=1">
</head>
<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="navbar">
      <div class="container">
          <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" style="height: 50px;">
          <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <div class="my-auto">
                      <form class="d-flex me-3" role="search">
                        <div class="input-group">
                          <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
                          <button type="submit" class="input-group-text bg-light">
                              <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </form>
                      </div>
                  <li class="nav-item my-auto">
                      <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item my-auto">
                      <a class="nav-link" href="services.php">Service</a>
                  </li>
                  <li class="nav-item my-auto">
                      <a class="nav-link" href="signin/login.php"id="login">Sign In</a>
                  </li>
                  <li class="nav-item my-auto">
                      <a class="nav-link" href="#"><h5><i class="bi bi-cart2"><sup><span class="badge bg-danger">1</span></sup></i></h5></a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <div class="container">
    <div class="col p-5 my-5 bg-primary text-white">
      <h1 class="text-center">Hi, How can we help?</h1>
      <p></p>
      <form action="" class="mx-auto col col-sm-10 col-md-8 col-lg-8">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Here">
            <button type="submit" class="input-group-text btn-success"><i class="bi bi-search me-2"></i></button>
        </div>
    </div>
    <section class="col mt-3 mb-5">
      <h5 class="ps-2 pt-3">TOPICS</h5>
      <div class="row">
        <!-- Here are the items-->
        <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
          <div class="item ">
            <a href="" class="card card-hover text-decoration-none">
              <div class="card-body text-dark text-center">
                <p class="card-title text-center text-shadow-1"><h1><i class="bi bi-person-circle"></i></h1></p>
                <p class="text-center">My Account</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
          <div class="item ">
            <a href="" class="card card-hover text-decoration-none">
              <div class="card-body text-dark text-center">
                <p class="card-title text-center text-shadow-1"><h1><i class="bi bi-tools"></i></h1></p>
                <p class="text-center ">Repair</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
          <div class="item ">
            <a href="" class="card card-hover text-decoration-none">
              <div class="card-body text-dark text-center">
                <p class="card-title text-center text-shadow-1"><h1><i class="bi bi-cash-coin"></i></h1></p>
                <p class="text-center">Payments</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-4 col-sm-5 mb-3">
          <div class="item ">
            <a href="" class="card card-hover text-decoration-none">
              <div class="card-body text-dark text-center">
                <p class="card-title text-center text-shadow-1"><h1><i class="bi bi-box-seam"></i></h1></p>
                <p class="text-center">Return Item</p>
              </div>
            </a>
          </div>
        </div>
    </section>
  </div>
</body>
  <!-- Footer -->
  <footer class="shadow-lg mt-5 text-center mt-auto">
      <div class="footer-copyright py-3">© 2022 Copyright:
          <a href="https://apluzelectronics.42web.io"> apluzelectronics.42web.io</a>
      </div>
  </footer>
</html>
