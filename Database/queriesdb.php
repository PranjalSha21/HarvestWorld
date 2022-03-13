<?php
include("dbcon.php");


if(isset($_POST['queries_submit']))
{
    $query= $_POST['query'];
    $user_id= $_SESSION['id'];
    $user_name= $_SESSION['name'];
    $register_query = "INSERT INTO queries (query,user_name,user_id) VALUES ('$query','$user_name','$user_id')";
    if(mysqli_query($dbcon,$register_query))
    {
        header("Location: ../queries.php");
    }
    else
    {
        header("Location: q.php");
    }

}

if(isset($_POST['queries_reply_submit'])) 
{
    $reply_query= $_POST['reply_query'];
    $user_id= $_SESSION['id'];
    $user_name= $_SESSION['name'];
    $query_id = $_POST['query_id'];
    $register_query = "INSERT INTO reply_query (query_id,user_id,user_name,query) VALUES ('$query_id','$user_id','$user_name','$reply_query')";
    if(mysqli_query($dbcon,$register_query))
    {
        header("Location: ../queries.php");
    }
    else
    {
        header("Location: q.php");
    }
}



?>