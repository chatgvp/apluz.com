<?php
    require_once('database.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_table WHERE  username = '$username' AND password = '$password'";
    $query = mysqli_query($connection,$sql);
    $exist = mysqli_num_rows($query);
    if($exist>0)
    {
        echo "success";
    }else
    {
        echo "invalid";
    }
?>
