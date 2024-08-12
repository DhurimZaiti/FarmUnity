<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', './loginLogic.php');
session_start();

include_once('header.php');
include_once('config.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $error = '';

    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $e);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row !== false) {
            $_SESSION['farm_unity_userId'] = $row['userID'];
            // change page if the user is found
            header("Location: ");
            exit();
        } else {
            $error .= "Invalid email or password";
            $_SESSION['login_error_message'] = $error;
        }
    } else {
        $error .= "Error executing the query: " . implode(", ", $stmt->errorInfo());
        $_SESSION['login_error_message'] = $error;
    }
}

if (isset($_SESSION['login_error_message'])) {
    // change page if there is an error
    header("Location: ");
}
exit();