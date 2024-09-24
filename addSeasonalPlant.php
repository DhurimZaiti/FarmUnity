<?php
include_once('config.php');
session_start();

// Check if the session is set
if (!isset($_SESSION)) {
    echo "Session is not set.";
    exit();
}

// Check if the username is set in the session
if (!isset($_SESSION['farm_unity_user'])) {
    echo "Username is not set in the session.";
    exit();
}

// Retrieve the logged-in username from the session variable
$username = $_SESSION['farm_unity_user'];

// Add seasonal plant form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $name = trim($_POST["name"]); // Use the raw name
    $season = trim($_POST["season"]);
    $watering_cycle = trim($_POST["watering_cycle"]);
    
    // Handle undefined or empty watering_times
    $watering_times = isset($_POST["watering_times"]) ? $_POST["watering_times"] : [];
    if (!is_array($watering_times)) {
        $watering_times = [];
    }
    $watering_times_str = implode(', ', $watering_times);
    
    $soil_type = trim($_POST["soil_type"]);
    $planted_at = trim($_POST["planted_at"]);
    $growth_rate = trim($_POST["growth_rate"]);
    $height = trim($_POST["height"]);
    $spread = trim($_POST["spread"]);
    $sun_requirements = trim($_POST["sun_requirements"]);

    // Remove height and spread from the name
    // $name_with_dimensions = $name . " (Height: " . $height . " cm, Spread: " . $spread . " cm)";

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
        $stmt->bindParam(':name', $name); // Store the name without dimensions
        $stmt->bindParam(':season', $season);
        $stmt->bindParam(':watering_cycle', $watering_cycle);
        $stmt->bindParam(':watering_times', $watering_times_str); // Convert the array to a comma-separated string
        $stmt->bindParam(':soil_type', $soil_type);
        $stmt->bindParam(':planted_at', $planted_at);
        $stmt->bindParam(':growth_rate', $growth_rate);
        $stmt->bindParam(':height', $height);
        $stmt->bindParam(':spread', $spread);
        $stmt->bindParam(':sun_requirements', $sun_requirements);

        if ($stmt->execute()) {
            // Redirect to seasonal_plants.php
            header("Location: seasonalPlants.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error: " . $stmt->errorInfo()[2] . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error: Username does not exist in users table.</div>";
    }

    $conn = null; // Release the connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Seasonal Plant</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Optional: Light background color for the body */
        }
        .watering-time-bar {
            display: flex;
            align-items: center;
        }

        .watering-time-bar input[type="time"] {
            flex-grow: 1;
        }

        .watering-time-bar button {
            margin-left: 10px;
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>" required>
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
            <div id="watering-times-container">
                <div class="watering-time-bar">
                    <input type="time" id="watering_times_1" name="watering_times[]" class="form-control" required>
                    <button type="button" class="btn btn-sm btn-secondary add-watering-time">+</button>
                    <button type="button" class="btn btn-sm btn-danger remove-watering-time">-</button>
                </div>
            </div>
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
            <label for="height" class="form-label">Height (cm):</label>
            <input type="text" id="height" name="height" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="spread" class="form-label">Spread (cm):</label>
            <input type="text" id="spread" name="spread" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sun_requirements" class="form-label">Sun Requirements:</label>
            <select id="sun_requirements" name="sun_requirements" class="form-select" required>
                <option value="full">Full Sun</option>
                <option value="mostly_sun">Mostly Sun</option>
                <option value="part_sun_part_shade">Part Sun/Part Shade</option>
                <option value="mostly_shade">Mostly Shade</option>
                <option value="full_shade">Full Shade</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Add Seasonal Plant</button>
        </div>
        <input type="hidden" id="watering_times_count" name="watering_times_count" value="0">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
 // Get the container and the add button
const wateringTimesContainer = document.getElementById('watering-times-container');
const wateringTimesCountInput = document.getElementById('watering_times_count');

// Initialize the counter for watering times
let wateringTimesCount = 0;

// Function to add a new watering time bar
function addWateringTime() {
    if (wateringTimesCount < 4) {
        const newWateringTimeBar = document.createElement('div');
        newWateringTimeBar.classList.add('watering-time-bar');
        newWateringTimeBar.innerHTML = `
            <input type="time" name="watering_times[]" class="form-control" required>
            <button type="button" class="btn btn-sm btn-secondary add-watering-time">+</button>
            <button type="button" class="btn btn-sm btn-danger remove-watering-time">-</button>
        `;
        wateringTimesContainer.appendChild(newWateringTimeBar);
        wateringTimesCount++;
        wateringTimesCountInput.value = wateringTimesCount;
    }
}

// Function to remove a watering time bar
function removeWateringTime(event) {
    const wateringTimeBar = event.target.parentNode;
    wateringTimesContainer.removeChild(wateringTimeBar);
    wateringTimesCount--;
    wateringTimesCountInput.value = wateringTimesCount;
}

// Add event listener to the add buttons
document.querySelectorAll('.add-watering-time').forEach(button => {
    button.addEventListener('click', addWateringTime);
});

// Add event listener to the remove buttons
wateringTimesContainer.addEventListener('click', (event) => {
    if (event.target.classList.contains('remove-watering-time')) {
        removeWateringTime(event);
    }
});
</script>
</body>
</html>
