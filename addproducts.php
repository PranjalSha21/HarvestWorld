<?php include("include/header.php"); ?>
<?php include("include/adminsidebar.php"); ?>

<h1 class="text-center mt-5">Add Products</h1>
<br>
<div class="card mx-5 mb-5">
        <br>
        <div class="cardbody mx-5">
                <form action="./Database/product.php" enctype="multipart/form-data" method="POST">
                        <br>
                        <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="p_name" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Description</label>
                                <Textarea type="text" name="p_description" class="form-control" TextMode="MultiLine"> </textarea>
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="p_quantity" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="number" name="p_price" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" name="p_image" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-success" name="add_product">Submit</button>
                </form>
                <br>
        </div>
</div>

<?php include("include/footer.php"); ?>