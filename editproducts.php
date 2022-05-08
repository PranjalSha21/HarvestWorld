<?php include("include/header.php"); ?>
<?php 
    if($_SESSION['user_type'] != 'ADMIN'){
      $_SESSION['message'] = "Log in to continue";
      $_SESSION['status'] = "error";
        header("Location: ./login.php");
        exit();
    }
    ?>
<?php include("include/adminsidebar.php"); ?>
<div class="table-responsive">
  <table class="table align-middle">
    <thead>
      <tr>
        <td>ID</td>
        <td>Image</td>
        <td>Name</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
    </thead>
    <?php 
        $get_products = "SELECT * FROM products";
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $result = mysqli_query($dbcon, $get_products);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){ 
    ?>
    <tbody>
      <tr class="align-centre">
        <td><?php echo $row['product_id'] ?></td>
        <td><img src="<?php echo $row['product_image'] ?>"  width="100" height="100"></td>
        <td ><?php echo $row['product_name'] ?></td>
        <td ><?php echo $row['product_description'] ?></td>
        <td ><?php echo $row['product_quantity'] ?></td>
        <td ><?php echo $row['product_price'] ?></td>
        <td > <a href="editproduct.php?id=<?php echo $row['product_id'] ?>"><button type="submit" class="btn btn-primary">Edit</button></a></td>
        <td > <a href="./Database/product.php?id=<?php echo $row['product_id'] ?>"><button type="submit" name="delete_product" class="btn btn-danger">Delete</button></a></td>
      </tr>
     <?php 
            }
        }
     ?> 
    </tbody>
  </table>
</div>

<?php include("include/footer.php"); ?>