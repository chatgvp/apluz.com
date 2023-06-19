<!DOCTYPE html>
    <head>
        <title>Apluz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <style>
            .nav-link{
                color: #4A4A4B ;
            }
            .nav-link:hover{
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            * {
                font-family: 'Poppins';
                font-style: normal;
            }
            .card:hover
            {
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            .card {
                margin: 0 auto;
                float: none;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" style="height: 120px;">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row pt-5" id="index">
                <div class="col-2">
                    <div class="sticky-lg-top m-0 justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="list-style-type: none; padding: 20px;" >
                                <a class="nav-link" href="#" id="dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a>
                                <a class="nav-link" href="#" id="customers"><i class="bi bi-person-lines-fill"></i> Customers</a>
                                <a class="nav-link" href="#" id="sales"><i class="bi bi-receipt"></i> Sales</a>
                                <a class="nav-link" href="#" id="inventory"><i class="bi bi-box"></i> Inventory</a>
                                <a class="nav-link" href="#" id="orders"><i class="bi bi-list-ul"></i> Orders</a>
                                <a class="nav-link" href="#" id="service"><i class="bi bi-tools"></i> Service</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col" id="content">
                    <div id="content-dashboard">
                        <div class="row p-5">
                            <div class="col border p-5 m-5">
                                <h1>Sales</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Customers</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Stocks</h1>
                            </div>
                            
                        </div>
                        <div class="row p-5">
                            <div class="col  border p-5 m-5">
                                <h1>Orders</h1>
                            </div>
                            <div class="col  border p-5 m-5">
                                <h1>Service</h1>
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

<script>
    $(document).ready(function() {
        
    });
    $(document).on('click','#dashboard', function()
    {
        $("#content").load("index.php #content-dashboard");
    })
    $(document).on('click','#customers', function()
    {
        $("#content").load("customers.php");
    })
    $(document).on('click','#sales', function()
    {
        $("#content").load("sales.php");
    })
    $(document).on('click','#inventory', function()
    {
        $("#content").load("inventory.php");
    })
    $(document).on('click','#orders', function()
    {
        $("#content").load("orders.php");
    })
    $(document).on('click','#service', function()
    {
        $("#content").load("service.php");
    })
</script><!DOCTYPE html>
    <head>
        <title>Apluz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <style>
            .nav-link{
                color: #4A4A4B ;
            }
            .nav-link:hover{
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            * {
                font-family: 'Poppins';
                font-style: normal;
            }
            .card:hover
            {
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            .card {
                margin: 0 auto;
                float: none;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" style="height: 120px;">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row pt-5" id="index">
                <div class="col-2">
                    <div class="sticky-lg-top m-0 justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="list-style-type: none; padding: 20px;" >
                                <a class="nav-link" href="#" id="dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a>
                                <a class="nav-link" href="#" id="customers"><i class="bi bi-person-lines-fill"></i> Customers</a>
                                <a class="nav-link" href="#" id="sales"><i class="bi bi-receipt"></i> Sales</a>
                                <a class="nav-link" href="#" id="inventory"><i class="bi bi-box"></i> Inventory</a>
                                <a class="nav-link" href="#" id="orders"><i class="bi bi-list-ul"></i> Orders</a>
                                <a class="nav-link" href="#" id="service"><i class="bi bi-tools"></i> Service</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col" id="content">
                    <div id="content-dashboard">
                        <div class="row p-5">
                            <div class="col border p-5 m-5">
                                <h1>Sales</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Customers</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Stocks</h1>
                            </div>
                            
                        </div>
                        <div class="row p-5">
                            <div class="col  border p-5 m-5">
                                <h1>Orders</h1>
                            </div>
                            <div class="col  border p-5 m-5">
                                <h1>Service</h1>
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

<script>
    $(document).ready(function() {
        
    });
    $(document).on('click','#dashboard', function()
    {
        $("#content").load("index.php #content-dashboard");
    })
    $(document).on('click','#customers', function()
    {
        $("#content").load("customers.php");
    })
    $(document).on('click','#sales', function()
    {
        $("#content").load("sales.php");
    })
    $(document).on('click','#inventory', function()
    {
        $("#content").load("inventory.php");
    })
    $(document).on('click','#orders', function()
    {
        $("#content").load("orders.php");
    })
    $(document).on('click','#service', function()
    {
        $("#content").load("service.php");
    })
</script><!DOCTYPE html>
    <head>
        <title>Apluz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <style>
            .nav-link{
                color: #4A4A4B ;
            }
            .nav-link:hover{
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            * {
                font-family: 'Poppins';
                font-style: normal;
            }
            .card:hover
            {
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            .card {
                margin: 0 auto;
                float: none;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" style="height: 120px;">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row pt-5" id="index">
                <div class="col-2">
                    <div class="sticky-lg-top m-0 justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="list-style-type: none; padding: 20px;" >
                                <a class="nav-link" href="#" id="dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a>
                                <a class="nav-link" href="#" id="customers"><i class="bi bi-person-lines-fill"></i> Customers</a>
                                <a class="nav-link" href="#" id="sales"><i class="bi bi-receipt"></i> Sales</a>
                                <a class="nav-link" href="#" id="inventory"><i class="bi bi-box"></i> Inventory</a>
                                <a class="nav-link" href="#" id="orders"><i class="bi bi-list-ul"></i> Orders</a>
                                <a class="nav-link" href="#" id="service"><i class="bi bi-tools"></i> Service</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col" id="content">
                    <div id="content-dashboard">
                        <div class="row p-5">
                            <div class="col border p-5 m-5">
                                <h1>Sales</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Customers</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Stocks</h1>
                            </div>
                            
                        </div>
                        <div class="row p-5">
                            <div class="col  border p-5 m-5">
                                <h1>Orders</h1>
                            </div>
                            <div class="col  border p-5 m-5">
                                <h1>Service</h1>
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

<script>
    $(document).ready(function() {
        
    });
    $(document).on('click','#dashboard', function()
    {
        $("#content").load("index.php #content-dashboard");
    })
    $(document).on('click','#customers', function()
    {
        $("#content").load("customers.php");
    })
    $(document).on('click','#sales', function()
    {
        $("#content").load("sales.php");
    })
    $(document).on('click','#inventory', function()
    {
        $("#content").load("inventory.php");
    })
    $(document).on('click','#orders', function()
    {
        $("#content").load("orders.php");
    })
    $(document).on('click','#service', function()
    {
        $("#content").load("service.php");
    })
</script><!DOCTYPE html>
    <head>
        <title>Apluz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <style>
            .nav-link{
                color: #4A4A4B ;
            }
            .nav-link:hover{
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            * {
                font-family: 'Poppins';
                font-style: normal;
            }
            .card:hover
            {
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            .card {
                margin: 0 auto;
                float: none;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" style="height: 120px;">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row pt-5" id="index">
                <div class="col-2">
                    <div class="sticky-lg-top m-0 justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="list-style-type: none; padding: 20px;" >
                                <a class="nav-link" href="#" id="dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a>
                                <a class="nav-link" href="#" id="customers"><i class="bi bi-person-lines-fill"></i> Customers</a>
                                <a class="nav-link" href="#" id="sales"><i class="bi bi-receipt"></i> Sales</a>
                                <a class="nav-link" href="#" id="inventory"><i class="bi bi-box"></i> Inventory</a>
                                <a class="nav-link" href="#" id="orders"><i class="bi bi-list-ul"></i> Orders</a>
                                <a class="nav-link" href="#" id="service"><i class="bi bi-tools"></i> Service</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col" id="content">
                    <div id="content-dashboard">
                        <div class="row p-5">
                            <div class="col border p-5 m-5">
                                <h1>Sales</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Customers</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Stocks</h1>
                            </div>
                            
                        </div>
                        <div class="row p-5">
                            <div class="col  border p-5 m-5">
                                <h1>Orders</h1>
                            </div>
                            <div class="col  border p-5 m-5">
                                <h1>Service</h1>
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

<script>
    $(document).ready(function() {
        
    });
    $(document).on('click','#dashboard', function()
    {
        $("#content").load("index.php #content-dashboard");
    })
    $(document).on('click','#customers', function()
    {
        $("#content").load("customers.php");
    })
    $(document).on('click','#sales', function()
    {
        $("#content").load("sales.php");
    })
    $(document).on('click','#inventory', function()
    {
        $("#content").load("inventory.php");
    })
    $(document).on('click','#orders', function()
    {
        $("#content").load("orders.php");
    })
    $(document).on('click','#service', function()
    {
        $("#content").load("service.php");
    })
</script><!DOCTYPE html>
    <head>
        <title>Apluz</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <style>
            .nav-link{
                color: #4A4A4B ;
            }
            .nav-link:hover{
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            * {
                font-family: 'Poppins';
                font-style: normal;
            }
            .card:hover
            {
                background-color: #d2d2d6;
                border-radius: 10px;
                color: #4A4A4B ;
            }
            .card {
                margin: 0 auto;
                float: none;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" style="height: 120px;">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row pt-5" id="index">
                <div class="col-2">
                    <div class="sticky-lg-top m-0 justify-content-center">
                        <ul class="navbar-nav">
                            <li class="nav-item" style="list-style-type: none; padding: 20px;" >
                                <a class="nav-link" href="#" id="dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a>
                                <a class="nav-link" href="#" id="customers"><i class="bi bi-person-lines-fill"></i> Customers</a>
                                <a class="nav-link" href="#" id="sales"><i class="bi bi-receipt"></i> Sales</a>
                                <a class="nav-link" href="#" id="inventory"><i class="bi bi-box"></i> Inventory</a>
                                <a class="nav-link" href="#" id="orders"><i class="bi bi-list-ul"></i> Orders</a>
                                <a class="nav-link" href="#" id="service"><i class="bi bi-tools"></i> Service</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col" id="content">
                    <div id="content-dashboard">
                        <div class="row p-5">
                            <div class="col border p-5 m-5">
                                <h1>Sales</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Customers</h1>
                            </div>
                            <div class="col border p-5 m-5">
                                <h1>Stocks</h1>
                            </div>
                            
                        </div>
                        <div class="row p-5">
                            <div class="col  border p-5 m-5">
                                <h1>Orders</h1>
                            </div>
                            <div class="col  border p-5 m-5">
                                <h1>Service</h1>
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

<script>
    $(document).ready(function() {
        
    });
    $(document).on('click','#dashboard', function()
    {
        $("#content").load("index.php #content-dashboard");
    })
    $(document).on('click','#customers', function()
    {
        $("#content").load("customers.php");
    })
    $(document).on('click','#sales', function()
    {
        $("#content").load("sales.php");
    })
    $(document).on('click','#inventory', function()
    {
        $("#content").load("inventory.php");
    })
    $(document).on('click','#orders', function()
    {
        $("#content").load("orders.php");
    })
    $(document).on('click','#service', function()
    {
        $("#content").load("service.php");
    })
</script>