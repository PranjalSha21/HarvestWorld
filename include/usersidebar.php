<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.aspx">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Harvest World</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fa fa-boxes"></i>
            <span>Products</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="nav-item">
        <a class="nav-link" href="products.php">
            <i class="fa fa-shopping-cart"></i>
            <span>Produts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="models.php">
            <i class="fa fa-shopping-cart"></i>
            <span>Models</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="queries.php">
            <i class="fa fa-shopping-cart"></i>
            <span>Queries</span></a>
    </li>
    

    <!-- Nav Item - Utilities Collapse Menu -->
    
   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Personal
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="myqueries.php">
            <i class="fa fa-shopping-cart"></i>
            <span>My Queries</span></a>
    </li>
    

    <li class="nav-item">
        <a class="nav-link" href="cart.php">
            <i class="fa fa-shopping-cart"></i>
            <span>Cart</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="vieworders.php">
            <i class="fa fa-shopping-cart"></i>
            <span>Orders</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="profile.php">
            <i class="fa fa-user"></i>
            <span><?php echo $_SESSION["name"]; ?></span></a>
    </li>

    <!-- Nav Item - Tables -->
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="./logout.php"
            <i class="fa fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">