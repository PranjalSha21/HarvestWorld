<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>


<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <div class="card-title"><h3>Review</h3></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Shipping Address</h5>
                                <?php
                                $user_id = $_SESSION['id'];
                                $get_address = "SELECT * from users WHERE id = '$user_id'";
                                $dbcon = mysqli_connect("localhost","root","","harvest_world");
                                $result = mysqli_query($dbcon, $get_address);
                                if (mysqli_num_rows($result) >= 1) {
                                    while($row = mysqli_fetch_array($result)){ 
                                ?>
                                <label><?php echo $row['address'] ?></label> <br>
                                <?php
                                    }
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-body">
                        <h5 class="card-title">Delivery Date</h5>
                            <label> <?php $NewDate=Date('d-m-Y', strtotime('+3 days')); echo $NewDate; ?> </label> <br />
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <br><br>
                    <h3>Products</h3>
                    <div class="table-responsive">
                        <table class="table align-middle">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Quantity</td>
                                <td>Price</td>
                            </tr>
                            </thead>
                            <?php 
                                $total = 0;
                                $id = $_SESSION['id'];
                                $get_products = "SELECT SUM(quantity) as quantity,total,product_image,product_name,cart_id,product_id FROM cart WHERE user_id='$id' AND status='CART' GROUP BY product_id";
                                $dbcon = mysqli_connect("localhost","root","","harvest_world");
                                $result = mysqli_query($dbcon, $get_products);
                                if (mysqli_num_rows($result) >= 1) {
                                    while($row = mysqli_fetch_array($result)){ 
                            ?>
                            <tbody>
                            <tr class="align-centre">
                                <td><img src="<?php echo $row['product_image'] ?>"  width="50" height="50"></td>
                                <td ><?php echo $row['product_name'] ?></td>
                                <td >                
                                    <span id="product_quantity<?php echo $row['cart_id'] ?>"> <?php echo ($row['quantity']) ?></span>
                                </td>
                                <td id="product_price<?php echo $row['cart_id'] ?>" ><?php echo ($row['total']*$row['quantity'])?></td>
                            </tr>
                            <?php 
                                $GLOBALS['total'] = $GLOBALS['total'] + ($row['total']*$row['quantity']); 
                                    }
                                }
                            ?> 
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3">
                        <div class="text-end">
                            <h5 class="mb-0">Total Price : <?= $total ?></h5>
                            <small class="text-muted">( Inclusive of all taxes )</small>
                        </div>
                    </div>
                <br><br>
                </div>
                <button class="btn btn-success" id="rzp-button1">Proceed <i class="fa fa-shopping-cart"></i></button>
            </div>
        </div>
    </div>
</div>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_wrJqeQEL6PKzIT", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo ($total*100)?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Harvest World",
    "description": "Your payments are secure",
    "image": "https://cdn.razorpay.com/logos/IQvaOopWRPLzkQ_medium.png",
    "handler": function (response){
        $.ajax({
            type: "POST",
            url: "./Database/payment.php",
            data: {
                payment_id: response.razorpay_payment_id,
                total: <?php echo ($total)?>,
                payment: true
            },
            success: function (data) {
                window.location = './products.php';  
            },
            error: function(xhr, status, error) {
            console.error(xhr);
            }
        });
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<?php include("include/footer.php"); ?>