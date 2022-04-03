<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>

<h1 class="text-center mt-5">My Cart</h1>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table align-middle">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Delete</td>
                </tr>
                </thead>
                <?php 
                    $id = $_SESSION['id'];
                    $get_products = "SELECT SUM(quantity) as quantity,total,product_image,product_name,cart_id,product_id FROM cart WHERE user_id='$id' AND status='CART' GROUP BY product_id";
                    $dbcon = mysqli_connect("localhost","root","","harvest_world");
                    $result = mysqli_query($dbcon, $get_products);
                    if (mysqli_num_rows($result) >= 1) {
                        while($row = mysqli_fetch_array($result)){ 
                ?>
                <tbody>
                <tr class="align-centre">
                    <td><img src="<?php echo $row['product_image'] ?>"  width="150" height="150"></td>
                    <td ><?php echo $row['product_name'] ?></td>
                    <td >                
                        <a href="javascript:minus(<?php echo $row['cart_id'] ?>)" class="btn btn-light shadow">-</a>
                        <span id="product_quantity<?php echo $row['cart_id'] ?>"> <?php echo ($row['quantity']) ?></span>
                        <a href="javascript:add(<?php echo $row['cart_id'] ?>)" class="btn btn-light shadow">+</a>
                    </td>
                    <td id="product_price<?php echo $row['cart_id'] ?>" ><?php echo ($row['total'])?></td>
                    <td > <a href="./Database/order.php?id=<?php echo $row['product_id'] ?>"><button type="submit" name="delete_product" class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php 
                        }
                } else {
                ?>
                        <a href="./products.php"><button class="btn btn-info">Add Products To CART</button></a>

                <?php
                    }
                ?> 
                </tbody>
            </table>
            </div>
        </div>
        <a href="./payment.php"><button class ="btn btn-success">BUY NOW</button></a>
    </div>
</div>




<script>
    function minus(id) {
        let current_quantity = document.getElementById('product_quantity'+id);
        if((+current_quantity.innerText) > 1){
            current_quantity.innerText = current_quantity.innerText - 1;
            $.ajax({
            type: "POST",
            url: "./Database/order.php",
            data: {
                cart_id: id,
                quantity: parseInt(current_quantity.textContent),
                editCart: true
            },
            success: function (data) {
                alert(data);
            },
            error: function(xhr, status, error) {
            console.error(xhr);
            }
        });
        }
    }
    function add(id) {
        let current_quantity = document.getElementById('product_quantity'+id);
        current_quantity.innerText = (+current_quantity.innerText) + 1;
        $.ajax({
            type: "POST",
            url: "./Database/order.php",
            data: {
                cart_id: id,
                quantity: parseInt(current_quantity.textContent),
                editCart: true
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