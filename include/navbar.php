<section>
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
              <div class="container">
                <a class="navbar-brand" href="#">HARVEST WORLD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="queries.php" aria-expanded="false">
                        Queries?
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="products.php" aria-expanded="false">
                        Products
                      </a>
                    </li>
                      <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="cart.aspx">Cart
                          </a>
                       </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Build Your own!
                      </a>
                    </li>
                    <?php 
                    if(isset($_SESSION["name"]) != ""){ ?>
                      <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION["name"]; ?>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="product.aspx?categories=CPU Panel">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                      </ul>
                    </li>
                   <?php 
                   } else { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php" aria-expanded="false">
                      Login
                    </a>
                  </li>
                   <?php } ?>
                    
                </div>
              </div>
            </nav>
        </div>
    </section>
