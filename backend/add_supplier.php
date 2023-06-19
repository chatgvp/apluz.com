<?php
   require_once('database.php');
   $s_name = $_POST['supplier_name'];
   $s_address = $_POST['supplier_address'];
   $telephone = $_POST['telephone'];
   $email = $_POST['email'];
   $sql = "INSERT INTO supplier (supplier_name, supplier_address, telephone, email) 
   VALUES ('$s_name', '$s_address', '$telephone', '$email')";
   $query = mysqli_query($connection, $sql);

    $currentDateTime = date('Y-m-d H:i:s');
    $action = "Supplier $s_name has been added";
    $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
    $transaction_query = mysqli_query($connection, $transaction);
?>