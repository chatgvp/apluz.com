<?php
    require_once('database.php');
    date_default_timezone_set('Asia/Manila');
    $user_id = $_POST['user_id'];
    $payment_id = $_POST['payment_id'];
    $courier_name = $_POST['courier_name'];
    $courier_number = $_POST['courier_number'];
    $order_id = $_POST['order_id'];
    $delivery_status = $_POST['delivery_status'];
    $currentDateTime = date('Y-m-d H:i:s');
    // echo $currentDateTime;
    
    $delivery_date = $_POST['delivery_date'];
    //$sql = "UPDATE `order_table` SET `delivery_status`='$delivery_status',`status`='$status',`delivery_date`='$delivery_date' WHERE order_id = $order_id";
    //$query = mysqli_query($connection, $sql);
    $delivery_sql = "INSERT INTO `delivery_table` (`delivery_id`, `user_id`, `order_id`, `payment_id`, `delivery_date`, `delivery_status`, `courier_name`, `courier_number`) 
    VALUES (null, '$user_id', '$order_id', '$payment_id', '$delivery_date', '$delivery_status', '$courier_name', '$courier_number')";

    // $delivery_sql = "INSERT INTO `delivery_table`   (`delivery_id`, `user_id`, `order_id`, `payment_id`, `delivery_date`, `delivery_status`, courier_name`, courier_number`) 
    // VALUES                                          (null ,         '$user_id','$order_id','$payment_id','$delivery_date','$delivery_status','$courier_name','$courier_number')";
    $delivery_query = mysqli_query($connection, $delivery_sql);

    $order_status = $_POST['order_status'];
    $order_sql = "UPDATE `order_table` SET `order_status`='$order_status' WHERE order_id = $order_id";
    $order_query = mysqli_query($connection, $order_sql);

    $currentDateTime = date('Y-m-d H:i:s');
    $action = "Order $order_id has been shipped";
    $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
    $transaction_query = mysqli_query($connection, $transaction);
    

    
    
    
?>
