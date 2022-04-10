<?php
include("dbcon.php");
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];   
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($dbcon, $login_query);
    if (mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_array($result);
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['subscription'] = $row['subscription'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['message'] = "Logged in Successfully";
            $_SESSION['status'] = "success";
            if($_SESSION["user_type"] == "USER"){
                header("Location: ../index.php");
                exit();
            } else {
                header("Location: ../dashboard.php");
                exit();
            }
        
        }else{
            header("Location: ../index.php");
            exit();
        }
}

if(isset($_POST['register']))
{
    $name= $_POST['name'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirm_password= $_POST['confirm_password'];
    $address= $_POST['address'];
    $register_query = "INSERT INTO users (name,phone,email,password,address) VALUES ('$name', '$phone', '$email', '$password', '$address')";
    if(mysqli_query($dbcon,$register_query))
    {
        header("Location: ../login.php");
    }
    else
    {
        header("Location: index.php");
    }

}

if(isset($_POST['update']))
{   
    $id = $_SESSION['id'];
    $name= $_POST['name'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $address= $_POST['address'];
    $update_query = "UPDATE users SET name = '$name',phone = '$phone' ,email = '$email',address = '$address' WHERE id = $id";
    if(mysqli_query($dbcon,$update_query))
    {
        header("Location: ../profile.php");
    }
    else
    {
        header("Location: ../index.php");
    }

}

?>