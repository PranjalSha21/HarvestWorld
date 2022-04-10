<?php include("include/header.php"); ?>
<?php include("include/adminsidebar.php"); ?>

<h1 class="text-center mt-5">Add Models</h1>
<br>
<div class="card mx-5 mb-5">
        <br>
        <div class="cardbody mx-5">
                <form action="./Database/model.php" enctype="multipart/form-data" method="POST">
                        <br>
                        <div class="mb-3">
                                <label class="form-label">Model Name</label>
                                <input type="text" name="m_name" class="form-control" required aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Description</label>
                                <Textarea type="text" name="m_description" class="form-control" required TextMode="MultiLine"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <select id="inputState" name="m_location" required class="form-select">
                                <option selected>Building with terrace</option>
                                <option>Duplex house with garden area</option>
                                <option>Farming Area of large size</option>
                                <option>College/School or corporation</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rain Occurence</label>
                            <select id="inputState" name="m_rain_occurence" class="form-select">
                                <option selected>low</option>
                                <option>moderate</option>
                                <option>high</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Use Case</label>
                            <select id="inputState" name="m_usecase" class="form-select">
                                <option selected>Farming</option>
                                <option>House hold use</option>
                                <option>General Use</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Size</label>
                            <select id="inputState" name="m_size" class="form-select">
                                <option selected>small</option>
                                <option>medium</option>
                                <option>large</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" accept="image/*"  name="m_image" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-success" name="add_model">Submit</button>
                </form>
                <br>
        </div>
</div>

<?php include("include/footer.php"); ?>