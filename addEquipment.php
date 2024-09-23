<?php
session_start();
include_once "header.php";

?>


    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 0.25rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-size: 0.875rem;
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>

<body>

<div class="content">
    <div class="container mb-5 ">
        <div class="contents">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="h1 mb-3">Add Equipment Information</h1>

                     <!-- Display error or success messages -->
                    <?php
                    if (isset($_SESSION['equipment_error_message'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['equipment_error_message'] . "</div>";
                        unset($_SESSION['equipment_error_message']);
                    }
                    if (isset($_SESSION['equipment_success']) && $_SESSION['equipment_success'] === true) {
                        echo "<div class='alert alert-success'>Equipment added successfully!</div>";
                        unset($_SESSION['equipment_success']);
                    }
                    ?>


                </div>
                <div class="col-12">
                    <h4 class="h4 mb-0">Information</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <div class="mb-3 row">
                            <label for="name" class="col-form-label col-md-3">Name:</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" id="name" value="Primary Tractor">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="type" class="col-form-label col-md-3">Type:</label>
                            <div class="col-md-9">
                                <input type="text" name="type" class="form-control" id="type" value="Tractor">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="brand_model" class="col-form-label col-md-3">Brand Model:</label>
                            <div class="col-md-9">
                                <input type="text" name="brand_model" class="form-control" id="brand_model" value="IMT 125">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="model_year" class="col-form-label col-md-3">Model Year:</label>
                            <div class="col-md-9">
                                <input type="number" name="model_year" class="form-control" id="model_year" value="1987">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="plate_number" class="col-form-label col-md-3">Plate Number:</label>
                            <div class="col-md-9">
                                <input type="text" name="plate_number" class="form-control" id="plate_number" value="TE125IM">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="plate_number" class="col-form-label col-md-3">Serial Number:</label>
                            <div class="col-md-9">
                                <input type="text" name="plate_number" class="form-control" id="plate_number" value="123551232">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="distance" class="col-form-label col-md-3">Distance Traveled (km):</label>
                            <div class="col-md-9 d-flex">
                                <input type="number" name="distance" class="form-control" id="distance" value="40000" min="40000">
                                <span class="input-group-text ms-2">km</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="registration_date" class="col-form-label col-md-3">Registration Date:</label>
                            <div class="col-md-9">
                                <input type="date" name="registration_date" class="form-control" id="registration_date" value="2024-04-12" min="2019-12-31">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="registration_expiration" class="col-form-label col-md-3">Registration Expiration:</label>
                            <div class="col-md-9">
                                <input type="date" name="registration_expiration" class="form-control" id="registration_expiration" value="2024-04-12" min="2019-12-31">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-form-label col-md-3">Description:</label>
                            <div class="col-md-9">
                                <textarea name="description" class="form-control" id="description" rows="3">The IMT 125 Tractor has this and that...</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3 d-flex justify-content-end">
                        <a href="plantings.php" class=""><button class="btn btn-outline-secondary">Cancel</button></a>
                        <a href="addEquipmentLogic.php" class="mx-3"><button class="btn btn-primary">Add Planting</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
