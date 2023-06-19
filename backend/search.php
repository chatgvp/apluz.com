<?php
    include('database.php');
    $searchTerm = $_POST['search'];
    $sql = "SELECT DISTINCT product_id, product_name, product_image, product_price FROM product WHERE product_name LIKE '%$searchTerm%' LIMIT 5";
    
    $query = mysqli_query($connection, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = array(
            'product_id' => $row['product_id'],
            'product_name' => $row['product_name']
            // 'product_image' => $row['product_image'],
            // 'product_price' => $row['product_price']
        );
    }

    echo json_encode($data);
?>
