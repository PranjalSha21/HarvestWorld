<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>



<section style="margin:100px;">

        <div class ="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center">Register Here!</h3>
                <br>
                  <form class="row g-3" action="./Database/logindb.php" method="POST">
                      <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" name="phone" class="form-label">Phone number</label>
                        <input type="telephone" name="phone" class="form-control" id="telephone">
                      </div>
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="inputPassword4">
                      </div>
                      <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                      </div>
                      <div class="col-12">
                        <button type="submit" name="register" class="btn btn-primary">Sign in</button>
                      </div>
                  </form>
            </div>
            <div class="col-md-3"></div>
        </div>
         
</section>


<script src="./js/bootstrap.js"></script>