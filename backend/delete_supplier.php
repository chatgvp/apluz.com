<?php
    require_once('database.php');
    $supplier_id = $_POST['supplier_id'];
    $sql = "DELETE FROM supplier WHERE `supplier`.`supplier_id` = $supplier_id";
    $query = mysqli_query($connection, $sql);

    // $supplier_id = $_POST['supplier_id'];
    $sql = "SELECT supplier_name FROM supplier WHERE supplier_id = $supplier_id";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
    $supplier_name = $row['supplier_name'];


    $currentDateTime = date('Y-m-d H:i:s');
    $action = "Supplier $supplier_name has been deleted";
    $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
    $transaction_query = mysqli_query($connection, $transaction);
?>

