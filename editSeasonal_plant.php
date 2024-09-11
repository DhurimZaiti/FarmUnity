<?php
include 'config.php';

// Ensure 'id' parameter is present and valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID parameter.");
}

$id = intval($_GET['id']); // Sanitize the ID

// Fetch the plant to edit
$query = "SELECT * FROM seasonal_plants WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$plant = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if plant was found
if (!$plant) {
    die("Plant not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect updated data
    $name = trim($_POST["name"]);
    $season = trim($_POST["season"]);
    $watering_cycle = trim($_POST["watering_cycle"]);
    $watering_times = $_POST["watering_times"];
    $soil_type = trim($_POST["soil_type"]);
    $planted_at = trim($_POST["planted_at"]);
    $growth_rate = trim($_POST["growth_rate"]);
    $height = trim($_POST["height"]);
    $spread = trim($_POST["spread"]);
    $sun_requirements = trim($_POST["sun_requirements"]);

    // Update the plant details
    $update_query = "UPDATE seasonal_plants SET name = :name, season = :season, watering_cycle = :watering_cycle, watering_times = :watering_times, soil_type = :soil_type, planted_at = :planted_at, growth_rate = :growth_rate, height = :height, spread = :spread, sun_requirements = :sun_requirements WHERE id = :id";
    $stmt = $conn->prepare($update_query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':season', $season);
    $stmt->bindParam(':watering_cycle', $watering_cycle);
    $stmt->bindParam(':watering_times', implode(', ', array_slice($watering_times, 0, 4))); // Limit to 4 watering times
    $stmt->bindParam(':soil_type', $soil_type);
    $stmt->bindParam(':planted_at', $planted_at);
    $stmt->bindParam(':growth_rate', $growth_rate);
    $stmt->bindParam(':height', $height);
    $stmt->bindParam(':spread', $spread);
    $stmt->bindParam(':sun_requirements', $sun_requirements);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect to seasonalPlants.php after successful update
        header('Location: seasonalPlants.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->errorInfo()[2] . "</div>";
    }
}
$conn = null; // Release the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Seasonal Plant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .readonly-input {
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            pointer-events: none;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2 class="mb-4">Edit Seasonal Plant</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control readonly-input" value="<?php echo htmlspecialchars($plant['username']); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($plant['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="season" class="form-label">Season:</label>
            <select id="season" name="season" class="form-select" required>
                <option value="winter" <?php if ($plant['season'] == 'winter') echo 'selected'; ?>>Winter</option>
                <option value="spring" <?php if ($plant['season'] == 'spring') echo 'selected'; ?>>Spring</option>
                <option value="summer" <?php if ($plant['season'] == 'summer') echo 'selected'; ?>>Summer</option>
                <option value="autumn" <?php if ($plant['season'] == 'autumn') echo 'selected'; ?>>Autumn</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="watering_cycle" class="form-label">Watering Cycle:</label>
            <input type="text" id="watering_cycle" name="watering_cycle" class="form-control" value="<?php echo htmlspecialchars($plant['watering_cycle']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="watering_times" class="form-label">Watering Times:</label>
            <div id="watering-times-container">
                <?php
                $watering_times = explode(', ', $plant['watering_times']);
                $watering_times = array_slice($watering_times, 0, 4); // Limit to 4 watering times
                foreach ($watering_times as $time) {
                    echo '<div class="watering-time-bar">';
                    echo '<input type="time" name="watering_times[]" class="form-control" value="' . htmlspecialchars($time) . '" required>';
                    echo '<button type="button" class="btn btn-sm btn-secondary add-watering-time">+</button>';
                    echo '<button type="button" class="btn btn-sm btn-danger remove-watering-time">-</button>';
                    echo '</div>';
                }
                // Ensure exactly 4 inputs
                for ($i = count($watering_times); $i < 4; $i++) {
                    echo '<div class="watering-time-bar">';
                    echo '<input type="time" name="watering_times[]" class="form-control" required>';
                    echo '<button type="button" class="btn btn-sm btn-secondary add-watering-time">+</button>';
                    echo '<button type="button" class="btn btn-sm btn-danger remove-watering-time">-</button>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="soil_type" class="form-label">Soil Type:</label>
            <input type="text" id="soil_type" name="soil_type" class="form-control" value="<?php echo htmlspecialchars($plant['soil_type']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="planted_at" class="form-label">Planted At:</label>
            <input type="date" id="planted_at" name="planted_at" class="form-control" value="<?php echo htmlspecialchars($plant['planted_at']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="growth_rate" class="form-label">Growth Rate:</label>
            <select id="growth_rate" name="growth_rate" class="form-select" required>
                <option value="fast" <?php if ($plant['growth_rate'] == 'fast') echo 'selected'; ?>>Fast</option>
                <option value="moderate" <?php if ($plant['growth_rate'] == 'moderate') echo 'selected'; ?>>Moderate</option>
                <option value="slow" <?php if ($plant['growth_rate'] == 'slow') echo 'selected'; ?>>Slow</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Height (cm):</label>
            <input type="number" id="height" name="height" class="form-control" value="<?php echo htmlspecialchars($plant['height']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="spread" class="form-label">Spread (cm):</label>
            <input type="number" id="spread" name="spread" class="form-control" value="<?php echo htmlspecialchars($plant['spread']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="sun_requirements" class="form-label">Sun Requirements:</label>
            <select id="sun_requirements" name="sun_requirements" class="form-select" required>
                <option value="full_sun" <?php echo $plant['sun_requirements'] == 'full_sun' ? 'selected' : ''; ?>>Full Sun</option>
                <option value="mostly_sun" <?php echo $plant['sun_requirements'] == 'mostly_sun' ? 'selected' : ''; ?>>Mostly Sun</option>
                <option value="part_sun_part_shade" <?php echo $plant['sun_requirements'] == 'part_sun_part_shade' ? 'selected' : ''; ?>>Part Sun/Part Shade</option>
                <option value="mostly_shade" <?php echo $plant['sun_requirements'] == 'mostly_shade' ? 'selected' : ''; ?>>Mostly Shade</option>
                <option value="full_shade" <?php echo $plant['sun_requirements'] == 'full_shade' ? 'selected' : ''; ?>>Full Shade</option>
            </select>
        </div>
        <button type="submit" class="btn btn-custom">Update Plant</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const maxWateringTimes = 4;
        document.querySelector('#watering-times-container').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('add-watering-time')) {
                const container = document.querySelector('#watering-times-container');
                const existingTimes = container.querySelectorAll('input[name="watering_times[]"]').length;
                if (existingTimes < maxWateringTimes) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('watering-time-bar');
                    newRow.innerHTML = `
                        <input type="time" name="watering_times[]" class="form-control" required>
                        <button type="button" class="btn btn-sm btn-secondary add-watering-time">+</button>
                        <button type="button" class="btn btn-sm btn-danger remove-watering-time">-</button>
                    `;
                    container.appendChild(newRow);
                }
            } else if (e.target && e.target.classList.contains('remove-watering-time')) {
                const row = e.target.closest('.watering-time-bar');
                if (row && row.parentElement.children.length > 1) {
                    row.remove();
                }
            }
        });
    });
</script>

</body>
</html>
