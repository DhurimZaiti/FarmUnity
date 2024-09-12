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
                    <h1 class="h1 mb-3">Edit Planting Information</h1>
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
                            <label for="variety" class="col-form-label col-md-3">Variety:</label>
                            <div class="col-md-9">
                                <input type="text" name="variety" class="form-control" id="variety" value="Dent Corn">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="latin_name" class="col-form-label col-md-3">Latin Name:</label>
                            <div class="col-md-9">
                                <input type="text" name="latin_name" class="form-control" id="latin_name" value="Zea Mays">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="genus" class="col-form-label col-md-3">Genus:</label>
                            <div class="col-md-9">
                                <input type="text" name="genus" class="form-control" id="genus" value="Zea">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="country_origin" class="col-form-label col-md-3">Country Origin:</label>
                            <div class="col-md-9">
                                <input type="text" name="country_origin" class="form-control" id="country_origin" value="U.S.A.">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="planted_on" class="col-form-label col-md-3">Planted On (Date):</label>
                            <div class="col-md-9">
                                <input type="date" name="planted_on" class="form-control" id="planted_on" value="2024-04-12" min="2019-12-31">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="field" class="col-form-label col-md-3">Planted In (Field):</label>
                            <div class="col-md-9">
                                <select class="form-select" id="soil_type" name="soil_type" required>
                                    <option value="field1">Field 1</option>
                                    <option value="field2">Field 2</option>
                                    <option value="field3">Field 3</option>
                                </select>
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
                            <label for="internal_id" class="col-form-label col-md-3">Internal ID:</label>
                            <div class="col-md-9">
                                <input type="text" name="internal_id" class="form-control" id="internal_id" value="P001">
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
                            <label for="soil_type" class="col-form-label col-md-3">Soil Type:</label>
                            <div class="col-md-9">
                                <select class="form-select" id="soil_type" name="soil_type" required>
                                    <option value="calcisol">Calcisol</option>
                                    <option value="brown">Brown Soil</option>
                                    <option value="black">Black Soil</option>
                                    <option value="red">Red Soil</option>
                                    <option value="alluvial">Alluvial Soil</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="planting_method" class="col-form-label col-md-3">Planting Method:</label>
                            <div class="col-md-9">
                                <input type="text" name="planting_method" class="form-control" id="planting_method" value="Direct Seeded">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="sun_requirements" class="col-form-label col-md-3">Sun Requirements:</label>
                            <div class="col-md-9">
                                <select class="form-select" id="sun_requirements" name="sun_requirements" required>
                                    <option value="full_sun">Full Sun</option>
                                    <option value="full_part_sun">Full to Partial Sun</option>
                                    <option value="part_sun">Partial Sun</option>
                                    <option value="part_shade">Partial Shade</option>
                                    <option value="full_part_shade">Full to Partial Shade</option>
                                    <option value="shade">Full Shade</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pest_resistance" class="col-form-label col-md-3">Pest/Disease Resistance:</label>
                            <div class="col-md-9">
                                <input type="text" name="pest_resistance" class="form-control" id="pest_resistance" value="Mites">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fertilizer" class="col-form-label col-md-3">Fertilizer Requirements:</label>
                            <div class="col-md-9">
                                <input type="text" name="fertilizer" class="form-control" id="fertilizer" value="Cow Fertilizer, Natural">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="soil_ph" class="col-form-label col-md-3">Ideal Soil pH level:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="soil_ph" class="form-control" id="soil_ph" value="8.3">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="v_spacing" class="col-form-label col-md-3">Vertical Spacing:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="v_spacing" class="form-control" id="v_spacing" value="14">
                                <span class="input-group-text ms-2">cm</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="h_spacing" class="col-form-label col-md-3">Horizontal Spacing:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="h_spacing" class="form-control" id="h_spacing" value="6">
                                <span class="input-group-text ms-2">cm</span>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Watering and Yield</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="water_quantity" class="col-form-label col-md-3">Watering Quantity:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="water_quantity" class="form-control" id="water_quantity" value="1500">
                                <span class="input-group-text ms-2">l/day</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="water_cycle" class="col-form-label col-md-3">Watering Cycle:</label>
                            <div class="col-md-9">
                                <input type="text" name="water_cycle" class="form-control" id="water_cycle" value="2/day">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="watering_times" class="col-form-label col-md-3">Watering Times:</label>
                            <div class="col-md-9">
                                <input type="text" name="watering_times" class="form-control" id="watering_times" value="10:00, 20:00">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="growth_rate" class="col-form-label col-md-3">Growth Rate:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="growth_rate" class="form-control" id="growth_rate" value="8.4">
                                <span class="input-group-text ms-2">cm/week</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="expected_harvest_date" class="col-form-label col-md-3">Expected Harvest Date:</label>
                            <div class="col-md-9">
                                <input type="date" name="expected_harvest_date" class="form-control" id="expected_harvest_date" value="2024-09-14">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="actual_harvest_date" class="col-form-label col-md-3">Actual Harvest Date:</label>
                            <div class="col-md-9">
                                <input type="date" name="actual_harvest_date" class="form-control" id="actual_harvest_date" value="2024-09-17">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="expected_yield" class="col-form-label col-md-3">Expected Yield:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="expected_yield" class="form-control" id="expected_yield" value="4000">
                                <span class="input-group-text ms-2">kg</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="actual_yield" class="col-form-label col-md-3">Actual Yield:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="actual_yield" class="form-control" id="actual_yield" value="3458">
                                <span class="input-group-text ms-2">kg</span>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Finances</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="cost_investment" class="col-form-label col-md-3">Cost of Investment:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="cost_investment" class="form-control" id="cost_investment" value="2100">
                                <span class="input-group-text ms-2">€</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="market_price" class="col-form-label col-md-3">Market Price at Harvest:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="market_price" class="form-control" id="market_price" value="1">
                                <span class="input-group-text ms-2">€/kg</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="revenue" class="col-form-label col-md-3">Revenue:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="revenue" class="form-control" id="revenue" value="2700">
                                <span class="input-group-text ms-2">€</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="profit_loss" class="col-form-label col-md-3">Profit/Loss:</label>
                            <div class="col-md-9 d-flex">
                                <input type="text" name="profit_loss" class="form-control" id="profit_loss" value="600">
                                <span class="input-group-text ms-2">€</span>
                            </div>
                        </div>
                    </div>

                    <h4 class="h4 mb-0 mt-5">Harvesting</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="harvest_method" class="col-form-label col-md-3">Harvest Method:</label>
                            <div class="col-md-9">
                                <input type="text" name="harvest_method" class="form-control" id="harvest_method" value="Tractor">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="storage" class="col-form-label col-md-3">Storage:</label>
                            <div class="col-md-9">
                            <select class="form-select" id="soil_type" name="soil_type" required>
                                    <option value="field1">Silo 1</option>
                                    <option value="storage2">Storage 2</option>
                                    <option value="storage3">Storage 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="storage_conditions" class="col-form-label col-md-3">Storage Conditions:</label>
                            <div class="col-md-9">
                                <input type="text" name="storage_conditions" class="form-control" id="storage_conditions" value="32°C, 24% Humidity, Metal walls">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3 d-flex justify-content-end">
                        <a href="singlePlanting.php" class=""><button class="btn btn-outline-secondary">Cancel</button></a>
                        <a href="updatePlanting.php" class="mx-3"><button class="btn btn-primary">Save Changes</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#planted_on').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });
</script>


          