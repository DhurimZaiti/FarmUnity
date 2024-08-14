<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', './AddFeed.php');
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $type_of_feed = $_POST['type_of_feed'];
    $supplier = $_POST['supplier'];
    $imported_from = $_POST['imported_from'];
    $amount = $_POST['amount'];
    $expiry_date = $_POST['expiry_date'];
    $notes = $_POST['notes'];

    $error = '';

    // Validate required fields
    if (empty($username) || empty($type_of_feed) || empty($amount)) {
        $error .= "Username, type of feed, and amount are required fields. <br>";
    }

    // Additional validation can be added here if needed

    if ($error == '') {
        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO feed (username, type_of_feed, supplier, imported_from, amount, expiry_date, notes) 
                    VALUES (:username, :type_of_feed, :supplier, :imported_from, :amount, :expiry_date, :notes)";
            $stmt = $conn->prepare($sql);

            // Bind parameters to the statement
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':type_of_feed', $type_of_feed);
            $stmt->bindParam(':supplier', $supplier);
            $stmt->bindParam(':imported_from', $imported_from);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':expiry_date', $expiry_date);
            $stmt->bindParam(':notes', $notes);

            // Execute the statement
            if ($stmt->execute()) {
                unset($_SESSION['feed_error_message']);
                $_SESSION['feed_success'] = true;
                echo "<script>
                        alert('Feed added successfully!');
                        window.location.href = 'AddFeedForm.php';
                      </script>";
                exit();
            } else {
                $error .= 'Error executing the query.';
            }
        } catch (PDOException $e) {
            $error .= 'Database error: ' . $e->getMessage();
        }
    }

    $_SESSION['feed_error_message'] = $error;
    header("Location: AddFeedForm.php");
    exit();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'AddFeedForm.php';</script>";
    exit();
}