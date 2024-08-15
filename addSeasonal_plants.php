<?php
include 'config.php';

// Add seasonal plant form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $season = $_POST["season"];
    $watering_cycle = $_POST["watering_cycle"];
    $watering_times = $_POST["watering_times"];
    $soil_type = $_POST["soil_type"];
    $planted_at = $_POST["planted_at"];
    $growth_rate = $_POST["growth_rate"];
    $height = $_POST["height"];
    $spread = $_POST["spread"];
    $sun_requirements = $_POST["sun_requirements"];

    // Check if username exists in users table
    $user_check_query = "SELECT * FROM users WHERE username = '$username'";
    $user_result = $conn->query($user_check_query);
    if ($user_result->rowCount() > 0) {
        // Add seasonal plant to database
        $query = "INSERT INTO seasonal_plants (username, name, season, watering_cycle, watering_times, soil_type, planted_at, growth_rate, height, spread, sun_requirements)
                  VALUES ('$username', '$name', '$season', '$watering_cycle', '$watering_times', '$soil_type', '$planted_at', '$growth_rate', '$height', '$spread', '$sun_requirements')";
        if ($conn->query($query) === TRUE) {
            echo "Seasonal plant added successfully!";
        } else {
            echo "Error: " . $query . "<br>" . $conn->errorInfo()[2];
        }
    } else {
        echo "Error: Username does not exist in users table.";
    }
}

$conn = null; // Release the connection

?>

<!-- Add seasonal plant form -->
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="season">Season:</label>
    <select id="season" name="season">
        <option value="winter">Winter</option>
        <option value="spring">Spring</option>
        <option value="summer">Summer</option>
        <option value="autumn">Autumn</option>
    </select><br><br>
    <label for="watering_cycle">Watering Cycle:</label>
    <input type="text" id="watering_cycle" name="watering_cycle"><br><br>
    <label for="watering_times">Watering Times:</label>
    <input type="text" id="watering_times" name="watering_times"><br><br>
    <label for="soil_type">Soil Type:</label>
    <input type="text" id="soil_type" name="soil_type"><br><br>
    <label for="planted_at">Planted At:</label>
    <input type="date" id="planted_at" name="planted_at"><br><br>
    <label for="growth_rate">Growth Rate:</label>
    <select id="growth_rate" name="growth_rate">
        <option value="fast">Fast</option>
        <option value="medium">Medium</option>
        <option value="slow">Slow</option>
    </select><br><br>
    <label for="height">Height:</label>
    <input type="text" id="height" name="height"><br><br>
    <label for="spread">Spread:</label>
    <input type="text" id="spread" name="spread"><br><br>
    <label for="sun_requirements">Sun Requirements:</label>
    <select id="sun_requirements" name="sun_requirements">
        <option value="full">Full</option>
        <option value="partial">Partial</option>
        <option value="none">None</option>
    </select><br><br>
    <input type="submit" value="Add Seasonal Plant">
</form>