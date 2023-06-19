<?php
    require_once('database.php');
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $sql="INSERT INTO `cart_table`(`cart_id`, `product_id`, `user_id`, `product_price`, `product_quantity`) 
    VALUES (null, $product_id, $user_id, $product_price, $product_quantity)";
    $query = mysqli_query($connection, $sql);
    echo $sql;
?>