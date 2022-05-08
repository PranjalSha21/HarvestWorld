<?php
include("dbcon.php");

function removeQuantity($productID,$quantity){
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    $getQuantityQuery = "SELECT product_quantity FROM products WHERE product_id = '$productID'";
    $id = $_SESSION['id'];
    mysqli_query($dbcon,$getQuantityQuery);
    $result = mysqli_query($dbcon, $getQuantityQuery);
    if (mysqli_num_rows($result) >= 1) {
        while($row = mysqli_fetch_array($result)){
            $quant = intval($row['product_quantity']) - intval($quantity);
            $updatecartquery = "UPDATE products SET product_quantity = '$quant' WHERE product_id = '$productID'";
            mysqli_query($dbcon,$updatecartquery);
        }
    }
}
function getPreviousOrderId(){
    $previousId = "SELECT MAX(order_id) as id FROM orders";
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    $result = mysqli_query($dbcon, $previousId);
    if (mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_array($result);
        return $row['id'];
    } else {
        return "0";
    }
}

function updateOrder($payment_id){
    $orderID = getPreviousOrderId();
    $orderid = intval($orderID) + 1;
    $id = $_SESSION['id'];
    $NewDate=date('Y-m-d',strtotime('+3 days'));
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    $get_products = "SELECT SUM(quantity) as quantity,total,product_image,product_name,cart_id,product_id FROM cart WHERE user_id='$id' AND status='CART' GROUP BY product_id";
    $result = mysqli_query($dbcon, $get_products);
    if (mysqli_num_rows($result) >= 1) {
        while($row = mysqli_fetch_array($result)){
            $total = intval($row['quantity']) * intval($row['total']); 
            $productID = $row['product_id'];
            $quantity = $row['quantity'];
            $updatecartquery = "INSERT INTO orders(order_id,user_id,product_id,quantity,arrive_date,payment_id,total) VALUES ('$orderid','$id','$productID','$quantity','$NewDate','$payment_id','$total')";
            mysqli_query($dbcon,$updatecartquery);
            removeQuantity($productID,$quantity);
        }
    }
}

function changeCartStatus(){
    $id = $_SESSION['id'];
    $updatecartquery = "UPDATE cart SET status = 'ORDERED' WHERE user_id = $id";
    $dbcon = mysqli_connect("localhost","root","","harvest_world");
    mysqli_query($dbcon,$updatecartquery);
}




if(isset($_POST['payment'])){

    $payment_id = $_POST['payment_id'];
    $total = $_POST['total'];
    updateOrder($payment_id,$total);
    changeCartStatus();
    $_SESSION['message'] =  "order placed";
    $_SESSION['status'] =  "success";
    echo json_encode("quant");
    exit;
}

if(intval($_GET['delete_id']) != null)
{
    $d_id = intval($_GET['delete_id']);
    $user_id = $_SESSION['id']; 
    $delete_query = "UPDATE orders SET status = 'CANCELLED' WHERE order_id = '$d_id' ";
    if(mysqli_query($dbcon,$delete_query)){
        $_SESSION['message'] = "Order Canceled Successfully";
        $_SESSION['status'] = "success";
        header("Location: ../vieworders.php");
        exit();
    } else {
        $_SESSION['message'] = "Order Failed to Cancel";
        $_SESSION['status'] = "error";
        header("Location: ../vieworders.php");
        exit();
    }
}

?>