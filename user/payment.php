<?php
require_once("../backend/database.php");
session_start();
//$_SESSION['order_id'] = "";
$user_id = $_SESSION['user_id'];
//  $product_id = $_SESSION['product_id'];
?>
<div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header">
        <h3 class="modal-title"><b>Payment</b></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <!-- Modal body -->
    <div class="modal-body col">
        <div class="row">
            <div class="col">
                <?php
                $count = 0;
                $total_price = 0;
                $total_quantity = 0;
                $sql = "SELECT product.product_id, product.product_price, cart_table.product_quantity
                FROM cart_table INNER JOIN product ON cart_table.product_id = product.product_id WHERE user_id = $user_id";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $count++;
                    $product_price = $row['product_price'];
                    $product_quantity = $row['product_quantity'];
                    $total_price = $total_price + ($product_price * $product_quantity);
                    $total_quantity = $total_quantity + $product_quantity;
                }
                $sql = "SELECT * FROM `user_table` WHERE user_id = $user_id";
                $query = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $contactNum = $row['contactNum'];
                    $address = $row['address'];
                }
                ?>
                <div class="summary">
                    <h5><b>Summary</b></h5>
                    <hr>
                    <?php echo "<p><b>Name: </b><span>$fname $lname</span></p>" ?>
                    <?php echo "<p><b>Address: </b><span>$address</span></p>" ?>
                    <?php echo "<p><b>Contact number: </b><span>$contactNum</span></p>" ?>
                    <?php echo "<p><b>Email: </b><span>$email</span></p>" ?>
                </div>
            </div>
            <div class="col">
                <h6><b>Payment Method</b></h6>
                <select class="form-select" id="payment_method">
                    <option selected value="cash_delivery">Cash on Delivery</option>
                    <option value="gcash">Gcash</option>
                </select>
                <br>
                <div class="form-group" id="gcash_div">
                    <label>Gcash Number</label>
                    <input type="number" class="form-control" id="gcash_number">
                    <p class="text-danger" id="gcash_error"></p>
                </div>
            </div>
            <table class="table " id="inventory_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0;
                    $total_quantity = 0;
                    $sql = "SELECT cart_id, product_image, product.product_id, product_name, product.product_price, SUM(cart_table.product_quantity) AS total_quantity 
                    FROM cart_table INNER JOIN product ON cart_table.product_id = product.product_id WHERE user_id = $user_id GROUP BY product_id";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $product_name = $row['product_name'];
                        $product_price = $row['product_price'];
                        $product_quantity = $row['total_quantity'];
                        $total_price = $total_price + ($product_price * $product_quantity);
                        $total_quantity = $total_quantity + $product_quantity;
                    ?>
                        <tr>
                            <td><?php echo $product_name ?></td>
                            <td><?php echo number_format($product_price, 2) ?></td>
                            <td><?php echo $product_quantity ?></td>
                            <td><?php echo number_format($product_quantity * $product_price, 2) ?></td>
                        </tr>
                    <?php
                    } //
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-end me pe-5" name="deliveryfee" colspan="3">Delivery Fee:</th>
                        <th class="text-start py-1 px-2  deliveryfee"><strong class="text-success">Free</strong></th>
                    </tr>
                    <tr>
                        <th class="text-end me pe-5" name="totalPayment" colspan="3">Total Payment:</th>
                        <th class="text-start py-1 px-2  totalPayment"><strong>₱<?php echo number_format($total_price, 2) ?></strong></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
        <div>
            <button class="btn btn-success" style="float: right;" id="place_order">Place Order</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#gcash_div').hide();
        $('#payment_method').on('change', function() {
            var value = $(this).val();
            if (value == "gcash") {
                $('#gcash_div').show()
            }
            if (value == "cash_delivery") {
                $('#gcash_div').hide();
            }
        });
        $(document).on('input', '#gcash_number', function() {
            $('#gcash_error').html("")
        })
        $(document).on('click', '#place_order', function() {
            var value = $('#payment_method').val()
            if (value == "cash_delivery") {
                var payment_method = "Cash on Delivery"
                create_order(payment_method)
            }
            if (value == "gcash") {
                var payment_method = "gcash"
                var number = $('#gcash_number').val().length
                if (number < 11 || number > 11) {
                    $('#gcash_error').html("Must input valid number")
                } else {
                    create_order(payment_method)
                }
            }
        })
    })

    function create_order(payment_method) {
        var gcash_number = $('#gcash_number').val()
        var value = $('#payment_method').val()
        if (value == "gcash") {
            var payment_method = "Gcash(" + gcash_number + ")"
            var order_id = Math.floor(100000 + Math.random() * 900000)
            Swal.fire({
                title: 'Payment Confirmation',
                html: 'We will deduct <span class="text-danger">₱<?php echo $total_price ?></span> to your Gcash Accout(' + gcash_number + ')',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    //$('#payment_modal').modal('hide')
                    var values = {
                        "user_id": <?php echo $user_id ?>,
                        "payment_method": payment_method,
                        "order_id": order_id,
                        "delivery_status": "pending",
                        "status": "pending",
                        "payment_status": "paid"
                    }
                    $.ajax({
                        type: "POST",
                        url: "../backend/add_order.php",
                        data: values,
                        success: function(data) {
                            console.log(data)
                            $('#payment_modal').modal('hide')
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Order Successfull',
                                text: 'Generating Order...',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            }).then(
                                function() {
                                    window.location.href = "order.php?username=<?php echo $username ?>&id=" + order_id;
                                }
                            )
                        }
                    })
                }
            })
        }
        if (value == "cash_delivery") {
            var payment_method = "Cash on Delivery"
            var order_id = Math.floor(100000 + Math.random() * 900000)
            Swal.fire({
                title: 'Payment Confirmation',
                html: 'Payment Method: Cash on Delivery<br>Make sure you prepare proper amount to pay for your parcel.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok  '
            }).then((result) => {
                if (result.isConfirmed) {
                    var values = {
                        "user_id": <?php echo $user_id ?>,
                        "payment_method": payment_method,
                        "order_id": order_id,
                        "delivery_status": "pending",
                        "status": "pending",
                        "payment_status": "pending"
                    }
                    //console.log(values)
                    $.ajax({
                        type: "POST",
                        url: "../backend/add_order.php",
                        data: values,
                        success: function(data) {
                            console.log(data)
                            $('#payment_modal').modal('hide')
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Order Successfull',
                                text: 'Generating Order...',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            }).then(
                                function() {
                                    window.location.href = "order.php?username=<?php echo $username ?>&id=" + order_id;
                                }
                            )
                        }
                    })
                }
            })
        }
    }
</script>