<?php
header('Content-Type: application/json');
session_start();
include_once('config.php');

function generateRandom12DigitNumber()
{
    return random_int(100000000000, 999999999999); // Adjusted for 12 digits
}

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if ($data === null) {
        throw new Exception('Invalid JSON received.');
    }

    $fieldId = generateRandom12DigitNumber();
    $farm_manager = $_SESSION['farm_unity_user'];
    $field_name = $data['name'];
    $coordinates = json_encode($data['coordinates']);
    $fieldSize = $data['areaSize'];

    if (empty($field_name) || empty($coordinates)) {
        throw new Exception('Name or coordinates are missing.');
    }

    $sql = "INSERT INTO fields (fieldId, farm_manager, field_name, coordinates, fieldSize) VALUES (:fieldId, :farm_manager, :field_name, :coordinates, :fieldSize)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fieldId', $fieldId);
    $stmt->bindParam(':farm_manager', $farm_manager);
    $stmt->bindParam(':field_name', $field_name);
    $stmt->bindParam(':coordinates', $coordinates);
    $stmt->bindParam(':fieldSize', $fieldSize);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Polygon saved successfully']);
    } else {
        throw new Exception('Failed to save polygon.');
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
