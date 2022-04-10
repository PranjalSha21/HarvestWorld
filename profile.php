<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>

<div class="row justify-content-center">
            <div class="col-md-10 my-5 table-responsive">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">My Profile</h4>
                    </div>
                    <div class="card-body">
                                <div class="container">
                                    <form action="./Database/logindb.php" method="post">
                                        <?php
                                        $id = $_SESSION['id'];
                                        $get_user = "SELECT * FROM users WHERE id=$id";
                                        $dbcon = mysqli_connect("localhost","root","","harvest_world");
                                        $result = mysqli_query($dbcon, $get_user);
                                        if (mysqli_num_rows($result) >= 1) {
                                            while($row = mysqli_fetch_array($result)){ ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?php echo $row['email']; ?>"  class="form-control"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                        <input type="number" name="phone" value="<?php echo $row['phone']; ?>"  class="form-control"/>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="address"><?php echo $row['address']; ?></textarea>
                                                    </div>
                                                    <button type="submit" name="update" class="btn btn-success mt-3">Update</button>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
        <div class="col-md-6">
              <div class="card-counter danger">
                <i class="fa fa-database"></i>
                <?php
                  $dbcon = mysqli_connect("localhost","root","","harvest_world");
                  $id = $_SESSION['id'];
                  $orders = "SELECT COUNT(order_id) as id FROM orders WHERE user_id = $id";
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
                  $id = $_SESSION['id'];
                  $dbcon = mysqli_connect("localhost","root","","harvest_world");
                  $orders = "SELECT COUNT(id) as id FROM queries WHERE user_id = $id";
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
            </div>
            </div>
<?php include("include/footer.php"); ?>