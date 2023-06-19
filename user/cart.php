<?php
require_once("../backend/database.php");
session_start();
$user_id = $_SESSION['user_id'];
?>
<div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
        <h1 class="modal-title"><b>Your Cart <i class="bi bi-cart2"></i></b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">

        <table class="table table-striped" id="inventory_table">

            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amout</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $total_price = 0;
                $total_quantity = 0;
                $sql = "SELECT cart_id, product_image, product.product_id, product_name, product.product_price, SUM(cart_table.product_quantity) AS total_quantity 
                    FROM cart_table INNER JOIN product ON cart_table.product_id = product.product_id WHERE user_id = $user_id GROUP BY product_id";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $count++;
                    $cart_id = $row['cart_id'];
                    $product_image = $row['product_image'];
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_price = $row['product_price'];
                    $product_quantity = $row['total_quantity'];
                    $total_price = $total_price + ($product_price * $product_quantity);
                    $total_quantity = $total_quantity + $product_quantity;
                ?>
                    <tr>
                        <td>
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($product_image) . '" alt="image" style="height:100px;width:100px;"/>'; ?>
                            <?php echo $product_name ?>
                        </td>
                        <td><?php echo number_format($product_price, 2) ?></td>
                        <td><?php echo $product_quantity ?></td>
                        <td><?php echo number_format($product_quantity * $product_price, 2) ?></td>
                        <td><button class="btn btn-danger btn-sm" id="remove_cart" data-cart_id="<?php echo $cart_id ?>">Remove</button></td>
                    </tr>
                <?php
                } //
                ?>
                        </tbody>

            <p>You have <?php echo $count ?> items in your cart</p>
        </table>
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
        <div id="no_item" class="text-center">
            <h1>
                <i class="bi bi-cart-x"></i>
            </h1>
            <p>no items in cart</p>
        </div>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="check_out">Check out</button>
        <script>
            if (<?php echo $count ?> <= 0) {
                $('#check_out').hide()
                $('#no_item').show()
            } else {
                $('#check_out').show()
                $('#no_item').hide()
            }
        </script>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#check_out', function() {
            $('#payment_body').load('payment.php');
            $('#payment_modal').modal('show');
        })
        $(document).on('click', '#remove_cart', function() {
            var cart_id = $(this).data('cart_id');
            var values = {
                "cart_id": cart_id
            }
            $.ajax({
                type: "POST",
                url: "../backend/remove_cart.php",
                data: values,
                success: function(data) {

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: false,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Item Removed Successfully'
                    })
                    $("#cart_table_body").load("cart.php")
                    $('#cart_icon').load("cart_table_count.php")
                }
            });
        })
    })
</script>