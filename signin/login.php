<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/fae31e57e1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="icon" href="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="../style.css?v=1">
    <title>Login</title>
</head>

<body class="d-flex flex-column min-vh-100 layout-top-nav">
    <nav class="main-header navbar navbar-expand navbar-light bg-light navbar-white shadow">
        <div class="container">
            <a href="../index.php" class="navbar-brand">
                <img src="http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" alt="Apluz Logo" style="height: 40px;">
                <span class="brand-text font-weight-light">Apluz</span>
            </a>
            <!-- Left navbar links -->
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
                                        console.log(selectedOption)
                                        // add click event listener to options
                                        $('#datalistOptions option').click(function() {
                                        selectedOption = $(this);
                                        });

                                        $('#exampleDataList').keyup(function() {
                                        if (selectedOption) {
                                            var productId = selectedOption.data('id');
                                            console.log(productId);
                                            window.location.href = '../item_select.php?id=' + productId;
                                        }
                                        });
                                    }
                                    });
                                });
                            });
                        </script>
                    </form>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item active bg-info rounded d-none d-sm-inline-block">
                    <a href="#" class="nav-link text-white">LogIn</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="signup.php" class="nav-link">SignUp</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->
    <div class="container justify-content-center">
        <div class="row align-items-start pt-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 ms-1 ms-md-1 ms-lg-5 text-center" id="body-about">

            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 ms-1 shadow shadow-lg" id="whole-content">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item pt-3">
                        <button class="nav-link text-black" id="tab-login" href="#">Login</button>
                    </li>
                    <li class="nav-item pt-3">
                        <button class="nav-link text-black" id="tab-admin" href="#">LogIn as Admin</button>
                    </li>
                </ul>
                <hr>
                <form>
                    <div class="pb-4" id="content-login">
                        <div>
                            <h5 class=" text-center py-3">Sign In</h5>
                            <div class="form-floating form-outline mb-3">
                                <input class="form-control" placeholder="Username" id="username" name="username" />
                                <label for="username">Username</label>
                            </div>
                            <!-- Password input -->
                            <div class="form-floating form-outline">
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" />
                                <label for="password">Password</label>
                            </div>
                            <div class="text-start pt-2">
                                <p class="small fw-bold  pt-1">Don't have an account? <a href="signup.php" class="link-danger" id="signup">Sign Up</a></p>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-success" id="login">SIGN IN</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
<footer class="text-center mt-5">
    <div class="footer-copyright py-3">© 2022 Copyright:
        <a href="../backend/create_account.php"> apluzelectronics.42web.io</a>
    </div>
</footer>

</html>


<script>
    $(function() {

        $("#body-about").load("../about.php");
    })
    $(document).on('click', '#tab-login', function() {
        $("#content-login").load("login.php #content-login");
    })
    $(document).on('click', '#tab-admin', function() {
        $("#content-login").load("login_admin.php");
    })
    /**var data_values =
    {
        "username" : username, "password" : password
    }
    if(password === confirm_password)
    {
        Swal.fire({
        title: 'Are you sure you want to Register ?',
        text: "",
        icon: 'question',
        showCancelButton: true,
        }).then((result) => {
        if (result.isConfirmed){
            register(data_values);
        }
        });
    }
    else
    {
        $("#wrong_password").html("incorrect password");
    } */
    $(document).on('click', '#login', function() {
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == "" || password == "") {
            Swal.fire({
                icon: 'error',
                title: 'Sign In Failed',
                text: 'Enter Username and Password',
            })
            return; //stop
        }
        checklogin(username, password);
    })

    function checklogin(username, password) {
        var values = {
            "username": username,
            "password": password
        }
        $.ajax({
            type: "POST",
            url: "../backend/acc_exist.php",
            data: values,
            cache: false,
            success: function(data) {
                if (data == "success") {
                    gotoNewPage(username)
                }
                if (data == "invalid") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Log In Failed',
                        text: 'Incorect Username or Password',
                    })
                }
            }
        });
    }

    function gotoNewPage(username) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Congratulations',
            text: 'You login successfully!',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        }).then(
            function() {
                location.href = '../user/user.php?username=' + username;
            }
        )
    }
    $(document).keypress(function(event) {
  if (event.which == 13) {
    // your action here, triggered when the Enter key is pressed
    var username = $("#username").val();
        var password = $("#password").val();
        checklogin(username, password);
  }
});
</script>