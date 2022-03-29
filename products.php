<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>

<div class="row mt-5">
    <?php 
        $get_products = "SELECT * FROM products";
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $result = mysqli_query($dbcon, $get_products);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){ 
    ?>
    <div class="col-md-3 mb-5">
        <div class="card mx-2 shadow" style="width: 18rem; height: 20rem;">
            <img src="<?php echo $row['product_image'] ?>" class="card-img-top shadow"  width="100" height="150">
            <div class="card-body text-center">
                <h4 class="card-title"><?php echo $row['product_name'] ?></h5>
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
        var quantity = document.getElementById('product_quantity'+id);
        var total = quantity * price;
        $.ajax({
            type: "POST",
            url: "./Database/order.php",
            data: `{
                product_id: id,
                user_id: 1,
                quantity: quantity,
                total: total,
                addToCard: true
            }`,
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
