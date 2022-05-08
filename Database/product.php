<?php
include("dbcon.php");
if(isset($_POST['add_product']))
{
    $p_name = $_POST['p_name'];
    $p_description = $_POST['p_description'];   
    $p_quantity = $_POST['p_quantity'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']["name"];
    $tempname = $_FILES['p_image']["tmp_name"];    
    print_r($_FILES);
    $folder_path = "./images/products/";
    $folder_path = $folder_path.basename($p_image);
    $uploadpath = 'D:\Xampp\htdocs\HarvestWorld\images\products\\';
    $uploadpath = $uploadpath.basename($p_image);
    $add_query = "INSERT INTO products (product_name,product_price,product_image,product_quantity,product_description) VALUES ('$p_name','$p_price','$folder_path','$p_quantity','$p_description')";
    if(mysqli_query($dbcon,$add_query)){
        if (move_uploaded_file($tempname, $uploadpath))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        } 
        $_SESSION['message'] = "Product added Successfully";
        $_SESSION['status'] = "success";
        header("Location: ../dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Product Failed to Upload";
        $_SESSION['status'] = "error";
        header("Location: ../dashboard.php");
        exit();
    }

}

if(isset($_POST['update_product']))
{
    $p_name = $_POST['p_name'];
    $p_description = $_POST['p_description'];   
    $p_quantity = $_POST['p_quantity'];
    $p_price = $_POST['p_price'];
    $p_id = $_POST['p_id'];
    $update_query = "UPDATE products SET product_name='$p_name',product_price='$p_price',product_quantity='$p_quantity',product_description='$p_description' WHERE product_id = '$p_id'";
    if(mysqli_query($dbcon,$update_query)){
        $_SESSION['message'] = "Product Updated Successfully";
        $_SESSION['status'] = "success";
        header("Location: ../editproducts.php");
        exit();
    } else {
        $_SESSION['message'] = "Product Failed to Update";
        $_SESSION['status'] = "error";
        header("Location: ../editproducts.php");
        exit();
    }

}

if(intval($_GET['id']) != null)
{
    $p_id = intval($_GET['id']);
    $delete_query = "DELETE FROM products WHERE product_id = '$p_id' ";
    if(mysqli_query($dbcon,$delete_query)){
        $_SESSION['message'] = "Product Deleted Successfully";
        $_SESSION['status'] = "success";
        header("Location: ../editproducts.php");
        exit();
    } else {
        $_SESSION['message'] = "Product Failed to Delete";
        $_SESSION['status'] = "error";
        header("Location: ../editproducts.php");
        exit();
    }
}

?>