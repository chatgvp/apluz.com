<?php
    require_once('database.php');
    $cart_id = $_POST['cart_id'];
    $sql = "DELETE FROM `cart_table` WHERE cart_id = $cart_id";
    $query = mysqli_query($connection, $sql);
?>
