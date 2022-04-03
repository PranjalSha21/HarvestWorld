<?php
include("dbcon.php");
function checkQuantity($p_id){
    $checkQuery = "SELECT product_quantity FROM products WHERE product_id = $p_id";
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    $result = mysqli_query($dbcon, $checkQuery);
    if (mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_array($result);
        return $row['product_quantity'];
    }
}
function addProduct($user_id,$product_id,$quantity,$total){
    $addtocartquery = "INSERT INTO cart(user_id,product_id,quantity,total) VALUES('$user_id','$product_id','$quantity','$total')";
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    if(mysqli_query($dbcon,$addtocartquery))
    {
        return("Added Successfully");
    }
    else
    {
        return("Something went wrong!");
    }
}
if(isset($_POST['addToCart'])){
    $user_id = $_SESSION["id"]; 
    $product_id = $_POST["product_id"]; 
    $quantity = $_POST["quantity"];
    $total = $_POST["total"]; 
    $availableQuantity = checkQuantity($product_id);
    if($quantity <= $availableQuantity ) {
        $addtocart = addProduct($user_id,$product_id,$quantity,$total);
        echo json_encode($addtocart);
        exit;
    } else {
        echo json_encode($availableQuantity);
        exit;
        // echo '<script>alert("Only ".$availableQuantity. " available")</script';
    }


}


// header('content-type: application/json');
// echo json_encode("hi");
// exit;

?>