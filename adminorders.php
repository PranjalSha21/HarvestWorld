<?php include("include/header.php"); ?>
<?php include("include/adminsidebar.php"); ?>

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <td>User ID</td>
        <td>Items</td>
        <td>Payment ID</td>
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Arrive Date</td>
        <td>Total</td>
        <td>Status</td>
        <td>View</td>
      </tr>
    </thead>
    <tbody>
    <?php 
        $user_id = $_SESSION['id'];
        $get_orders = "SELECT order_id, COUNT(order_id) AS items, status, SUM(total) AS total,user_id, order_date, arrive_date, payment_id FROM orders WHERE user_id = '$user_id' GROUP BY order_id, status, order_date, arrive_date ORDER BY order_id DESC";
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $result = mysqli_query($dbcon, $get_orders);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){ 
    ?>
      <tr class="align-centre">
        <td><?php echo $row['user_id'] ?></td>
        <td><?php echo $row['items'] ?></td>
        <td><?php echo $row['payment_id'] ?></td>
        <td ><?php echo $row['order_id'] ?></td>
        <td ><?php echo $row['order_date'] ?></td>
        <td ><?php echo $row['arrive_date'] ?></td>
        <td ><?php echo $row['total'] ?></td>
        <td ><?php echo $row['status'] ?></td>

        <td > <a href="orderview.php?id=<?php echo $row['order_id'] ?>"><button type="submit" class="btn btn-primary">VIEW</button></a>
        <?php if($row['status']=='PENDING'){
?>
            <a href="./Database/order.php?deliver_id=<?php echo $row['order_id'] ?>"><button type="submit" name="delete_product" class="btn btn-success">DELIVERED</button></a></td>
        <?php

        }
        ?>
      </tr>
     <?php 
            }
        }
     ?> 
    </tbody>
  </table>
</div>

<?php include("include/footer.php"); ?>