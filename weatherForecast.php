<?php
include_once "config.php";
include_once "header.php";

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch farm coordinates from the database
$query = "SELECT farm_coordinates FROM farm WHERE id = 1"; // Adjust the ID based on your requirements
$stmt = $conn->prepare($query);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $coords = explode(', ', $row['farm_coordinates']);
    $lat = $coords[0];
    $lon = $coords[1];
} else {
    echo "No coordinates found!";
    exit;
}

// No need to close the connection explicitly with PDO; it closes automatically when the script ends.
?>

<div class="container mt-5">
    <h1 class="mb-3">Weather Forecast</h1>
    <div id="forecast-container" class="row"></div>

    <?php if (isset($lat) && isset($lon)): ?>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lat = <?php echo json_encode($lat); ?>;
            const lon = <?php echo json_encode($lon); ?>;
            const apiUrl = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m&hourly=temperature_2m,relative_humidity_2m,precipitation,cloud_cover&daily=temperature_2m_max,temperature_2m_min,sunrise,sunset,precipitation_sum&timezone=auto`;

            axios.get(apiUrl)
                .then(function(response) {
                    const data = response.data;
                    updateWeatherDisplay(data);
                })
                .catch(function(error) {
                    console.error('Error fetching weather data:', error);
                });
        });

        function updateWeatherDisplay(data) {
            const forecastContainer = document.getElementById('forecast-container');
            data.daily.forEach(day => {
                const col = document.createElement('div');
                col.className = 'col-md-4 mb-3';
                col.innerHTML = `
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${new Date(day.date).toLocaleDateString()}</h5>
                            <p class="card-text"><i class="fas fa-temperature-high"></i> Max Temp: ${day.temperature_2m_max}°C</p>
                            <p class="card-text"><i class="fas fa-temperature-low"></i> Min Temp: ${day.temperature_2m_min}°C</p>
                            <p class="card-text"><i class="fas fa-cloud-rain"></i> Precipitation: ${day.precipitation_sum} mm</p>
                            <p class="card-text"><i class="fas fa-sun"></i> Sunrise: ${day.sunrise}</p>
                            <p class="card-text"><i class="fas fa-moon"></i> Sunset: ${day.sunset}</p>
                        </div>
                    </div>
                `;
                forecastContainer.appendChild(col);
            });
        }
        </script>
    <?php else: ?>
        <p>No coordinates available for weather forecast.</p>
    <?php endif; ?>
</div>

<?php include_once "footer.php"; ?>
