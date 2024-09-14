<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', './AddInvetory.php');
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $type = $_POST['type_name'];
    $variety = $_POST['variety'];
    $inventory_capacity = $_POST['inventory_capacity'];
    $inventory_unit = $_POST['inventory_unit'];
    $belonging_wharehouse = $_POST['belonging_wharehouse'];
    $alert = $_POST['alert'];
    $description = $_POST['description'];


    $error = '';



    if ($error == '') {
        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO inventory (name, type_name, variety, inventory_capacity, inventory_unit, belonging_wharehouse, alert, description) 
                    VALUES (:name, :type_name, :variety, :inventory_capacity, :inventory_unit, :belonging_wharehouse, :alert,  :description)";
            $stmt = $conn->prepare($sql);

            // Bind parameters to the statement
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':type_name', $type);
            $stmt->bindParam(':variety', $variety);
            $stmt->bindParam(':inventory_capacity', $inventory_capacity);
            $stmt->bindParam(':inventory_unit', $inventory_unit);
            $stmt->bindParam(':belonging_wharehouse', $belonging_wharehouse);
            $stmt->bindParam(':alert', $alert);
            $stmt->bindParam(':description', $description);


            // Execute the statement
            if ($stmt->execute()) {
                unset($_SESSION['inventory_error_message']);
                $_SESSION['inventory_success'] = true;
                echo "<script>
                        alert('inventory added successfully!');
                        window.location.href = 'AddInventory.php';
                      </script>";
                exit();
            } else {
                $error .= 'Error executing the query.';
            }
        } catch (PDOException $e) {
            $error .= 'Database error: ' . $e->getMessage();
        }
    }

    $_SESSION['inventory_error_message'] = $error;
    header("Location: AddInventory.php");
    exit();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'AddInventory.php';</script>";
    exit();
}