<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('config.php');
session_start();

function checkUsernameExists($conn, $username) {
    $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    // If the count is greater than 0, it means the username already exists
    return $count > 0;
}

function checkEmailExists($conn, $email) {
    $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    // If the count is greater than 0, it means the email already exists
    return $count > 0;
}

if (isset($_POST['submit'])) {
    // Store form data in session
    $_SESSION['signup_data'] = $_POST;

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0; // If you have an admin field in the form
    $avatar = null;

    // Validate required fields
    $error = '';
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error .= "All fields are required.<br>";
    }

    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        $error .= "Passwords do not match.<br>";
    }

    if(strlen($password) < 8){
        $error .= "Passwords must be longer than 8 characters.<br>";
    }

    // Check if username or email already exists
    try {
        $usernameIsTaken = checkUsernameExists($conn, $username);
        $emailIsTaken = checkEmailExists($conn, $email);

        if ($usernameIsTaken) {
            $error .= "Username is already taken.<br>";
        }

        if ($emailIsTaken) {
            $error .= "Email is already taken.<br>";
        }
    } catch (PDOException $e) {
        $error .= "Database error: " . $e->getMessage() . "<br>";
    }

    // Handle avatar upload if file is provided
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatarTmpPath = $_FILES['avatar']['tmp_name'];
        $avatarName = $_FILES['avatar']['name'];
        $avatarExtension = strtolower(pathinfo($avatarName, PATHINFO_EXTENSION));
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($avatarExtension, $validExtensions)) {
            $uploadDir = 'uploads/';
            $avatarFilePath = $uploadDir . $username . '_' . uniqid() . '.' . $avatarExtension;

            if (!move_uploaded_file($avatarTmpPath, $avatarFilePath)) {
                $error .= "Error uploading avatar.<br>";
            } else {
                $avatar = $avatarFilePath;
            }
        } else {
            $error .= "Invalid file type for avatar. Only JPG, JPEG, PNG, and GIF are allowed.<br>";
        }
    }

    if (empty($error)) {
        try {
            // Hash the password before storing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL statement to insert the new user
            $sql = "INSERT INTO users (username, email, avatar, password, is_admin) 
                    VALUES (:username, :email, :avatar, :password, :is_admin)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':is_admin', $is_admin);

            if ($stmt->execute()) {
                // Clear session data on successful registration
                unset($_SESSION['signup_data']);
                $_SESSION['farm_unity_user'] = $username;
                unset($_SESSION['signup_error_message']);
                header('Location: home.php');
                exit();
            } else {
                $error .= "Error executing the query.";
            }
        } catch (PDOException $e) {
            $error .= "Database error: " . $e->getMessage();
        }
    }

    $_SESSION['signup_error_message'] = $error;
    header("Location: signup.php");
    exit();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'signup.php';</script>";
    exit();
}
