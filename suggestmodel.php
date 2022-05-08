<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>
<?php 
    if($_SESSION['user_type'] != 'USER'){
        $_SESSION['message'] = "Log in to continue";
        $_SESSION['status'] = "error";
        header("Location: ./login.php");
        exit();
    }
?>

<div class="table-responsive">
  <table class="table align-middle">
    <thead>
      <tr>
        <td>ID</td>
        <td>Image</td>
        <td>Name</td>
        <td>Description</td>
      </tr>
    </thead>
    <tbody>
    <?php
        if(isset($_POST['get_model_suggestion'])){
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $location = $_POST["m_location"]; 
        $rain_occurence = $_POST["m_rain_occurence"];
        $usecase = $_POST["m_usecase"]; 
        $size = $_POST["m_size"]; 
        $query = "SELECT model_id FROM suggest_model WHERE location='$location' AND size = '$size' AND use_case='$usecase' AND rain_occurence='$rain_occurence'";
        $result = mysqli_query($dbcon, $query);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){  
                $model_id = $row['model_id'];
                $query1 = "SELECT * FROM harvest_model WHERE model_id = '$model_id'";
                $result1 = mysqli_query($dbcon, $query1);
                if (mysqli_num_rows($result1) >= 1) {
                    while($row1 = mysqli_fetch_array($result1)){  ?>
                        <tr class="align-centre">
                            <td><?php echo $row1['model_id'] ?></td>
                            <td><img src="<?php echo $row1['model_image'] ?>"  width="100" height="100"></td>
                            <td ><?php echo $row1['model_name'] ?></td>
                            <td ><?php echo $row1['model_description'] ?></td>
                        </tr>
        <?php 
                    }
                }
            }
        }
        }
        ?> 
                        </tbody>
                    </table>
                    </div>


<?php include("include/footer.php"); ?>