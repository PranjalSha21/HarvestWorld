<?php
include("dbcon.php");
if(isset($_POST['add_model']))
{
    $m_name = $_POST['m_name'];
    $m_description = $_POST['m_description'];   
    $m_location = $_POST['m_location'];
    $m_usecase = $_POST['m_usecase'];
    $m_rain_occurence = $_POST['m_rain_occurence'];
    $m_size = $_POST['m_size'];
    $m_image = $_FILES['m_image']["name"];
    $tempname = $_FILES['m_image']["tmp_name"];    
    $folder_path = "./images/models/";
    $folder_path = $folder_path.basename($m_image);
    $uploadpath = 'D:\Xampp\htdocs\HarvestWorld\images\models\\';
    $uploadpath = $uploadpath.basename($m_image);
    $add_query = "INSERT INTO harvest_model (model_image,model_name,model_description) VALUES ('$folder_path','$m_name','$m_description')";
    if(mysqli_query($dbcon,$add_query)){
        if (move_uploaded_file($tempname, $uploadpath))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
        $model_id_query = "SELECT MAX(model_id) AS id FROM harvest_model";
        $model_id_result = mysqli_query($dbcon, $model_id_query);
        if (mysqli_num_rows($model_id_result) >= 1) {
            while($row = mysqli_fetch_array($model_id_result)){ 
                $model_id = $row['id'];
                $add_suggestion_query = "INSERT INTO suggest_model (model_id,rain_occurence,use_case,location,size) VALUES ('$model_id','$m_rain_occurence','$m_usecase','$m_location','$m_size')";
                if(mysqli_query($dbcon,$add_suggestion_query)){
                    $_SESSION['message'] = "Model added Successfully";
                    $_SESSION['status'] = "success";
                    header("Location: ../dashboard.php");
                    exit();
                }
            }
        }
    } else {
        $_SESSION['message'] = "Product Failed to Upload";
        $_SESSION['status'] = "error";
        header("Location: ../dashboard.php");
        exit();
    }

}

if(isset($_POST['update_model']))
{
    $m_name = $_POST['m_name'];
    $m_description = $_POST['m_description'];   
    $m_location = $_POST['m_location'];
    $m_usecase = $_POST['m_usecase'];
    $m_rain_occurence = $_POST['m_rain_occurence'];
    $m_size = $_POST['m_size'];
    $m_id = $_POST['m_id'];
    $update_query1 = "UPDATE suggest_model SET rain_occurence='$m_rain_occurence',use_case='$m_usecase',location='$m_location',size='$m_size' WHERE model_id = '$m_id'";
    $update_query2 = "UPDATE harvest_model SET model_name='$m_name',model_description='$m_description' WHERE model_id = '$m_id'";
    if(mysqli_query($dbcon,$update_query1) and mysqli_query($dbcon,$update_query2)){
        $_SESSION['message'] = "Model Updated Successfully";
        $_SESSION['status'] = "success";
        header("Location: ../editmodels.php");
        exit();
    } else {
        $_SESSION['message'] = "Model Failed to Update";
        $_SESSION['status'] = "error";
        header("Location: ../editmodels.php");
        exit();
    }

}

if(intval($_GET['id']) != null)
{
    $m_id = intval($_GET['id']);
    $delete_query1 = "DELETE FROM suggest_model WHERE model_id = '$m_id' ";
    $delete_query2 = "DELETE FROM harvest_model WHERE model_id = '$m_id' ";
    if(mysqli_query($dbcon,$delete_query1) AND mysqli_query($dbcon,$delete_query2)){
        $_SESSION['message'] = "Model Deleted Successfully";
        $_SESSION['status'] = "success";
        header("Location: ../editmodels.php");
        exit();
    } else {
        $_SESSION['message'] = "Model Failed to Delete";
        $_SESSION['status'] = "error";
        header("Location: ../editmodels.php");
        exit();
    }
}

?>