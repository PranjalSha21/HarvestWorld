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
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
        <td>Phone</td>
        <td>Total Orders</td>
        <td>Queries</td>
      </tr>
    </thead>
    <?php 
        $get_products = "SELECT * FROM users WHERE user_type = 'USER'";
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $result = mysqli_query($dbcon, $get_products);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){ 
                $id = $row['id'];
                $get_count = "SELECT COUNT(order_id) as totalorders FROM orders WHERE orders.user_id = '$id'";
                $get_count1 = "SELECT COUNT(queries.id) as totalqueries FROM queries WHERE queries.user_id = '$id'";
                $result1 = mysqli_query($dbcon, $get_count);
                if (mysqli_num_rows($result1) >= 1) {
                    while($row1 = mysqli_fetch_array($result1)){ 
                        $result2 = mysqli_query($dbcon, $get_count1);
                        if (mysqli_num_rows($result2) >= 1) {
                            while($row2 = mysqli_fetch_array($result2)){ 
    ?>
    <tbody>
      <tr class="align-centre">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td ><?php echo $row['email'] ?></td>
        <td ><?php echo $row['address'] ?></td>
        <td ><?php echo $row['phone'] ?></td>
        <td ><?php echo $row1['totalorders'] ?></td>
        <td ><?php echo $row2['totalqueries'] ?></td>
      </tr>
     <?php 
                            }
                        }
                    }
                }
            }
        }
     ?> 
    </tbody>
  </table>
</div>

<?php include("include/footer.php"); ?>