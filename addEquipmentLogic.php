<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', './AddEquipment.php');
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $brand_model = $_POST['brand_model'];
    $model_year = $_POST['model_year'];
    $plate_number = $_POST['plate_number'];
    $serial_number = $_POST['serial_number'];
    $distance = $_POST['distance'];
    $registration_date = $_POST['registration_date'];
    $registration_expiration = $_POST['registration_expiration'];
    $description = $_POST['description'];


    $error = '';



    if ($error == '') {
        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO equipment (name, type, brand_model, model_year, plate_number, serial_number, distance, registration_date, registration_expiration, description) 
                    VALUES (:name, :type, :brand_model, :model_year, :plate_number, :serial_number, :distance, :registration_date, :registration_expiration, :description)";
            $stmt = $conn->prepare($sql);

            // Bind parameters to the statement
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':brand_model', $brand_model);
            $stmt->bindParam(':model_year', $model_year);
            $stmt->bindParam(':plate_number', $plate_number);
            $stmt->bindParam(':serial_number', $serial_number);
            $stmt->bindParam(':distance', $distance);
            $stmt->bindParam(':registration_date', $registration_date);
            $stmt->bindParam(':registration_expiration', $registration_expiration);
            $stmt->bindParam(':description', $description);


            // Execute the statement
            if ($stmt->execute()) {
                unset($_SESSION['equipment_error_message']);
                $_SESSION['equipment_success'] = true;
                echo "<script>
                        alert('equipment added successfully!');
                        window.location.href = 'AddEquipment.php';
                      </script>";
                exit();
            } else {
                $error .= 'Error executing the query.';
            }
        } catch (PDOException $e) {
            $error .= 'Database error: ' . $e->getMessage();
        }
    }

    $_SESSION['equipment_error_message'] = $error;
    header("Location: AddEquipment.php");
    exit();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'AddEquipment.php';</script>";
    exit();
}