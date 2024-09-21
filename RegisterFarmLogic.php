<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// include_once('config.php');
// session_start();

// if (isset($_POST['submit'])) {
//     echo "here 1";
//     $farmManager = $_SESSION['farm_unity_user'];
//     $farmName = $_POST['farmName'];
//     $country = $_POST['country'];
//     $address = $_POST['address'];
//     $city = $_POST['city'];
//     $province = $_POST['province'];
//     $postalCode = $_POST['postal-code'];
//     $timezone = "UTC +01:00";
//     $farm_coordinates =  isset($_POST['farmCoordinates']) ? $_POST['farmCoordinates']  : null;
//     $currency = $_POST['currency'];

//     // Validate form data
//     if (empty($farmName) || empty($country) || empty($address) || empty($city) || empty($province) || empty($postalCode) || empty($currency)) {
//         $_SESSION['register_error_message'] = "All fields are required.";
//         echo $_SESSION['register_error_message'];
//         echo "here 2";
//         header("Location: registerFarm.php");
//         exit();
//     }

//     $sql = "INSERT INTO farm (farmManager, farmName, country, address, city, province, postalCode, timezone, farm_coordinates, currency) VALUES (:farmManager, :farmName, :country, :address, :city, :province, :postalCode, :timezone, :farm_coordinates, :currency)";
//     $stmt = $conn->prepare($sql);

//     $stmt->bindParam(':farmManager', $farmManager);
//     $stmt->bindParam(':farmName', $farmName);
//     $stmt->bindParam(':country', $country);
//     $stmt->bindParam(':address', $address);
//     $stmt->bindParam(':city', $city);
//     $stmt->bindParam(':province', $province);
//     $stmt->bindParam(':postalCode', $postalCode);
//     $stmt->bindParam(':timezone', $timezone);
//     $stmt->bindParam(':farm_coordinates', $farm_coordinates);
//     $stmt->bindParam(':currency', $currency);


//     try {
//         echo "here 3";
//         $stmt->execute();
//         header("Location: home.php");    
//         exit();
//     } catch (PDOException $e) {
//         echo "here 4";
//         $_SESSION['register_error_message'] = "Error: " . $e->getMessage();
//         echo $_SESSION['register_error_message'];
//         header("Location: registerFarm.php");    
//         exit();
//     }
// } else {
//     echo "here 5";
//     $_SESSION['register_error_message'] = "Invalid request.";
//     echo $_SESSION['register_error_message'];
//     header("Location: registerFarm.php");    
//     exit();
// }

session_start();
include_once('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $farmManager = $_SESSION['farm_unity_user'];
    $farmName = $_POST['farmName'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postalCode'];
    $timezone = "UTC +01:00";  // Static for now
    $farm_coordinates = isset($_POST['farmCoordinates']) ? $_POST['farmCoordinates'] : null;
    $currency = $_POST['currency'];

    // Check if the request is an update
    $request = isset($_GET['req']) ? $_GET['req'] : "";

    if ($request != 'update') {
        // Insert a new farm record
        $sql = "INSERT INTO farm (farmManager, farmName, country, address, city, province, postalCode, timezone, farm_coordinates, currency) 
                VALUES (:farmManager, :farmName, :country, :address, :city, :province, :postalCode, :timezone, :farm_coordinates, :currency)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':farmManager', $farmManager);
        $stmt->bindParam(':farmName', $farmName);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':postalCode', $postalCode);
        $stmt->bindParam(':timezone', $timezone);
        $stmt->bindParam(':farm_coordinates', $farm_coordinates);
        $stmt->bindParam(':currency', $currency);

        $stmt->execute();
        header("Location: home.php");
        exit();
    } else {
        // Update an existing farm record
        $farmId = $_GET['farmId'];  // Assuming farmId is passed via GET for updates
        $sql = "UPDATE farm 
                SET farmManager = :farmManager, farmName = :farmName, country = :country, address = :address, city = :city, 
                    province = :province, postalCode = :postalCode, timezone = :timezone, farm_coordinates = :farm_coordinates, 
                    currency = :currency
                WHERE id = :farmId";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':farmManager', $farmManager);
        $stmt->bindParam(':farmName', $farmName);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':postalCode', $postalCode);
        $stmt->bindParam(':timezone', $timezone);
        $stmt->bindParam(':farm_coordinates', $farm_coordinates);
        $stmt->bindParam(':currency', $currency);
        $stmt->bindParam(':farmId', $farmId);

        $stmt->execute();
        header("Location: home.php");
        exit();
    }
} else {
    header("Location: registerFarm.php");
    exit();
}
