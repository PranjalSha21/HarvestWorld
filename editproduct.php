<?php include("include/header.php"); ?>
<?php include("include/adminsidebar.php"); ?>

<h1 class="text-center mt-5">Edit Product</h1>
<br>
<div class="card mx-5 mb-5">
        <br>
        <div class="cardbody mx-5">
                <form action="./Database/product.php" enctype="multipart/form-data" method="POST">
                        <br>
                        <?php 
                            $id = intval($_GET['id']);
                            $get_product = "SELECT * FROM products WHERE product_id=$id";
                            $dbcon = mysqli_connect("localhost","root","","harvest_world");
                            $result = mysqli_query($dbcon, $get_product);
                            if (mysqli_num_rows($result) >= 1) {
                                while($row = mysqli_fetch_array($result)){ 
                        ?>
                        <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="p_name" class="form-control" value="<?php echo $row['product_name'] ?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Description</label>
                                <Textarea type="text" name="p_description" class="form-control" TextMode="MultiLine"><?php echo $row['product_description'] ?></textarea>
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="p_quantity" class="form-control" value="<?php echo $row['product_quantity'] ?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="number" name="p_price" class="form-control" value="<?php echo $row['product_price'] ?>" aria-describedby="emailHelp">
                                <input type="hidden" name="p_id" value="<?php echo $id ?>" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-success" name="update_product">Update</button>
                        <a href="editproducts.php" class="btn btn-warning">Cancel</a>
                        <?php
                                }
                            }
                        ?>
                </form>
                <br>
        </div>
</div>

<?php include("include/footer.php"); ?>