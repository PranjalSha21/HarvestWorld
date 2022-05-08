<?php include("include/header.php"); ?>
<?php 
    if($_SESSION['user_type'] != 'ADMIN'){
      $_SESSION['message'] = "Log in to continue";
      $_SESSION['status'] = "error";
      header("Location: ./login.php");
      exit();
    }
?>

<?php include("include/adminsidebar.php"); ?>
<div class="table-responsive">
  <table class="table align-middle">
    <thead>
      <tr>
        <td>ID</td>
        <td>Image</td>
        <td>Name</td>
        <td>Description</td>
        <td>Rain Occurence</td>
        <td>Use Case</td>
        <td>Location</td>
        <td>Size</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
    </thead>
    <?php 
        $get_products = "SELECT harvest_model.model_id as id,harvest_model.model_name as name,harvest_model.model_image as image ,harvest_model.model_description as description, suggest_model.location as location, suggest_model.use_case as usecase, suggest_model.size as size, suggest_model.rain_occurence as rain_occurence FROM harvest_model,suggest_model WHERE harvest_model.model_id = suggest_model.model_id";
        $dbcon = mysqli_connect("localhost","root","","harvest_world");
        $result = mysqli_query($dbcon, $get_products);
        if (mysqli_num_rows($result) >= 1) {
            while($row = mysqli_fetch_array($result)){ 
    ?>
    <tbody>
      <tr class="align-centre">
        <td><?php echo $row['id'] ?></td>
        <td><img src="<?php echo $row['image'] ?>"  width="100" height="100"></td>
        <td ><?php echo $row['name'] ?></td>
        <td ><?php echo $row['description'] ?></td>
        <td ><?php echo $row['rain_occurence'] ?></td>
        <td ><?php echo $row['usecase'] ?></td>
        <td ><?php echo $row['location'] ?></td>
        <td ><?php echo $row['size'] ?></td>
        <td > <a href="editmodel.php?id=<?php echo $row['id'] ?>"><button type="submit" class="btn btn-primary">Edit</button></a></td>
        <td > <a href="./Database/model.php?id=<?php echo $row['id'] ?>"><button type="submit" name="delete_product" class="btn btn-danger">Delete</button></a></td>
      </tr>
     <?php 
            }
        }
     ?> 
    </tbody>
  </table>
</div>

<?php include("include/footer.php"); ?>