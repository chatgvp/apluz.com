<div>
    <h5 class=" text-center mb-4">Sign In as Admin</h5>
    <div class="form-floating form-outline mb-3">
        <input class="form-control" placeholder="Username" id="username" name="username"/>
        <label for="username">Username</label>
    </div>
    <!-- Password input -->
    <div class="form-floating form-outline">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password"/>
            <label for="password">Password</label>
    </div>
    <div class="mt-3 d-grid gap-2">
    <button type="button" class="btn btn-success" id="admin_login">SIGN IN</button>
    </div>
    <br>
</div>
<script>
    $(document).on('click', '#admin_login', function()
    {
        var username = $("#username").val();
        var password = $("#password").val();
        checklogin(username, password);
    })
    function checklogin(username, password)
    {
        var values =
        {
            "username": username,
            "password": password
        }
        $.ajax
        ({
            type: "POST",
            url: "../backend/admin_exist.php",
            data: values,
            cache: false,
            success: function(data)
            {
                if(data=="success")
                {
                    gotoNewPage(username)
                }
                if(data=="invalid")
                {
                    alert("Not Login")
                }
            }
        });
    }
    function gotoNewPage(username)
    {
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
            location.href = '../admin/dashboard.php';
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
