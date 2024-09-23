<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Equipment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>

<div class="form-container">
    <h2 class="mb-4">Add New Equipment</h2>

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

    <form action="AddEquipmentLogic.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <input type="text" id="type" name="type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="brand_model" class="form-label">Brand Model:</label>
            <input type="text" id="brand_model" name="brand_model" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="model_year" class="form-label">Model Year:</label>
            <input type="text" id="model_year" name="model_year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="plate_number" class="form-label">Plate Number:</label>
            <input type="text" id="plate_number" name="plate_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="serial_number" class="form-label">Serial Number:</label>
            <input type="text" id="serial_number" name="serial_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="distance" class="form-label">Distance (km):</label>
            <input type="text" id="distance" name="distance" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="registration_date" class="form-label">Registration Date:</label>
            <input type="date" id="registration_date" name="registration_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="registration_expiration" class="form-label">Registration Expiration:</label>
            <input type="date" id="registration_expiration" name="registration_expiration" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-custom">Add Equipment</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
