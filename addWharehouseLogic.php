<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', './AddWharehouse.php');
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $max_capacity = $_POST['max_capacity'];
    $description = $_POST['description'];


    $error = '';



    if ($error == '') {
        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO wharehouse (Name, max_capacity, description) 
                    VALUES (:Name, :max_capacity, :description)";
            $stmt = $conn->prepare($sql);

            // Bind parameters to the statement
            $stmt->bindParam(':Name', $Name);
            $stmt->bindParam(':max_capacity', $max_capacity);
            $stmt->bindParam(':description', $description);


            // Execute the statement
            if ($stmt->execute()) {
                unset($_SESSION['wharehouse_error_message']);
                $_SESSION['wharehouse_success'] = true;
                echo "<script>
                        alert('wharehouse added successfully!');
                        window.location.href = 'AddWharehouse.php';
                      </script>";
                exit();
            } else {
                $error .= 'Error executing the query.';
            }
        } catch (PDOException $e) {
            $error .= 'Database error: ' . $e->getMessage();
        }
    }

    $_SESSION['wharehouse_error_message'] = $error;
    header("Location: AddWharehouse.php");
    exit();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'AddWharehouse.php';</script>";
    exit();
} 
   