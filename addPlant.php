<?php
// Include database configuration
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Plant</title>
</head>

<body>
    <h1>Add New Plant</h1>
    <?php
    // Display error messages if any
    if (isset($_SESSION['plant_error_message'])) {
        echo '<div style="color: red;">' . $_SESSION['plant_error_message'] . '</div>';
        unset($_SESSION['plant_error_message']);
    }
    ?>

    <form action="plantLogic.php" method="post">


        <label for="name">Plant Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="family">Family:</label>
        <input type="text" id="family" name="family"><br><br>

        <label for="origin">Origin:</label>
        <input type="text" id="origin" name="origin"><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age"><br><br>

        <label for="soil_type">Soil Type:</label>
        <input type="text" id="soil_type" name="soil_type"><br><br>

        <label for="planted_at">Planted At:</label>
        <input type="date" id="planted_at" name="planted_at"><br><br>

        <label for="watering_cycle">Watering Cycle:</label>
        <input type="text" id="watering_cycle" name="watering_cycle"><br><br>

        <label for="watering_times">Watering Times:</label>
        <input type="time" id="watering_times" name="watering_times"><br><br>

        <label for="growth_rate">Growth Rate:</label>
        <select id="growth_rate" name="growth_rate">
            <option value="">Select</option>
            <option value="fast">Fast</option>
            <option value="medium">Medium</option>
            <option value="slow">Slow</option>
        </select><br><br>

        <label for="height">Height (in cm):</label>
        <input type="number" id="height" name="height" step="0.01"><br><br>

        <label for="spread">Spread (in cm):</label>
        <input type="number" id="spread" name="spread" step="0.01"><br><br>

        <label for="sun_requirements">Sun Requirements:</label>
        <select id="sun_requirements" name="sun_requirements">
            <option value="">Select</option>
            <option value="full">Full</option>
            <option value="partial">Partial</option>
            <option value="none">None</option>
        </select><br><br>

        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea><br><br>

        <input type="submit" name="submit" value="Add Plant">
    </form>
</body>

</html>