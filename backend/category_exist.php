<?php
    require_once('database.php');

    $category_name = $_POST['category_name'];

    $sql = "SELECT * FROM category where category_name = '$category_name'";
    $query = mysqli_query($connection, $sql);
    $exist = mysqli_num_rows($query);
    if($exist>0)
    {
        echo "success";
    }else
    {
        echo "invalid";
    }
?>
