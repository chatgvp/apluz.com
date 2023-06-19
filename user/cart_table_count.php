<?php
    require_once("../backend/database.php");
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(*) as count FROM cart_table where user_id = $user_id";
    $query = mysqli_query($connection, $sql);
    $cart = mysqli_fetch_assoc($query);
    echo $cart['count'];
?>