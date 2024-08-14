<?php
session_start();
// include_once('./config.php');
// include_once 'config.php';

// function getUsername($conn) {
//     if (isset($_SESSION['farm_unity_user'])) {
//         $userId = $_SESSION['farm_unity_user'];

//         $sql = "SELECT username FROM users WHERE id = :userId";
//         $stmt = $conn->prepare($sql);
//         $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
//         $stmt->execute();

//         $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         if ($result) {
//             return $result['username'];
//         } else {
//             return null; // User not found
//         }
//     } else {
//         return null; // No user ID in session
//     }
// }

// // generate random animal id
// function generateAnimaID() {
//     $characters = '0123456789';
//     $userId = '';

//     for ($i = 0; $i < 12; $i++) {
//         $userId .= $characters[rand(0, strlen($characters) - 1)];
//     }

//     return $userId;
// }

// if (isset($_POST['submit'])) {
//     echo "here 1";
//     $username = getUsername($conn);
//     $animal = $_POST['animal'];
//     $gender = $_POST['gender'];
//     $age = $_POST['age'];
//     $animal_name = $_POST['animal_name'];
//     $animal_id = generateAnimaID();
//     $illness = isset($_POST['illness']) ? 1 : 0;
//     $illness_type = $_POST['illness_type'];
//     $vaccination_status = $_POST['vaccination_status'];
//     $weight = $_POST['weight'];
//     $illness_history = $_POST['illness_history'];
//     $reproducing_status = $_POST['reproducing_status'];
//     $notes = $_POST['notes'];

//     $error = '';

//     // Basic validation
//     if (empty($animal) || empty($gender) || empty($age) || empty($animal_name)){
//         $error .= "All fields are required <br>";
//         $_SESSION['animal_error_message'] = $error;
//     }

//     // You may add more specific validations here if needed

//     if ($error == '') {
//         echo "here 2";
//         $sql = "INSERT INTO animals (username, animal, gender, age, animal_name, animal_id, illness, illness_type, vaccination_status, weight, illness_history, reproducing_status, notes) 
//                 VALUES (:username, :animal, :gender, :age, :animal_name, :animal_id, :illness, :illness_type, :vaccination_status, :weight, :illness_history, :reproducing_status, :notes)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bindParam(':username', $username);
//         $stmt->bindParam(':animal', $animal);
//         $stmt->bindParam(':gender', $gender);
//         $stmt->bindParam(':age', $age);
//         $stmt->bindParam(':animal_name', $animal_name);
//         $stmt->bindParam(':animal_id', $animal_id);
//         $stmt->bindParam(':illness', $illness);
//         $stmt->bindParam(':illness_type', $illness_type);
//         $stmt->bindParam(':vaccination_status', $vaccination_status);
//         $stmt->bindParam(':weight', $weight);
//         $stmt->bindParam(':illness_history', $illness_history);
//         $stmt->bindParam(':reproducing_status', $reproducing_status);
//         $stmt->bindParam(':notes', $notes);

//         if ($stmt->execute()) {
//             echo "here 3";
//             unset($_SESSION['animal_error_message']);
//             // Redirect to a success page or the desired location
//             // header("Location: success.php");
//             exit();
//         } else {
//             echo "here 4";
//             $error .= 'Error executing the query: ' . implode(", ", $stmt->errorInfo());
//             $_SESSION['animal_error_message'] = $error;
//         }
//     }

//     // Redirect if there is an error
//     if (isset($_SESSION['animal_error_message'])) {
//         echo "here 5";
//         // header("Location: error.php");
//         exit();
//     }
// }
include_once('./config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

function generateAnimalID()
{
    $characters = '0123456789';
    $animalId = '';

    for ($i = 0; $i < 12; $i++) {
        $animalId .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $animalId;
}

if (isset($_POST['submit'])) {
    $_SESSION['animal_data'] = $_POST;

    $username = $_SESSION['farm_unity_user'];
    $animal = $_POST['animal'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $animal_name = $_POST['animal_name'];
    $animal_id = generateAnimalID();
    $illness = isset($_POST['illness']) ? 1 : 0;
    $illness_type = $_POST['illness_type'] == '' ? 'No illness.' : $_POST['illness_type'];
    $vaccination_status = $_POST['vaccination_status'];
    $weight = $_POST['weight'];
    $illness_history = $_POST['illness_history'] == '' ? 'No illness history.' : $_POST['illness_history'];
    $reproducing_status = $_POST['reproducing_status'];
    $notes = $_POST['notes'];

    $error = '';

    // Basic validation
    if (empty($animal)) {
        $error .= "Animal is required <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    if (empty($gender)) {
        $error .= "Gender is required <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    if (empty($age)) {
        $error .= "Age is required <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    if (empty($animal_name)) {
        $error .= "Animal Name is required <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    if (empty($vaccination_status)) {
        $error .= "Vaccination Status is required <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    if(empty($weight)){
        $error .= "Weight is required <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    if(empty($reproducing_status)){
        $error .= "Reproducing status is required <br>";
        $_SESSION['animal_error_message'] = $error;
    }

    // Additional specific validations
    if (!in_array($gender, ['Male', 'Female'])) {
        $error .= "Invalid gender <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    if (!empty($weight) && $weight <= 0) {
        $error .= "Weight must be positive <br>";
        $_SESSION['animal_error_message'] = $error;
    }
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo $error;

    if ($error == '') {
        echo "here 2<br>";
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

        echo "here 2.5 <br>";

        if ($stmt->execute()) {
            echo "here 3 <br>";
            unset($_SESSION['animal_error_message']);
            // Redirect to a success page or the desired location
            header("Location: success.php");
            exit();
        } else {
            echo "here 4 <br>";
            echo "test<br>";
            $error .= 'Error executing the query: ' . implode(", ", $stmt->errorInfo());
            $_SESSION['animal_error_message'] = $error;
            echo "Debug info: " . implode(", ", $stmt->errorInfo()) . "<br>";
        }
    }

    // Redirect if there is an error
    if (isset($_SESSION['animal_error_message'])) {
        echo "here 5<br>";
        header("Location: testAddAnima.php");
        exit();
    }
}
