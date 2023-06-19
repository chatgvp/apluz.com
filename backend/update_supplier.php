<?php
    require_once('database.php');
        $supplier_id = $_POST['supplier_id'];
        $supplier_name = $_POST['supplier_name'];
        $supplier_address = $_POST['supplier_address'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $timestamp = date('Y-m-d H:i:s');
        
        $sql = "UPDATE supplier SET supplier_name='$supplier_name', supplier_address='$supplier_address', telephone ='$telephone', email = '$email', supplier_updated = '$timestamp' WHERE supplier_id='$supplier_id'";
        $query = mysqli_query($connection, $sql);


        $currentDateTime = date('Y-m-d H:i:s');
        $action = "Supplier ".$supplier_name." has been updated";
        $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
        $transaction_query = mysqli_query($connection, $transaction);

        echo "success";
?>
