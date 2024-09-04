<?php 
    include_once 'header.php';
?>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</head>
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
                                <input type="text" name="name" class="form-control" id="name" value="Corn">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="species" class="col-form-label col-md-3">Variety:</label>
                            <div class="col-md-9">
                                <input type="text" name="species" class="form-control" id="species" value="Dent Corn">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="species" class="col-form-label col-md-3">Latin Name:</label>
                            <div class="col-md-9">
                                <input type="text" name="species" class="form-control" id="species" value="Zea Mays">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="species" class="col-form-label col-md-3">Genus:</label>
                            <div class="col-md-9">
                                <input type="text" name="species" class="form-control" id="species" value="Zea">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="species" class="col-form-label col-md-3">Country Origin:</label>
                            <div class="col-md-9">
                                <input type="text" name="species" class="form-control" id="species" value="U.S.A.">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="dob" class="col-form-label col-md-3">Planted On (Date):</label>
                            <div class="col-md-9">
                                <input type="date" name="dob" class="form-control" id="planted_on" value="2021-03-12">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="breed" class="col-form-label col-md-3">Planted In (Field):</label>
                            <div class="col-md-9">
                                <!-- <input type="text" name="breed" class="form-control" id="breed" value="12/04/2024"> -->
                                <div class="btn-group">
                                <button type="button" class="btn btn-outline-dark">Select Field</button>
                                <button type="button" name="field" id="field" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" value="field_1" href="#">Field 1</a></li>
                                    <li><a class="dropdown-item" value="field_2" href="#">Field 2</a></li>
                                    <li><a class="dropdown-item" value="field_3" href="#">Field 3</a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="avg_height" class="col-form-label col-md-3">Average Height:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="avg_height" class="form-control" id="avg_height" value="243">
                                <span class="input-group-text ms-2">cm</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="avg_spread" class="col-form-label col-md-3">Average Spread:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="avg_spread" class="form-control" id="avg_spread" value="35">
                                <span class="input-group-text ms-2">cm</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id" class="col-form-label col-md-3">Internal ID:</label>
                            <div class="col-md-9">
                                <input type="text" name="internal_id" class="form-control" id="id" value="K01382">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="notes" class="col-form-label col-md-3">Notes:</label>
                            <div class="col-md-9">
                                <textarea name="notes" class="form-control" id="notes" rows="3">The corn, while a bit burnt...</textarea>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Soil/Sun Conditions</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="height" class="col-form-label col-md-3">Soil Type:</label>
                            <div class="col-md-9">
                                <!-- Add the dropdown -->
                                <input type="number" name="height" class="form-control" id="height" value="190" step="any">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="weight" class="col-form-label col-md-3">Weight:</label>
                            <div class="col-md-9 d-flex">
                                <input type="number" name="weight" class="form-control" id="weight" value="433" step="any">
                                <span class="input-group-text ms-2">kg</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="length" class="col-form-label col-md-3">Length:</label>
                            <div class="col-md-9 d-flex">
                                <input type="number" name="length" class="form-control" id="length" value="224" step="any">
                                <span class="input-group-text ms-2">cm</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="specific-metrics" class="col-form-label col-md-3">Specific Metrics:</label>
                            <div class="col-md-9">
                                <textarea name="specific_metrics" class="form-control" id="specific-metrics" placeholder="Add specific metrics here" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Health</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="health-report" class="col-form-label col-md-3">Health Report:</label>
                            <div class="col-md-9">
                                <textarea name="health_report" class="form-control" id="health-report" rows="3">Vaccinated</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="vaccination-status" class="col-form-label col-md-3">Vaccination Status:</label>
                            <div class="col-md-9">
                                <input type="text" name="vaccinations_status" class="form-control" id="vaccination-status" value="Vaccinated">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="breeding-season" class="col-form-label col-md-3">Breeding Season:</label>
                            <div class="col-md-9">
                                <input type="text" name="breeding_season" class="form-control" id="breeding-season" placeholder="Select breeding season period">
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
                                <textarea name="vaccination_records" class="form-control" id="vaccination-records" rows="3">Not Vaccinated in 2020. Vaccinated from 2021-2023.</textarea>
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
                                <textarea name="current_medications" class="form-control" id="current-medications" rows="3">Multivitamin, Iron supplement</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="medication-records" class="col-form-label col-md-3">Medication Records:</label>
                            <div class="col-md-9">
                                <textarea name="medication_records" class="form-control" id="medication-records" rows="3">Ill on the 12.9.2023-19.9.2023 with the common cold. Had Diarrhea on the 15.02.2023 for 4 days.</textarea>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Living Conditions</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="ideal-lc" class="col-form-label col-md-3">Ideal Living Conditions:</label>
                            <div class="col-md-9">
                                <input type="text" name="ideal_lc" class="form-control" id="ideal-lc" value="In 48% humidified air.">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="enviromental-needs" class="col-form-label col-md-3">Enviromental Needs:</label>
                            <div class="col-md-9">
                                <input type="text" name="enviromental_needs" class="form-control" id="enviromental-needs" value="Paddock A">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="specific-care" class="col-form-label col-md-3">Specific Care Instructions:</label>
                            <div class="col-md-9">
                                <textarea name="specific_care" class="form-control" id="specific-care" rows="3">Bessie needs to be handled carefully, because she is very sensitive to pressure.</textarea>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Other Information</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="estimated-value" class="col-form-label col-md-3">Estimated Value:</label>
                            <div class="col-md-9 d-flex">
                                <input type="number" name="estimated_value" class="form-control" id="estimated-value" value="540" step="any">
                                <span class="input-group-text ms-2">€</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="offspring" class="col-form-label col-md-3">Offspring:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="offspring" class="form-control" id="offspring" value="Amy, Betty" step="any">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="average-feed" class="col-form-label col-md-3">Average Feed / Day:</label>
                            <div class="col-md-9 d-flex">
                                <input type="number" name="feed_per_day" class="form-control" id="average-feed" value="20" step="any">
                                <span class="input-group-text ms-2">kg</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="milking-records" class="col-form-label col-md-3">Milking Records:</label>
                            <div class="col-md-9">
                                <textarea name="milking_records" class="form-control" id="milking-records" rows="3">Milked 15L on 12.9.2023. Milking regularity 5L/day on average.</textarea>
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

<script>
    $(function() {
        $('#breeding-season').daterangepicker({
            opens: 'right',
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    });
</script>