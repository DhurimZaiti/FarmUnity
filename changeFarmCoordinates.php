<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('config.php');
session_start();

if (isset($_POST['farmCoordinates'])) {
    $farmCoordinates = $_POST['farmCoordinates'];
    $user = $_SESSION['farm_unity_user'];

    // Prepare the SQL statement
    $sql = "UPDATE farm SET farm_coordinates = :farmCoordinates WHERE farmManager = :farmManager";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':farmCoordinates', $farmCoordinates, PDO::PARAM_STR);
    $stmt->bindParam(':farmManager', $user, PDO::PARAM_STR);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['update_farm_true'] = "Farm coordinates updated successfully.";
        header("Location: settings.php");
    } else {
        $_SESSION['update_map_error'] = "Error updating farm coordinates.";
        header("Location: settings.php");
    }
}
