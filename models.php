<?php include("include/header.php"); ?>
<?php include("include/usersidebar.php"); ?>

<div class="card mx-5 mb-5 mt-5">
    <h3 class="text-center mt-3">Answer To Get Suggestions</h3>
    <div class="cardbody mx-5">
        <form action="suggestmodel.php" method="post">
        <div class="mb-3">
            <label class="form-label">Location</label>
            <select id="m_location" name="m_location" class="form-select">
                <option selected>Choose...</option>
                <option value="Building with terrace">Building with terrace</option>
                <option value="Duplex house with garden area">Duplex house with garden area</option>
                <option value="Farming Area of large size">Farming Area of large size</option>
                <option value="College/School or corporation">College/School or corporation</option>
            </select> 
        </div>
        <div class="mb-3">
            <label class="form-label">Rain Occurence</label>
            <select id="m_rain_occurence" name="m_rain_occurence" class="form-select">
                <option selected>Choose...</option>
                <option value="low">low</option>
                <option value="moderate">moderate</option>
                <option value="high">high</option>
            </select> 
        </div>
        <div class="mb-3">
            <label class="form-label">Use Case</label>
            <select id="m_usecase" name="m_usecase" class="form-select">
                <option selected>Choose...</option>
                <option value="Farming">Farming</option>
                <option value="House hold use">House hold use</option>
                <option value="General Use">General Use</option>
            </select> 
        </div>
        <div class="mb-3">
            <label class="form-label">Size</label>
            <select id="m_size" name="m_size" class="form-select">
                <option selected>Choose...</option>
                <option value="small">small</option>
                <option value="medium">medium</option>
                <option value="large">large</option>
            </select> 
        </div>
        <div class="col-md-12">
            <button type="submit" name="get_model_suggestion" class="btn btn-success col-md-12 mb-3">GET SUGGESTION</button>
        </div>
        </form>
    </div>
</div>

<?php include("include/footer.php"); ?>