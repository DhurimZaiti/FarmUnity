<?php
include 'config.php';

// Add seasonal plant form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $name = trim($_POST["name"]);
    $season = trim($_POST["season"]);
    $watering_cycle = trim($_POST["watering_cycle"]);
    $watering_times = trim($_POST["watering_times"]);
    $soil_type = trim($_POST["soil_type"]);
    $planted_at = trim($_POST["planted_at"]);
    $growth_rate = trim($_POST["growth_rate"]);
    $height = trim($_POST["height"]);
    $spread = trim($_POST["spread"]);
    $sun_requirements = trim($_POST["sun_requirements"]);

    // Check if username exists in users table
    $user_check_query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($user_check_query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Add seasonal plant to database
        $query = "INSERT INTO seasonal_plants (username, name, season, watering_cycle, watering_times, soil_type, planted_at, growth_rate, height, spread, sun_requirements)
                  VALUES (:username, :name, :season, :watering_cycle, :watering_times, :soil_type, :planted_at, :growth_rate, :height, :spread, :sun_requirements)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':season', $season);
        $stmt->bindParam(':watering_cycle', $watering_cycle);
        $stmt->bindParam(':watering_times', $watering_times);
        $stmt->bindParam(':soil_type', $soil_type);
        $stmt->bindParam(':planted_at', $planted_at);
        $stmt->bindParam(':growth_rate', $growth_rate);
        $stmt->bindParam(':height', $height);
        $stmt->bindParam(':spread', $spread);
        $stmt->bindParam(':sun_requirements', $sun_requirements);
        
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Seasonal plant added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $stmt->errorInfo()[2] . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error: Username does not exist in users table.</div>";
    }
}

$conn = null; // Release the connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Seasonal Plant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Optional: Light background color for the body */
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto; /* Center horizontally */
            padding: 20px;
        }

        .form-label {
            font-size: 0.875rem; /* Smaller label font size */
        }

        .form-control, .form-select {
            border-radius: 0.25rem; /* Optional: Slightly rounded corners */
        }

        .btn-primary {
            background-color: #007bff; /* Custom button color */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker button color on hover */
            border-color: #004085;
        }
    </style>
</head>
<body>

<!-- Add seasonal plant form -->
<div class="form-container">
    <h2 class="mb-4 text-center">Add Seasonal Plant</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="season" class="form-label">Season:</label>
            <select id="season" name="season" class="form-select" required>
                <option value="winter">Winter</option>
                <option value="spring">Spring</option>
                <option value="summer">Summer</option>
                <option value="autumn">Autumn</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="watering_cycle" class="form-label">Watering Cycle:</label>
            <input type="text" id="watering_cycle" name="watering_cycle" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="watering_times" class="form-label">Watering Times:</label>
            <input type="text" id="watering_times" name="watering_times" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="soil_type" class="form-label">Soil Type:</label>
            <input type="text" id="soil_type" name="soil_type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="planted_at" class="form-label">Planted At:</label>
            <input type="date" id="planted_at" name="planted_at" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="growth_rate" class="form-label">Growth Rate:</label>
            <select id="growth_rate" name="growth_rate" class="form-select" required>
                <option value="fast">Fast</option>
                <option value="medium">Medium</option>
                <option value="slow">Slow</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Height:</label>
            <input type="text" id="height" name="height" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="spread" class="form-label">Spread:</label>
            <input type="text" id="spread" name="spread" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sun_requirements" class="form-label">Sun Requirements:</label>
            <select id="sun_requirements" name="sun_requirements" class="form-select" required>
                <option value="full">Full</option>
                <option value="partial">Partial</option>
                <option value="none">None</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Add Seasonal Plant</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
