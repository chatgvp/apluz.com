<?php
    require_once("../backend/database.php");
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(DISTINCT order_table.order_id) AS count
    FROM order_table 
    JOIN user_table ON order_table.user_id = user_table.user_id 
    JOIN delivery_table ON order_table.order_id = delivery_table.order_id 
    JOIN product ON order_table.product_id = product.product_id
    WHERE delivery_table.delivery_status = 'delivered' 
    AND order_table.order_status = 'approved' 
    AND order_table.user_id = $user_id
    ";
    
    $query = mysqli_query($connection, $sql);
    $cart = mysqli_fetch_assoc($query);
    echo $cart['count'];
?>