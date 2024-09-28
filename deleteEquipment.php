<?php
// Include the PDO connection setup
include_once('config.php'); // Adjust the path as necessary

// Check if the required parameters are provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validate the ID
    if (empty($id)) {
        echo "Invalid ID.";
        exit;
    }

    // Handle multiple IDs if provided
    if (strpos($id, ',') !== false) {
        // Multiple IDs separated by commas
        $ids = explode(',', $id);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "DELETE FROM equipment WHERE id IN ($placeholders)";
    } else {
        // Single ID
        $sql = "DELETE FROM equipment WHERE id = ?";
    }

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        if (strpos($id, ',') !== false) {
            // Bind multiple IDs
            $stmt->execute($ids);
        } else {
            // Bind single ID
            $stmt->execute([$id]);
        }

        // Redirect to equipment list page after deletion
        header("Location: equipment.php");
        exit;

    } catch (PDOException $e) {
        // Handle exception
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID parameter is missing.";
}
