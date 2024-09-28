<?php
include_once "header.php";

// Ensure 'id' parameter is present and valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID parameter.");
}

$id = intval($_GET['id']); // Sanitize the ID

// Fetch the equipment to edit
$query = "SELECT * FROM equipment WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$equipment = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if equipment was found
if (!$equipment) {
    die("Equipment not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect updated data
    $name = trim($_POST["name"]);
    $type = trim($_POST["type"]);
    $brand_model = trim($_POST["brand_model"]);
    $model_year = $_POST["model_year"];
    $plate_number = trim($_POST["plate_number"]);
    $serial_number = trim($_POST["serial_number"]);
    $distance = trim($_POST["distance"]);
    $registration_date = trim($_POST["registration_date"]);
    $registration_expiration = trim($_POST["registration_expiration"]);
    $description = trim($_POST["description"]);

    // Update the equipment details
    $update_query = "UPDATE equipment SET name = :name, type = :type, brand_model = :brand_model, model_year = :model_year, plate_number = :plate_number, serial_number = :serial_number, distance = :distance, registration_date = :registration_date, registration_expiration = :registration_expiration, description = :description WHERE id = :id";
    $stmt = $conn->prepare($update_query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':brand_model', $brand_model);
    $stmt->bindParam(':model_year', $model_year);
    $stmt->bindParam(':plate_number', $plate_number);
    $stmt->bindParam(':serial_number', $serial_number);
    $stmt->bindParam(':distance', $distance);
    $stmt->bindParam(':registration_date', $registration_date);
    $stmt->bindParam(':registration_expiration', $registration_expiration);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect to equipment.php after successful update
        header('Location: equipment.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->errorInfo()[2] . "</div>";
    }
}

$conn = null; // Release the connection
?>


    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 20px auto;
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
    </style>

<body>

<div class="form-container">
    <h2 class="mb-4">Edit Equipment</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($equipment['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <input type="text" id="type" name="type" class="form-control" value="<?php echo htmlspecialchars($equipment['type']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="brand_model" class="form-label">Brand Model:</label>
            <input type="text" id="brand_model" name="brand_model" class="form-control" value="<?php echo htmlspecialchars($equipment['brand_model']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="model_year" class="form-label">Model Years:</label>
            <input type="text" id="model_year" name="model_year" class="form-control" value="<?php echo htmlspecialchars($equipment['model_year']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="plate_number" class="form-label">Plate Number:</label>
            <input type="text" id="plate_number" name="plate_number" class="form-control" value="<?php echo htmlspecialchars($equipment['plate_number']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="serial_number" class="form-label">Serial Number:</label>
            <input type="text" id="serial_number" name="serial_number" class="form-control" value="<?php echo htmlspecialchars($equipment['serial_number']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="distance" class="form-label">Distance (km):</label>
            <input type="text" id="distance" name="distance" class="form-control" value="<?php echo htmlspecialchars($equipment['distance']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="registration_date" class="form-label">Registration Date:</label>
            <input type="date" id="registration_date" name="registration_date" class="form-control" value="<?php echo htmlspecialchars($equipment['registration_date']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="registration_expiration" class="form-label">Registration Expiration:</label>
            <input type="date" id="registration_expiration" name="registration_expiration" class="form-control" value="<?php echo htmlspecialchars($equipment['registration_expiration']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-control" required><?php echo htmlspecialchars($equipment['description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-custom">Update Equipment</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
