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

<div class="container">
    <div class="table-responsive mt-5">
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Total</td>
        </tr>
        </thead>
        <tbody>
        <?php 
            $user_id = $_SESSION['id'];
            $order_id = $_GET['id'];
            $get_order_details = "SELECT * FROM orders WHERE order_id = '$order_id'";
            $dbcon = mysqli_connect("localhost","root","","harvest_world");
            $result = mysqli_query($dbcon, $get_order_details);
            if (mysqli_num_rows($result) >= 1) {
                while($row = mysqli_fetch_array($result)){ 
                    $product_id = $row['product_id'];
                    $get_product_details = "SELECT * FROM products WHERE product_id = '$product_id'";
                    $result1 = mysqli_query($dbcon, $get_product_details);
                    if (mysqli_num_rows($result1) >= 1) {
                        while($row1 = mysqli_fetch_array($result1)){ 

        ?>
        <tr class="align-centre">
            <td>
                <img src="<?php echo $row1['product_image'] ?>"  width="200 " height="150">
            </td>
            <td><?php echo $row1['product_name'] ?></td>
            <td><?php echo $row1['product_description'] ?></td>
            <td ><?php echo $row['quantity'] ?></td>
            <td ><?php echo $row['total'] ?></td>
        </tr>
        <?php 
                        }
                    }
                }
            }
        ?> 
        </tbody>
    </table>
    </div>
</div>

<?php include("include/footer.php"); ?>