<?php
    require_once("../backend/database.php");
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(*) as count FROM (
        SELECT order_table.order_id, MAX(product.product_image) AS product_image
            FROM order_table 
            JOIN user_table ON order_table.user_id = user_table.user_id 
            JOIN product ON order_table.product_id = product.product_id
            WHERE order_table.user_id = $user_id
            GROUP BY order_table.order_id
    ) AS subquery
    ";
    $query = mysqli_query($connection, $sql);
    $cart = mysqli_fetch_assoc($query);
    echo $cart['count'];
?>