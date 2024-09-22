<?php
session_start(); // Start a new session or resume the existing one
include_once 'config.php'; // Your database connection file

$username = $_SESSION['username']; // Assume user ID is stored in session after login

// Create connection
$conn = new mysqli(hostname: $host, username: $username, password: $password, database: $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the coordinates
$sql = "SELECT coordinates FROM farm WHERE farmManager = $username";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id); // 'i' specifies the variable type 'integer'
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $coordinates = explode(",", $row['coordinates']); // Split the coordinates
    $lat = trim($coordinates[0]); // Latitude
    $lon = trim($coordinates[1]); // Longitude
} else {
    echo "No coordinates found!";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #forecast-container {
            display: flex;
            justify-content: start;
            overflow-x: auto;
            gap: 10px;
        }
        .forecast-day {
            flex: 0 0 auto;
            width: 120px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 10px;
            text-align: center;
        }
        .forecast-icon {
            width: 50px; 
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Weekly Weather Forecast</h1>
        <div id="forecast-container" class="mt-3"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchWeatherData();
        });

        function fetchWeatherData() {
            const apiKey = 'YOUR_API_KEY'; // Replace with your actual API key
            const lat = 42.0735;  // Example latitude
            const lon = 21.1009;  // Example longitude
            const url = `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&exclude=minutely,hourly,alerts&units=metric&appid=${apiKey}`;

            axios.get(url)
                .then(response => {
                    const data = response.data;
                    updateWeatherDisplay(data);
                })
                .catch(error => console.error('Error fetching weather data:', error));
        }

        function updateWeatherDisplay(data) {
            const forecastContainer = document.getElementById('forecast-container');
            data.daily.slice(0, 8).forEach(day => {
                const dayElem = document.createElement('div');
                dayElem.className = 'forecast-day';
                dayElem.innerHTML = `
                    <img src="http://openweathermap.org/img/wn/${day.weather[0].icon}.png" class="forecast-icon" alt="Weather Icon">
                    <div>${new Date(day.dt * 1000).toLocaleDateString()}</div>
                    <div>High: ${day.temp.max}°C</div>
                    <div>Low: ${day.temp.min}°C</div>
                    <div>${day.weather[0].description}</div>
                    <div>Precip: ${Math.round(day.pop * 100)}%</div>
                `;
                forecastContainer.appendChild(dayElem);
            });
        }
    </script>
</body>
</html>

