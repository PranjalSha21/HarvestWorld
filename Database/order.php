<?php
// include("dbcon.php");

// if(isset($_POST['addToCart'])){
//     $user_id = $_POST["user_id"]; 
//     $product_id = $_POST["product_id"]; 
//     $quantity = $_REQUEST["quantity"];
//     $total = $_POST["total"]; 
//     $availableQuantity = checkQuantity($product_id)
//     if($quantity <= $availableQuantity ) {

//     } else {
//         echo json_encode($availableQuantity);
//         exit;
//         // echo '<script>alert("Only ".$availableQuantity. " available")</script';
//     }


// }

// function checkQuantity($p_id){
//     $checkQuery = "SELECT product_quantity FROM products WHERE product_id = $p_id";
//     $result = mysqli_query($dbcon, $checkQuery);
//     if (mysqli_num_rows($result) >= 1) {
//         $row = mysqli_fetch_array($result);
//         return $row['product_quantity'];
//     }else{
        
//     }
// }
header('content-type: application/json');
echo json_encode("hi");
exit;

?>