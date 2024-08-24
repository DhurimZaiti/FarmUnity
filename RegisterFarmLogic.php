<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('config.php');
session_start();

if (isset($_POST['submit'])) {
    // Retrieve form data
    $farmManager = $_SESSION['farm_unity_user'];
    $farmName = $_POST['farmName'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postal-code'];
    $timezone = "UTC +01:00";
    $farm_coordinates = $_POST['farmCoordinates'];
    $currency = $_POST['currency'];

    // Validate form data
    if (empty($farmName) || empty($country) || empty($address) || empty($city) || empty($province) || empty($postalCode) || empty($currency)) {
        $_SESSION['register_error_message'] = "All fields are required.";
        // header("Location: registerFarm.php");
        exit();
    }

    // Prepare SQL statement
    $sql = "INSERT INTO farm (farmManager, farmName, country, address, city, province, postalCode, timezone, farm_coordinates, currency) VALUES (:farmManager, :farmName, :country, :address, :city, :province, :postalCode, :timezone, :farm_coordinates, :currency)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':farmManager', $farmManager);
    $stmt->bindParam(':farmName', $farmName);
    $stmt->bindParam(':farmName', $farmName);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':postalCode', $postalCode);
    $stmt->bindParam(':timezone', $timezone);
    $stmt->bindParam(':farm_coordinates', $farm_coordinates);
    $stmt->bindParam(':currency', $currency);

    // Execute the statement
    try {
        $stmt->execute();
        header("Location: home.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['register_error_message'] = "Error: " . $e->getMessage();
        header("Location: registerFarm.php");
        exit();
    }
} else {
    $_SESSION['register_error_message'] = "Invalid request.";
    header("Location: registerFarm.php");
    exit();
}