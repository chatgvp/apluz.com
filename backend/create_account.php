<?php 
    require_once('database.php');
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contactNum	 = $_POST['contactNum'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `user_table`(`user_id`, `fname`, `lname`, `username`, `password`, `email`, `contactNum`, `address`) 
    VALUES (null, '$fname', '$lname', '$username', '$password', '$email', '$contactNum', '$contactNum')";
    
    $query = mysqli_query($connection, $sql);

    $currentDateTime = date('Y-m-d H:i:s');
    $action = "User $username has been added";
    $transaction = "INSERT INTO `transaction`(`transaction_id`, `action`, `date_time`) VALUES (null,'$action','$currentDateTime')";
    $transaction_query = mysqli_query($connection, $transaction);
?>