<?php
    require_once('database.php');
    $products = $_POST['products'];
    $supplier_id = $_POST['supplier_id'];
    $stock_id = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    $reason = $_POST['reason'];
    if($_POST['type'] == "stockin")
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $sqlstockin = "INSERT INTO `stockin`(`stockin_id`, `supplier_id`, `datetime`) VALUES ('$stock_id','$supplier_id','$currentDateTime')";
        $query = mysqli_query($connection, $sqlstockin);
        if($query) {
            foreach ($products as $productId => $stockIn) {
                $sql = "UPDATE `product` SET `product_quantity`=`product_quantity` + $stockIn WHERE `product_id`=$productId";
                $updateQuery = mysqli_query($connection, $sql);
                if($updateQuery) {
                    $sqlstockin_details = "INSERT INTO `stockin_details`(`stockin_id`, `product_id`, `supplier_id`, `stockin_quantity`) 
                    VALUES ('$stock_id','$productId','$supplier_id', '$stockIn')";
                    $querystockin_details = mysqli_query($connection, $sqlstockin_details);

                    if ($stockIn != 0) {
                        $action = "Stock with ID ($productId) has been stocked In by $stockIn";
                        $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
                        $transaction_query = mysqli_query($connection, $transaction);
                    }
                    
                } else {
                    echo "Error updating product quantity: " . mysqli_error($connection);
                }
            }
            echo "success";
        } else {
            echo "Error inserting into stockin: " . mysqli_error($connection);
        }
    }
    if($_POST['type'] == "stockout")
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $sqlstockout = "INSERT INTO `stockout`(`stockout_id`, `supplier_id`, `datetime`) VALUES ('$stock_id','$supplier_id','$currentDateTime')";
        $query = mysqli_query($connection, $sqlstockout);
        if($query) {
            foreach ($products as $productId => $stockOut) {
                $sql = "UPDATE `product` SET `product_quantity`=`product_quantity` - $stockOut WHERE `product_id`=$productId";
                $updateQuery = mysqli_query($connection, $sql);
                if($updateQuery) {
                    $sqlstockout_details = "INSERT INTO `stockout_details`(`stockout_id`, `product_id`, `supplier_id`, `quantity`, `reason`) 
                    VALUES ('$stock_id','$productId','$supplier_id',' $stockOut','$reason')";    
                    $querystockout_details = mysqli_query($connection, $sqlstockout_details);
                    
                    // $currentDateTime = date('Y-m-d H:i:s');

                    if ($stockIn != 0) {
                        $action = "Stock with ID ($productId) has been stocked out by $stockOut, reason : $reason";
                        $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
                        $transaction_query = mysqli_query($connection, $transaction);
                    }
                    
                } else {
                    echo "Error updating product quantity: " . mysqli_error($connection);
                }
            }
            echo "success";
        } else {
            echo "Error inserting into stockout: " . mysqli_error($connection);
        }
        
    }
?>