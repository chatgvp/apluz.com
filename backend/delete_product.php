<?php
    require_once('database.php');
    $product_id = $_POST['product_id'];
    $sql = "DELETE FROM product WHERE `product`.`product_id` = $product_id";
    $query = mysqli_query($connection, $sql);
?>