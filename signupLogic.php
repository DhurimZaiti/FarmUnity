<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('config.php');
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Handle avatar upload
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatarTmpPath = $_FILES['avatar']['tmp_name'];
        $avatarName = $_FILES['avatar']['name'];
        $avatarSize = $_FILES['avatar']['size'];
        $avatarType = $_FILES['avatar']['type'];
        $avatarExtension = strtolower(pathinfo($avatarName, PATHINFO_EXTENSION));
        $validExtensions = array("jpg", "jpeg", "png", "gif");

        // Validate file extension
        if (in_array($avatarExtension, $validExtensions)) {
            // Define the destination path
            $uploadDir = 'uploads/';
            $avatarFilePath = $uploadDir . $username . '_' . uniqid() . '.' . $avatarExtension;

            // Move the uploaded file to the destination
            if (move_uploaded_file($avatarTmpPath, $avatarFilePath)) {
                try {
                    // Insert user data into the database
                    $sql = "INSERT INTO users (username, email, avatar, password) VALUES (:username, :email, :avatar, :password)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':avatar', $avatarFilePath);
                    $stmt->bindParam(':password', $hashedPassword);

                    if ($stmt->execute()) {
                        $_SESSION['signup_success'] = true;
                        echo "<script>
                                alert('Registration successful! You can now log in.');
                                window.location.href = 'login.php';
                              </script>";
                        exit();
                    } else {
                        echo "<script>alert('Error: Unable to register. Please try again.'); window.location.href = 'register.php';</script>";
                        exit();
                    }
                } catch (PDOException $e) {
                    echo "<script>alert('Database error: " . $e->getMessage() . "'); window.location.href = 'register.php';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Error uploading avatar. Please try again.'); window.location.href = 'register.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid file type for avatar. Only JPG, JPEG, PNG, and GIF are allowed.'); window.location.href = 'register.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Error: Avatar file is required.'); window.location.href = 'register.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'register.php';</script>";
    exit();
}
?>
