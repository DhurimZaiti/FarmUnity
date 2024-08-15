<?php
ini_set('display_errors', 1);       
ini_set('display_startup_errors', 1);    
error_reporting(E_ALL);   
include_once 'config.php';

function getUsername($conn) {
    if (isset($_SESSION['farm_unity_userID'])) {
        $userId = $_SESSION['farm_unity_userID'];

        $sql = "SELECT username FROM users WHERE id = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['username'];
        } else {
            return null; // User not found
        }
    } else {
        return null; // No user ID in session
    }
}

session_start();

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form data
    $username = getUsername($conn);
    $name = htmlspecialchars($_POST['name']);
    $family = htmlspecialchars($_POST['family']);
    $origin = htmlspecialchars($_POST['origin']);
    $age = !empty($_POST['age']) ? (int)$_POST['age'] : null;
    $soil_type = htmlspecialchars($_POST['soil_type']);
    $planted_at = !empty($_POST['planted_at']) ? $_POST['planted_at'] : null;
    $watering_cycle = htmlspecialchars($_POST['watering_cycle']);
    $watering_times = !empty($_POST['watering_times']) ? (int)$_POST['watering_times'] : null;
    $growth_rate = htmlspecialchars($_POST['growth_rate']);
    $height = !empty($_POST['height']) ? (float)$_POST['height'] : null;
    $spread = !empty($_POST['spread']) ? (float)$_POST['spread'] : null;
    $sun_requirements = htmlspecialchars($_POST['sun_requirements']);
    $notes = htmlspecialchars($_POST['notes']);

    $error = '';

    // Basic validation
    if (empty($username) || empty($name)) {
        $error .= "Username and plant name are required. <br>";
    }

    // Additional validation can be added here

    if ($error == '') {
        // Prepare SQL statement to insert data
        $sql = "INSERT INTO plants (username, name, family, origin, age, soil_type, planted_at, watering_cycle, watering_times, growth_rate, height, spread, sun_requirements, notes) 
                VALUES (:username, :name, :family, :origin, :age, :soil_type, :planted_at, :watering_cycle, :watering_times, :growth_rate, :height, :spread, :sun_requirements, :notes)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':family', $family);
        $stmt->bindParam(':origin', $origin);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':soil_type', $soil_type);
        $stmt->bindParam(':planted_at', $planted_at);
        $stmt->bindParam(':watering_cycle', $watering_cycle);
        $stmt->bindParam(':watering_times', $watering_times, PDO::PARAM_INT);
        $stmt->bindParam(':growth_rate', $growth_rate);
        $stmt->bindParam(':height', $height, PDO::PARAM_STR);
        $stmt->bindParam(':spread', $spread, PDO::PARAM_STR);
        $stmt->bindParam(':sun_requirements', $sun_requirements);
        $stmt->bindParam(':notes', $notes);

        // Execute the query
        if ($stmt->execute()) {
            unset($_SESSION['plant_error_message']);
            // Redirect to a success page
            header("Location: addPlant.php");
            exit();
        } else {
            $error .= 'Error executing the query: ' . implode(", ", $stmt->errorInfo());
            $_SESSION['plant_error_message'] = $error;
        }
    } else {
        $_SESSION['plant_error_message'] = $error;
    }

    // Redirect back to the form with error messages
    header("Location: addPlant.php");
    exit();
}
?>
