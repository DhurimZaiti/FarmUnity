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
                                alert('Please add your farm in the next page.');
                                window.location.href = 'registerFarm.php';
                              </script>";
                        exit();
                    } else {
                        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Error: Unable to register. Please try again.'];
                        header('Location: register.php');
                        exit();
                    }
                } catch (PDOException $e) {
                    $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Database error: ' . $e->getMessage()];
                    header('Location: register.php');
                    exit();
                }
            } else {
                $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Error uploading avatar. Please try again.'];
                header('Location: register.php');
                exit();
            }
        } else {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Invalid file type for avatar. Only JPG, JPEG, PNG, and GIF are allowed.'];
            header('Location: register.php');
            exit();
        }
    } else {
        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Error: Avatar file is required.'];
        header('Location: register.php');
        exit();
    }
} else {
    $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Invalid request.'];
    header('Location: register.php');
    exit();
}
?>
