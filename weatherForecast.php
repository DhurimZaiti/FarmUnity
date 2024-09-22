<?php
session_start(); // Start a new session or resume the existing one
include_once 'config.php'; // Your database connection file
include_once 'header.php';

// Check if username is set in the session
if (!isset($_SESSION['username'])) {
    die("User not logged in.");
}

$username = $_SESSION['username']; // Retrieve the username from the session

// Create connection
$conn = new mysqli($host, $dbuser, $dbpassword, $dbname); // Use your actual database variables

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the coordinates
$sql = "SELECT coordinates FROM farm WHERE farmManager = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // 's' specifies the variable type 'string'
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
        const apiKey = '1ae609043fd2454cafcad167fc191786'; // Replace with your actual API key
        let lat = <?php echo json_encode(value: $lat); ?>;  // Example latitude
        let lon = <?php echo json_encode(value: $lon); ?>;  // Example longitude
        let url = `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&exclude=minutely,hourly,alerts&units=metric&appid=${apiKey}`;

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



