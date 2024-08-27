<?php 
    include_once 'header.php';
?>
<div class="content">
    <div class="container mb-5 mt-3">
        <div class="contents">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="h1 mb-3">Edit Bessie's Information</h1>
                </div>
                <div class="col-12">
                    <h4 class="h4 mb-0">General Info</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="name" class="col-form-label col-md-3">Name:</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="name" value="Bessie">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="species" class="col-form-label col-md-3">Species:</label>
                            <div class="col-md-9">
                                <input type="text" name="species" class="form-control" id="species" value="Cow">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="breed" class="col-form-label col-md-3">Breed:</label>
                            <div class="col-md-9">
                                <input type="text" name="breed" class="form-control" id="breed" value="Busha">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="gender" class="col-form-label col-md-3">Gender:</label>
                            <div class="col-md-9">
                                <input type="text" name="gender" class="form-control" id="gender" value="Female">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="color" class="col-form-label col-md-3">Color:</label>
                            <div class="col-md-9">
                                <input type="text" name="color" class="form-control" id="color" value="White, Brown, Black">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="location" class="col-form-label col-md-3">Location/Paddock:</label>
                            <div class="col-md-9">
                                <input type="text" name="location" class="form-control" id="location" value="Farm 2">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id" class="col-form-label col-md-3">Internal ID:</label>
                            <div class="col-md-9">
                                <input type="text" name="internal_id" class="form-control" id="id" value="K01382">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id" class="col-form-label col-md-3">External ID:</label>
                            <div class="col-md-9">
                                <input type="text" name="external_id" class="form-control" id="id" value="K01382">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-form-label col-md-3">Description:</label>
                            <div class="col-md-9">
                                <input type="text" name="description" class="form-control" id="description" value="Solid Cow, Beautiful, Very Economical :))">
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Metrics</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="height" class="col-form-label col-md-3">Height:</label>
                            <div class="col-md-9">
                                <input type="text" name="height" class="form-control" id="height" value="190cm">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="weight" class="col-form-label col-md-3">Weight:</label>
                            <div class="col-md-9">
                                <input type="text" name="weight" class="form-control" id="weight" value="433kg">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="length" class="col-form-label col-md-3">Length:</label>
                            <div class="col-md-9">
                                <input type="text" name="length" class="form-control" id="length" value="224cm">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="specific-metrics" class="col-form-label col-md-3">Specific Metrics:</label>
                            <div class="col-md-9">
                                <input type="text" name="specific_metrics" class="form-control" id="specific-metrics" placeholder="Add specific metrics here">
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Health</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="vaccination-status" class="col-form-label col-md-3">Vaccination Status:</label>
                            <div class="col-md-9">
                                <input type="text" name="vaccinations_status" class="form-control" id="vaccination-status" value="Vaccinated">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="reproduction-status" class="col-form-label col-md-3">Reproduction Status:</label>
                            <div class="col-md-9">
                                <input type="text" name="reproduction_status" class="form-control" id="reproduction-status" value="Pregnant / Lactating / Infertile / None">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="vaccination-records" class="col-form-label col-md-3">Vaccination Records:</label>
                            <div class="col-md-9">
                                <input type="text" name="vaccination_records" class="form-control" id="vaccination-records" value="Not Vaccinated in 2020. Vaccinated from 2021-2023.">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="allergies" class="col-form-label col-md-3">Allergies:</label>
                            <div class="col-md-9">
                                <input type="text" name="allergies" class="form-control" id="allergies" value="Peanuts, Cornstarch">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nutrient-deficiencies" class="col-form-label col-md-3">Nutrient Deficiencies:</label>
                            <div class="col-md-9">
                                <input type="text" name="nutrient_deficiencies" class="form-control" id="nutrient-deficiencies" value="Calcium, Iron">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="current-medications" class="col-form-label col-md-3">Current Medications:</label>
                            <div class="col-md-9">
                                <input type="text" name="current_medications" class="form-control" id="current-medications" value="Antibiotics, Calcium Tablets">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="medication-records" class="col-form-label col-md-3">Medication Records:</label>
                            <div class="col-md-9">
                                <input type="text" name="medication_records" class="form-control" id="medication-records" value="Ill on the 12.9.2023-19.9.2023 with the common cold. Had Diarrhea on the 15.02.2023 for 4 days.">
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Living Conditions</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="ideal-living-conditions" class="col-form-label col-md-3">Ideal Living Conditions:</label>
                            <div class="col-md-9">
                                <input type="text" name="ideal_living" class="form-control" id="ideal-living-conditions" value="In a paddock, with a temperature between 19-24 C">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="environmental-needs" class="col-form-label col-md-3">Environmental Needs:</label>
                            <div class="col-md-9">
                                <input type="text" name="enviromental_needs" class="form-control" id="environmental-needs" value="Humidity at 49% for ideal milk production.">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="specific-care" class="col-form-label col-md-3">Specific Care Instructions:</label>
                            <div class="col-md-9">
                                <input type="text" name="specific_care" class="form-control" id="specific-care" value="Bessie needs to be handled carefully, because she is very sensitive to pressure.">
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Other Information</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="offspring" class="col-form-label col-md-3">Offspring:</label>
                            <div class="col-md-9">
                                <input type="text" name="offspring" class="form-control" id="offspring" value="Amy, Betty">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="estimated-value" class="col-form-label col-md-3">Estimated Value:</label>
                            <div class="col-md-9">
                                <input type="text" name="estimated_value" class="form-control" id="estimated-value" value="540€">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="average-feed" class="col-form-label col-md-3">Average Feed / Day:</label>
                            <div class="col-md-9">
                                <input type="text" name="feed-per-day" class="form-control" id="average-feed" value="20kg">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-end">
                        <a href="editSingleAnimal.php" class=""><button class="btn btn-outline-secondary">Cancel</button></a>
                        <a href="editSALogic.php" class="mx-3"><button class="btn btn-primary">Confirm</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
