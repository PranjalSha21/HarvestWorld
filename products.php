<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>
<?php 
    if($_SESSION['user_type'] != 'USER'){
        $_SESSION['message'] = "Log in to continue";
        $_SESSION['status'] = "error";
        header("Location: ./login.php");
        exit();
    }
?>
<div class="row mt-5">
    <?php 
        $get_products = "SELECT * FROM products WHERE product_quantity > 0";
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $result = mysqli_query($dbcon, $get_products);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){ 
    ?>
    <div class="col-md-3 mb-5">
        <div class="card mx-2 shadow" style="width: 17rem; height: 20rem;">
            <img src="<?php echo $row['product_image'] ?>" class="card-img-top shadow"  width="100" height="150">
            <div class="card-body text-center">
                <h6 class="card-title"><?php echo $row['product_name'] ?></h6>
                <h5 class="card-text">₹ <?php echo $row['product_price'] ?></h5>
            </div>
            <div class="card-body">
                <button onClick="addtocart(<?php echo $row['product_id'] ?>,<?php echo $row['product_price'] ?>)" class="btn btn-success mx-2 shadow">Add to Cart</button>
                <a href="javascript:minus(<?php echo $row['product_id'] ?>)" class="btn btn-light shadow">-</a>
                <span id="product_quantity<?php echo $row['product_id'] ?>">1</span>
                <a href="javascript:add(<?php echo $row['product_id'] ?>)" class="btn btn-light shadow">+</a>
            </div>
        </div>
    </div>
    <?php
            }
        }
    ?>
</div>

<script>
    function minus(id) {
        let current_quantity = document.getElementById('product_quantity'+id);
        if((+current_quantity.innerText) > 1){
            current_quantity.innerText = current_quantity.innerText - 1;
        }
    }
    function add(id) {
        let current_quantity = document.getElementById('product_quantity'+id);
        current_quantity.innerText = (+current_quantity.innerText) + 1;
    }
    function addtocart(id,price){
        var quantity = parseInt(document.getElementById('product_quantity'+id).textContent);
        console.log(id,quantity,price);
        $.ajax({
            type: "POST",
            url: "./Database/order.php",
            data: {
                product_id: id,
                quantity: quantity,
                price: price,
                addToCart: true
            },
            success: function (data) {
                alert(data);
            },
            error: function(xhr, status, error) {
            console.error(xhr);
            }
        });
    }
</script>


<?php include("include/footer.php"); ?>
