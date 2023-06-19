<?php
    require_once('database.php');
    date_default_timezone_set('Asia/Manila');
    $payment_amount = 0;
    $user_id = $_POST['user_id'];
    $order_id = $_POST['order_id'];
    $order_date = date('Y-m-d H:i:s');
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];
    $delivery_date = "pending";
    $delivery_status = $_POST['delivery_status'];
    $order_status = $_POST['status'];
    $payment_id = rand(100000,999999);
    $sql = "SELECT product.product_id, product_name, product.product_price, cart_table.product_quantity 
    FROM cart_table INNER JOIN product ON cart_table.product_id = product.product_id WHERE user_id = $user_id";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query))
    {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];

        $order_sql = "INSERT INTO `order_table`(`id`, `order_id`, `user_id`, `product_id`, `product_price`, `product_quantity`, `order_status`, `order_date`) 
        VALUES                                  (null,'$order_id','$user_id','$product_id','$product_price','$product_quantity','$order_status','$order_date')";
        $order_query = mysqli_query($connection, $order_sql);

        $payment_amount = $payment_amount + ($product_price * $product_quantity);

        // minus sa database <----------->
        $qty_sql = "SELECT product_quantity as qty FROM product WHERE product_id = $product_id";
        $qty_query = mysqli_query($connection, $qty_sql);
        $qty = mysqli_fetch_assoc($qty_query);

        $product_minus = $qty['qty'] - $product_quantity;
        $data_sql = "UPDATE `product` SET `product_quantity`='$product_minus' WHERE product_id = $product_id";
        $data_query = mysqli_query($connection, $data_sql);
        // hangtod diria <----------->
        //   $user_sql = "SELECT user_name FROM users WHERE user_id = $user_id";
        // $user_query = mysqli_query($connection, $user_sql);
        // $user_result = mysqli_fetch_assoc($user_query);
        // $user_name = $user_result['user_name'];
    }
    $reset_sql = "DELETE FROM `cart_table` WHERE user_id = $user_id";
    $reset_query = mysqli_query($connection, $reset_sql);
    //echo $order_id;
    $payment_sql = "INSERT INTO `payment_table`(`payment_id`, `order_id`, `user_id`, `payment_amount`, `payment_method`, `payment_status`) 
    VALUES (null, '$order_id','$user_id','$payment_amount','$payment_method', '$payment_status')";
    $payment_query = mysqli_query($connection, $payment_sql);

    $currentDateTime = date('Y-m-d H:i:s');
    $action = "User with ID ($user_id) creates order($order_id)";
    $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
    $transaction_query = mysqli_query($connection, $transaction);
?>