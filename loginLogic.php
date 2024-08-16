<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('config.php');
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);

    if ($stmt->execute()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['farm_unity_user'] = $user['username'];
            header("Location: testpage.php");
            exit();
        } else {
            echo "here 4";
            $_SESSION['login_error_message'] = "Invalid username or password.";
            header("Location: login.php");
            exit();
        }
    } else {
        echo "here 5";
        $_SESSION['login_error_message'] = "Error executing the query: " . implode(", ", $stmt->errorInfo());
        header("Location: login.php");
        exit();
    }
} else {
    // echo "here 6";
    $_SESSION['login_error_message'] = "Invalid request.";
    header("Location: login.php");
    exit();
}