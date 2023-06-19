<?php
    require_once("../backend/database.php");
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(DISTINCT order_table.order_id) as count
    FROM order_table 
    JOIN user_table ON order_table.user_id = user_table.user_id 
    JOIN product ON order_table.product_id = product.product_id
    WHERE order_table.order_status = 'pending' 
    AND order_table.user_id = $user_id";
    $query = mysqli_query($connection, $sql);
    $cart = mysqli_fetch_assoc($query);
    echo $cart['count'];
?>