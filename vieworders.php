<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>


<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
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
        $get_orders = "SELECT order_id, COUNT(order_id) AS items, status, SUM(total) AS total, order_date, arrive_date, payment_id FROM orders WHERE user_id = '$user_id' GROUP BY order_id, status, order_date, arrive_date ORDER BY order_id DESC";
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $result = mysqli_query($dbcon, $get_orders);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){ 
    ?>
      <tr class="align-centre">
        <td><?php echo $row['items'] ?></td>
        <td><?php echo $row['payment_id'] ?></td>
        <td ><?php echo $row['order_id'] ?></td>
        <td ><?php echo $row['order_date'] ?></td>
        <td ><?php echo $row['arrive_date'] ?></td>
        <td ><?php echo $row['total'] ?></td>
        <td ><?php echo $row['status'] ?></td>

        <td > <a href="orderview.php?id=<?php echo $row['order_id'] ?>"><button type="submit" class="btn btn-success">VIEW</button></a>
        <?php if($row['status']=='PENDING'){
?>
             <a href="./Database/payment.php?delete_id=<?php echo $row['order_id'] ?>"><button type="submit" name="delete_product" class="btn btn-danger">CANCEL ORDER</button></a>
        <?php

        }
        ?></td>
      </tr>
     <?php 
            }
        }
     ?> 
    </tbody>
  </table>
</div>

<?php include("include/footer.php"); ?>