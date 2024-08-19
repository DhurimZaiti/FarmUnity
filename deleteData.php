<?php
// Include the PDO connection setup
include_once('config.php'); // Adjust the path as necessary

// Check if required parameters are provided
if (isset($_GET['table']) && isset($_GET['id']) && isset($_GET['idQuery'])) {
    $table = $_GET['table'];
    $idQuery = $_GET['idQuery'];
    $id = $_GET['id'];

    // Validate table name and ID
    $allowedTables = ['animals', 'plants']; // Add other table names as needed
    if (!in_array($table, $allowedTables) || empty($id)) {
        echo "Invalid table name or ID.";
        exit;
    }

    // Handle multiple IDs
    if (strpos($id, ',') !== false) {
        // Multiple IDs separated by commas
        $ids = explode(',', $id);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "DELETE FROM $table WHERE $idQuery IN ($placeholders)";
    } else {
        // Single ID
        $sql = "DELETE FROM $table WHERE $idQuery = ?";
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


        header("Location: animalsPage.php");
        echo "Record(s) deleted successfully.";
    } catch (PDOException $e) {
        // Handle exception
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Table name or ID parameter is missing.";
}