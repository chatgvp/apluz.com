<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel = "icon" href = "http://drive.google.com/uc?export=view&id=1DHTMZ51-z7K5uwHlGVyXMLTX2czK8v3c" type = "image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="../style.css">
        <title>Sign up</title>
    </head>
    <body class="d-flex flex-column min-vh-100">
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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="login.php" class="nav-link">LogIn</a>
                </li>
                <li class="nav-item active bg-info rounded d-none d-sm-inline-block">
                    <a href="signup.php" class="nav-link text-white">SignUp</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->
        <div class="container bg-light shadow shadow-lg my-5 p-3">
            <div class="row pt-3 ps-3">
                <h4 class="text-center"><b>Create an Account</b></h4>
                  <p class="text-danger ps-3 ps-sm-5 ps-md-2 ps-lg-5">required(*)</span></p>
                <div class="col-11 col-sm-10 col-md-6 col-lg-5 me-lg-5 ps-3 ps-sm-5 ps-md-2 ps-lg-5">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" placeholder="First name*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Last name*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password*">
                            <p id="password_checker"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password*">
                            <p class="text-danger" id="wrong_password"></p>
                        </div>
                    </form>
                </div>
                <div class="col-11 col-sm-10 col-md-6 col-lg-5 ps-3 ps-sm-5 ps-md-2 ps-lg-5">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact number</label>
                        <input type="tel" class="form-control" id="contactNum" placeholder="Contact Number*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address*">
                    </div>
                    <div class="mb-3">
                        <p>Are you from bukidnon?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="choice" value="yes" id="radio_yes">
                            <label class="form-check-label" for="yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="choice" value="no" id="radio_no">
                            <label class="form-check-label" for="no">No</label>
                        </div>
                        <button type="button" class="btn btn-primary rounded-pill form-control mt-3" id="signup">Sign Up</button>
                    </div>
                </div>
                <p class="small fw-bold ps-3 ps-sm-5 ps-md-2 ps-lg-5">Already have an account? <a href="login.php" class="text-danger" id="login">Sign In</a></p>
            </div>
        </div>
    </body>
    <footer class="shadow-lg mt-5 text-center mt-auto">
        <div class="footer-copyright py-3">© 2022 Copyright:
            <a href="../backend/create_account.php"> apluzelectronics.42web.io</a>
        </div>
    </footer>
</html>


<script>
    $(document).ready(function()
    {
        $('#fname').on('input', function(){
            $('#fname').css('border-color', '#d2d2d6');
        })
        $('#lname').on('input', function(){
            $('#lname').css('border-color', '#d2d2d6');
        })
        $('#username').on('input', function(){
            $('#username').css('border-color', '#d2d2d6');
        })
        $('#contactNum').on('input', function(){
            $('#contactNum').css('border-color', '#d2d2d6');
        })
        $('#password').on('input', function(){
            $('#password').css('border-color', '#d2d2d6');
            if($('#password').val().length <= 5)
            {
                $('#password_checker').html("<p class='text-danger'>Weak</p>");
            }
            else{
                $('#password_checker').html("<p class='text-success'>Strong</p>");
            }
        })
        $('#confirm_password').on('input', function(){
            $('#confirm_password').css('border-color', '#d2d2d6');
        })
        $('#email').on('input', function(){
            $('#email').css('border-color', '#d2d2d6');
        })
        $('#address').on('input', function(){
            $('#address').css('border-color', '#d2d2d6');
        })
        $('input[type="radio"]').click(function() 
        {
            var radio = $(this).attr("value");
            $('#radio_yes').css('border-color', '#d2d2d6');
            $('#radio_no').css('border-color', '#d2d2d6');
        });
        $(document).on('click', '#signup', function()
        {
            //alert(radio)
            //var radio = $(this).attr("value");
            var user_id = $("#id").val();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var email = $("#email").val();
            var contactNum = $("#contactNum").val();
            var address = $("#address").val();
            
            if(fname=="")
            {
                $('#fname').css('border-color', 'red');
            }
            if(lname=="")
            {
                $('#lname').css('border-color', 'red');
            }
            if(username=="")
            {
                $('#username').css('border-color', 'red');
            }
            if(password=="")
            {
                $('#password').css('border-color', 'red');
            }
            if(confirm_password=="")
            {
                $('#confirm_password').css('border-color', 'red');
            }
            if(email=="")
            {
                $('#email').css('border-color', 'red');
            }
            if(contactNum=="")
            {
                $('#contactNum').css('border-color', 'red');
            }
            if(address=="")
            {
                $('#address').css('border-color', 'red');
            }
            else
            {
                var data_values =
                {
                    "user_id" : user_id,
                    "fname" : fname,
                    "lname" : lname,
                    "username" : username,
                    "password" : password,
                    "email" : email,
                    "contactNum" : contactNum,
                    "address" : address
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
                        signup(data_values);
                    }
                    });
                }
                else
                {
                    $("#wrong_password").html("incorrect password");
                }
            }
        })
    })
    
    function signup(data_values)
    {
        // Check if account already exists
        $.ajax({
            type: "POST",
            url: "../backend/acc_exist.php",
            data: data_values,
            cache: false,
            success: function(response) {
                if (response == "success") {
                    // Account already exists, display error message
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Account already exists',
                        text: 'Please choose a different username',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    // Account does not exist, create new account
                    $.ajax({
                        type: "POST",
                        url: "../backend/create_account.php",
                        data: data_values,
                        cache: false,
                        success: function(data) {
                            register_success();
                        }
                    });
                }
            }
        });
    }

    function register_success()
    {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Register Successfull',
            text: 'Redirecting to Login...',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = "login.php";
        });
    }

</script>
