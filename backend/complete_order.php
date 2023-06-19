<?php
    require_once('database.php');
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $delivery_status = $_POST['delivery_status'];
    $total_quantity = $_POST['total_quantity'];
    $Amount = $_POST['Amount'];
    
    // Update the payment status of the order
    $update_payment_sql = "UPDATE `payment_table` SET `payment_status`='$payment_status' WHERE order_id = $order_id";
    $update_payment_query = mysqli_query($connection, $update_payment_sql);

    // Check if the order exists in the sales table, if not insert a new record
    $order_sql = "SELECT order_id FROM sales WHERE order_id = '$order_id'";
    $order_query = mysqli_query($connection, $order_sql);
    
    $order_exist  = mysqli_num_rows($order_query);
    if($order_exist <= 0)
    {
        $sales_sql = "INSERT INTO `sales`(`sales_id`, `order_id`, `Amount`) VALUES (null,'$order_id','$Amount')";
        $sales_query = mysqli_query($connection, $sales_sql);
    }

    // Update the delivery status of the order
    $update_delivery_sql = "UPDATE `delivery_table` SET `delivery_status`='$delivery_status' WHERE order_id = $order_id";
    $update_delivery_query = mysqli_query($connection, $update_delivery_sql);

    // Deduct the product_quantity of the product
    $product_sql = "SELECT DISTINCT `product`.`product_id`, `product`.`product_quantity`
    FROM `product`
    INNER JOIN `order_table` ON `product`.`product_id` = `order_table`.`product_id`
    WHERE `order_table`.`order_id` = $order_id";
    $product_query = mysqli_query($connection, $product_sql);
    while ($row = mysqli_fetch_assoc($product_query)) {
        $product_id = $row['product_id'];
        $product_quantity = $row['product_quantity'];
        $update_product_sql = "UPDATE `product` SET `product_quantity`=`product_quantity`- $total_quantity WHERE `product_id`='$product_id'";
        $update_product_query = mysqli_query($connection, $update_product_sql);
    }

    // Insert a new transaction record
    $currentDateTime = date('Y-m-d H:i:s');
    $action = "Order $order_id has been delivered";
    $transaction_sql = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
    $transaction_query = mysqli_query($connection, $transaction_sql);
?>
