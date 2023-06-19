<?php
    require_once('database.php');

    $supplier_name = $_POST['supplier_name'];

    $sql = "SELECT * FROM supplier where supplier_name = '$supplier_name'";
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