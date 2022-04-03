<?php
include("dbcon.php");
$product_image = "";
$product_name = "";
function checkQuantity($p_id){
    $checkQuery = "SELECT product_quantity,product_image,product_name FROM products WHERE product_id = $p_id";
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    $result = mysqli_query($dbcon, $checkQuery);
    if (mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_array($result);
        $GLOBALS['product_image'] = $row['product_image'];
        $GLOBALS['product_name'] = $row['product_name'];
        return $row['product_quantity'];
    }
}
function addProduct($user_id,$product_id,$quantity,$total,$product_image,$product_name){
    $addtocartquery = "INSERT INTO cart(user_id,product_id,quantity,total,product_image,product_name) VALUES('$user_id','$product_id','$quantity','$total','$product_image','$product_name')";
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
    $total = $_POST["price"]; 
    $availableQuantity = checkQuantity($product_id);
    if($quantity <= $availableQuantity ) {
        $addtocart = addProduct($user_id,$product_id,$quantity,$total,$product_image,$product_name);
        echo json_encode($addtocart);
        exit;
    } else {
        echo json_encode($availableQuantity);
        exit;
        // echo '<script>alert("Only ".$availableQuantity. " available")</script';
    }


}

function updateCart($cart_id,$quantity){
    $updatecartquery = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    if(mysqli_query($dbcon,$updatecartquery))
    {
        return("Updated Successfully");
    }
    else
    {
        return("Something went wrong!");
    }
}

if(isset($_POST['editCart'])){
    $cart_id = $_POST["cart_id"]; 
    $quantity = $_POST["quantity"];
    $editCart = updateCart($cart_id,$quantity);
    echo json_encode($editCart);
    exit;
}

if(intval($_GET['id']) != null)
{
    $p_id = intval($_GET['id']);
    $user_id = $_SESSION['id']; 
    $delete_query = "DELETE FROM cart WHERE product_id = '$p_id' AND user_id = '$user_id' AND status = 'CART' ";
    if(mysqli_query($dbcon,$delete_query)){
        $_SESSION['message'] = "Product Deleted Successfully";
        $_SESSION['status'] = "success";
        header("Location: ../cart.php");
        exit();
    } else {
        $_SESSION['message'] = "Product Failed to Delete";
        $_SESSION['status'] = "error";
        header("Location: ../cart.php");
        exit();
    }
}

?>