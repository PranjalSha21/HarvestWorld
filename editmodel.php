<?php include("include/header.php"); ?>
<?php include("include/adminsidebar.php"); ?>

<h1 class="text-center mt-5">Edit Models</h1>
<br>
<div class="card mx-5 mb-5">
        <br>
        <div class="cardbody mx-5">
                <form action="./Database/model.php" enctype="multipart/form-data" method="POST">
                        <br>
                        <?php 
                            $id = intval($_GET['id']);
                            $get_model = "SELECT harvest_model.model_id as id,harvest_model.model_name as name,harvest_model.model_image as image ,harvest_model.model_description as description, suggest_model.location as location, suggest_model.use_case as usecase, suggest_model.size as size, suggest_model.rain_occurence as rain_occurence FROM harvest_model,suggest_model WHERE suggest_model.model_id=$id AND harvest_model.model_id = $id";
                            $dbcon = mysqli_connect("localhost","root","","harvest_world");
                            $result = mysqli_query($dbcon, $get_model);
                            if (mysqli_num_rows($result) >= 1) {
                                while($row = mysqli_fetch_array($result)){ 
                        ?>
                        <div class="mb-3">
                                <label class="form-label">Model Name</label>
                                <input type="text" name="m_name" required class="form-control" value="<?php echo $row['name'] ?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Description</label>
                                <Textarea type="text" name="m_description" class="form-control"TextMode="MultiLine"><?php echo $row['description'] ?></textarea>
                                <input type="hidden" name="m_id" required value="<?php echo $id ?>" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <select id="inputState" name="m_location" class="form-select">
                                <option selected><?php echo $row['location'] ?></option>
                                <option>Building with terrace</option>
                                <option>Duplex house with garden area</option>
                                <option>Farming Area of large size</option>
                                <option>College/School or corporation</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rain Occurence</label>
                            <select id="inputState" name="m_rain_occurence" class="form-select">
                                <option selected><?php echo $row['rain_occurence'] ?></option>
                                <option>low</option>
                                <option>moderate</option>
                                <option>high</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Use Case</label>
                            <select id="inputState" name="m_usecase" class="form-select">
                                <option selected><?php echo $row['usecase'] ?></option>
                                <option>Farming</option>
                                <option>House hold use</option>
                                <option>General Use</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Size</label>
                            <select id="inputState" name="m_size" class="form-select">
                                <option selected><?php echo $row['size'] ?></option>
                                <option>small</option>
                                <option>medium</option>
                                <option>large</option>
                            </select> 
                        </div>
                        <button type="submit" class="btn btn-success" name="update_model">Submit</button>
                        <?php
                                }
                            }
                        ?>
                </form>
                <br>
        </div>
</div>

<?php include("include/footer.php"); ?>