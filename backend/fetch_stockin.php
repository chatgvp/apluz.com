<?php
include('database.php');

if(isset($_POST['supplier_id'])){
  $supplier_id = $_POST['supplier_id'];
  
  $sql = "SELECT * FROM product WHERE supplier_id = '$supplier_id'";
  $query = mysqli_query($connection, $sql);
  
  $products = array();
  while ($row = mysqli_fetch_assoc($query)) {
    $product = array(
        "product_name" => $row['product_name'],
        "product_id" => $row['product_id'],
        "product_quantity" => $row['product_quantity'],
        "product_price" => $row['product_price']
    );
    array_push($products, $product);
  }
  
  echo json_encode($products);
}
?>
