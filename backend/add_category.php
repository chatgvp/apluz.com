<?php
    require_once('database.php');
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";
    $query = mysqli_query($connection, $sql);

    $currentDateTime = date('Y-m-d H:i:s');
    $action = "$category_name has been added to categories";
    $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
    $transaction_query = mysqli_query($connection, $transaction);
?>
