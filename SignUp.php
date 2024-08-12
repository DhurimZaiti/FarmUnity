<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
session_start();
// include_once('config.php');

function getUsernames($conn, $username) {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        return false;
    } else {
        return true;
    }
}

function getEmail($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        return false;
    } else {
        return true;
    }
}

// generate random userID
// function generateUserId() {
//     $characters = '0123456789';
//     $userId = '';

//     for ($i = 0; $i < 12; $i++) {
//         $userId .= $characters[rand(0, strlen($characters) - 1)];
//     }

//     return $userId;
// }


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    date_default_timezone_set('Europe/Skopje');
    $created_at = date('m/d/Y H:i ', time());

    $error = '';

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error .= "All fields are required <br>";
        $_SESSION['signup_error_message'] = $error;
    }

    if ($password != $confirm_password) {
        $error .= 'The passwords you entered do not match <br>';
        $_SESSION['signup_error_message'] = $error;
    }

    if (!(getUsernames($conn, $username))) {
        $error .= 'Username is already taken <br>';
        $_SESSION['signup_error_message'] = $error;
    }

    if (!(getEmail($conn, $email))) {
        $error .= 'This email address is already associated with an existing account. Please use a different email address. <br>';
        $_SESSION['signup_error_message'] = $error;
    }

    if ($error == '') {
        $sql = "INSERT INTO users (username, email, avatar, password) VALUES (:username, :email, :avatar, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':password', $password);
        
        if ($stmt->execute()) {
            unset($_SESSION['signup_error_message']);
            $_SESSION['farm_unity_userId'] = $userId;
            // change page if there is no error
            header("Location: ");
            exit();
        } else {
            $error .= 'Error executing the query: ' . implode(", ", $stmt->errorInfo());
            $_SESSION['signup_error_message'] = $error;
        }
    }

    // change page if there is an error
    if (isset($_SESSION['signup_error_message'])) {
        // change page if there is an error
        header("Location: ");
    }
    exit();
}