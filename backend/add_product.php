<?php
    require_once('database.php');
    if(isset($_POST['product_name']))
    {
        $supplier_id = $_POST['supplier_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];
        $product_category = $_POST['product_category'];
        $product_description = $_POST['product_description'];
        $product_specs = $_POST['product_specs'];
        $product_image = addslashes(file_get_contents($_FILES['product_image']['tmp_name']));
        $sql = "INSERT INTO `product`(`supplier_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `product_description`, `category_id`, `product_specs`) 
                VALUES               ('$supplier_id', '$product_name','$product_image','$product_price','$product_quantity', '$product_description','$product_category', '$product_specs')";
        $query = mysqli_query($connection, $sql);

        $currentDateTime = date('Y-m-d H:i:s');
        $action = "Product $product_name has been added";
        $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
        $transaction_query = mysqli_query($connection, $transaction);

        echo "success";
    }
    else{
        echo "error";
    }
?>