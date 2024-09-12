<?php
// Include the PDO connection setup
include_once('config.php'); // Ensure this file contains your database connection settings
header('Content-Type: application/json');

$response = array();

if (isset($_GET['fieldId'])) {
    $fieldId = $_GET['fieldId'];

    // Validate the fieldId
    if (empty($fieldId)) {
        $response['success'] = false;
        $response['message'] = "Field ID is missing or empty.";
        echo json_encode($response);
        exit;
    }

    try {
        // Prepare the SQL statement
        $sql = "DELETE FROM fields WHERE fieldId = ?";
        $stmt = $conn->prepare($sql);

        // Execute the statement with the provided fieldId
        $stmt->execute([$fieldId]);

        if ($stmt->rowCount() > 0) {
            $response['success'] = true;
            $response['message'] = "Record deleted successfully.";
        } else {
            $response['success'] = false;
            $response['message'] = "No record found with the provided field ID.";
        }
        echo json_encode($response);

    } catch (PDOException $e) {
        // Handle exception
        $response['success'] = false;
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
} else {
    $response['success'] = false;
    $response['message'] = "Field ID parameter is missing.";
    echo json_encode($response);
}


// if (isset($_GET['fieldId'])) {
//     $fieldId = $_GET['fieldId'];

//     try {
//         // Prepare the SQL statement
//         $sql = "DELETE FROM fields WHERE fieldId = ?";
//         $stmt = $conn->prepare($sql);

//         // Execute the statement with the provided fieldId
//         $stmt->execute([$fieldId]);

//         // Check if any rows were affected
//         if ($stmt->rowCount() > 0) {
//             echo "Record deleted successfully.";
//         } else {
//             echo "No record found with the provided field ID.";
//         }

//         // Optionally, you can redirect the user back to a page
//         // header("Location: fieldsPage.php"); // Replace 'fieldsPage.php' with your actual page
//     } catch (PDOException $e) {
//         // Handle exception
//         echo "Error: " . $e->getMessage();
//     }
// } else {
//     echo "Field ID parameter is missing.";
// }