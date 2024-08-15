<?php
include_once 'config.php';
function getUsername($conn) {
    if (isset($_SESSION['farm_unity_userID'])) {
        $userId = $_SESSION['farm_unity_userID'];

        $sql = "SELECT username FROM users WHERE id = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['username'];
        } else {
            return null; // User not found
        }
    } else {
        return null; // No user ID in session
    }
}

// generate random userID
function generateAnimaID() {
    $characters = '0123456789';
    $userId = '';

    for ($i = 0; $i < 12; $i++) {
        $userId .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $userId;
}

if (isset($_POST['submit'])) {
    $username = getUsername($conn);
    $animal = $_POST['animal'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $animal_name = $_POST['animal_name'];
    $animal_id = generateAnimaID();
    $illness = isset($_POST['illness']) ? 1 : 0;
    $illness_type = $_POST['illness_type'];
    $vaccination_status = $_POST['vaccination_status'];
    $weight = $_POST['weight'];
    $illness_history = $_POST['illness_history'];
    $reproducing_status = $_POST['reproducing_status'];
    $notes = $_POST['notes'];

    $error = '';

    // Basic validation
    if (empty($username) || empty($animal) || empty($gender) || empty($age) || empty($animal_name) || empty($animal_id)) {
        $error .= "All fields are required <br>";
        $_SESSION['animal_error_message'] = $error;
    }

    // You may add more specific validations here if needed

    if ($error == '') {
        $sql = "INSERT INTO animals (username, animal, gender, age, animal_name, animal_id, illness, illness_type, vaccination_status, weight, illness_history, reproducing_status, notes) 
                VALUES (:username, :animal, :gender, :age, :animal_name, :animal_id, :illness, :illness_type, :vaccination_status, :weight, :illness_history, :reproducing_status, :notes)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':animal', $animal);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':animal_name', $animal_name);
        $stmt->bindParam(':animal_id', $animal_id);
        $stmt->bindParam(':illness', $illness);
        $stmt->bindParam(':illness_type', $illness_type);
        $stmt->bindParam(':vaccination_status', $vaccination_status);
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':illness_history', $illness_history);
        $stmt->bindParam(':reproducing_status', $reproducing_status);
        $stmt->bindParam(':notes', $notes);
        
        if ($stmt->execute()) {
            unset($_SESSION['animal_error_message']);
            // Redirect to a success page or the desired location
            header("Location: success.php");
            exit();
        } else {
            $error .= 'Error executing the query: ' . implode(", ", $stmt->errorInfo());
            $_SESSION['animal_error_message'] = $error;
        }
    }

    // Redirect if there is an error
    if (isset($_SESSION['animal_error_message'])) {
        header("Location: error.php");
        exit();
    }
}