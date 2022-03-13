<?php include("include/header.php"); ?>
<?php include("include/navbar.php"); ?>



<section style="margin:100px;">
        <div class ="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center">Login Here!</h3>
                  <form action="./Database/logindb.php" method="post">
                     <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                             <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                             <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                      </div>
                      <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                      </div>
                        <button type="submit" name="login" class="btn btn-success">Submit</button> 
                        <a href="register.php" class="btn btn-primary">Register</a>
                </form>
                
            </div>
            <div class="col-md-3"></div>
        </div>
         
    </section>

    <script src="./js/bootstrap.js"></script>