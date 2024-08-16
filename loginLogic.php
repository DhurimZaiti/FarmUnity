<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('config.php');
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['farm_unity_userId'] = $user['id'];
            $_SESSION['farm_unity_username'] = $user['username'];
            $_SESSION['farm_unity_user_email'] = $user['email'];

            header("Location: testpage.php");
            exit();
        } else {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Invalid email or password.'];
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Error executing the query: ' . implode(", ", $stmt->errorInfo())];
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Invalid request.'];
    header("Location: login.php");
    exit();
}
?>
