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

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->


</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- 

      // $dbcon = mysqli_connect("localhost","root","","harvest_world");
      // $orders = "SELECT COUNT(id) as id FROM orders";
      // if (mysqli_num_rows($result) >= 1) {
      //   while($row = mysqli_fetch_array($result)){ ?>
           $value_total_orders = mysqli_fetch_field($total_orders);
      $products = "SELECT COUNT(product_id) as id FROM products";
      $queries = "SELECT COUNT(id) as id FROM queries";
      $users = "SELECT COUNT(id) as id FROM users";
      $total_orders = mysqli_query($dbcon, $orders);
      // $total_products = mysql_query($dbcon, $products);
      // $total_queries = mysql_query($dbcod, $queries);
      // $total_users = mysql_query($dbcod, $users);
      $value_total_orders = mysqli_fetch_field($total_orders);
      // $value_total_products = mysqli_fetch_field($total_products);
      // $value_total_queries = mysqli_fetch_field($total_queries);
      // $value_total_users = mysqli_fetch_field($total_users);



?> -->

<div class="container">
            <div class="row">
            <div class="col-md-6">
              <div class="card-counter primary">
                <i class="fa fa-shopping-cart"></i>
                <?php
                  $dbcon = mysqli_connect("localhost","root","","harvest_world");
                  $orders = "SELECT COUNT(order_id) as id FROM orders WHERE 1";
                  $result = mysqli_query($dbcon, $orders);
                  if (mysqli_num_rows($result) >= 1) {
                    while($row = mysqli_fetch_array($result)){ ?>
                  <label ID="Label1" class="count-numbers" Text="12"><?php echo $row['id']; ?></label>
                  <?php
                    }
                  }
                  ?>
                <span class="count-name">Products</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card-counter danger">
                <i class="fa fa-database"></i>
                <?php
                  $dbcon = mysqli_connect("localhost","root","","harvest_world");
                  $orders = "SELECT COUNT(product_id) as id FROM products WHERE 1";
                  $result = mysqli_query($dbcon, $orders);
                  if (mysqli_num_rows($result) >= 1) {
                    while($row = mysqli_fetch_array($result)){ ?>
                  <label ID="Label1" class="count-numbers" Text="12"><?php echo $row['id']; ?></label>
                  <?php
                    }
                  }
                  ?>
                <span class="count-name">Orders</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card-counter success">
                <i class="fa fa-ticket"></i>
                <?php
                  $dbcon = mysqli_connect("localhost","root","","harvest_world");
                  $orders = "SELECT COUNT(id) as id FROM queries WHERE 1";
                  $result = mysqli_query($dbcon, $orders);
                  if (mysqli_num_rows($result) >= 1) {
                    while($row = mysqli_fetch_array($result)){ ?>
                  <label ID="Label1" Class="count-numbers" Text="12"><?php echo $row['id']; ?></label>
                  <?php
                    }
                  }
                  ?>
                <span class="count-name">Queries</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card-counter info">
                <i class="fa fa-users"></i>
                <?php
                  $dbcon = mysqli_connect("localhost","root","","harvest_world");
                  $orders = "SELECT COUNT(id) as id FROM users WHERE user_type = 'USER'";
                  $result = mysqli_query($dbcon, $orders);
                  if (mysqli_num_rows($result) >= 1) {
                    while($row = mysqli_fetch_array($result)){ ?>
                  <label ID="Label1" class="count-numbers" Text="12"><?php echo $row['id']; ?></label>
                  <?php
                    }
                  }
                  ?>
                <span class="count-name">Users</span>
              </div>
            </div>
    </div>
  </div>




<?php include("include/footer.php"); ?>