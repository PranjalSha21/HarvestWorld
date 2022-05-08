<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>



<section style="margin:100px;">

        <div class ="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center">Register Here!</h3>
                <br>
                  <form class="row g-3" action="./Database/logindb.php"  method="POST">
                      <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" name="name" required class="form-control" id="name">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" name="phone" class="form-label">Phone number</label>
                        <input type="number"  required name="phone" min="1111111111" max="9999999999" class="form-control" id="telephone">
                      </div>
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" required name="email" class="form-control" id="inputEmail4">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" required name="password" class="form-control" id="pass">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Confirm Password</label>
                        <input type="password" required name="confirm_password" class="form-control" id="pass1">
                      </div>
                      <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" required name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                      </div>
                      <div class="col-12">
                        <button type="submit" required name="register" onclick="return validate()" class="btn btn-primary">Sign in</button>
                      </div>
                  </form>
            </div>
            <div class="col-md-3"></div>
        </div>
         
</section>
<script>
        function validate(){
            if (document.getElementById("pass").value.length <= 6) 
            {
                alert("Enter the password with more than 6 characters.");
                return false;
            }
            if (document.getElementById("pass").value != document.getElementById("pass1").value) 
            {
                alert("Enter the correct password.");
                return false;
            }
        }
    </script>

<script src="./js/bootstrap.js"></script>