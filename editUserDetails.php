<?php
include_once('conifg.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $avatar = $_FILES['avatar'];

    $userId = $userData['id']; // Assuming you have this from session or previous script

    // Validate inputs
    $errors = [];

    if (empty($newUsername)) {
        $errors[] = "Username is required.";
    }

    if (empty($newEmail) || !filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    // Process the avatar upload if a file was provided
    if ($avatar['error'] == UPLOAD_ERR_OK) {
        $maxFileSize = 9 * 1024 * 1024; // 9 MB
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if ($avatar['size'] > $maxFileSize) {
            $errors[] = "The file size exceeds the 9MB limit.";
        }

        if (!in_array($avatar['type'], $allowedTypes)) {
            $errors[] = "Only JPG, PNG, and GIF files are allowed.";
        }

        if (empty($errors)) {
            $uploadDir = 'uploads/avatars/';
            $avatarPath = $uploadDir . basename($avatar['name']);

            if (!move_uploaded_file($avatar['tmp_name'], $avatarPath)) {
                $errors[] = "Failed to upload the avatar.";
            }
        }
    } else {
        $avatarPath = null; // No new avatar uploaded, keep the existing one
    }

    if (empty($errors)) {
        // Update the user's details in the database
        $updateQuery = "UPDATE users SET username = ?, email = ?" . ($avatarPath ? ", avatar = ?" : "") . " WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);

        if ($avatarPath) {
            $stmt->bind_param("sssi", $newUsername, $newEmail, $avatarPath, $userId);
        } else {
            $stmt->bind_param("ssi", $newUsername, $newEmail, $userId);
        }

        if ($stmt->execute()) {
            echo "Details updated successfully.";
            // Optionally, redirect the user back to the profile page
            header('Location: myProfile.php');
            exit;
        } else {
            echo "Error updating details: " . $stmt->error;
        }
    } else {
        // Display errors if any
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
