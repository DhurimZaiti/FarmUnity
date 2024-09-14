<?php
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $fieldId = $_POST['fieldId'];
    $fieldName = $_POST['fieldName'];

    if (empty($fieldName)) {
        $_SESSION['farm_unity_edit_field_error'] = 'Field name cannot be empty.';
        header('Location: farmMap.php');
        exit();
    }

    $sql = "UPDATE fields SET field_name = :fieldName WHERE fieldId = :fieldId";
    $stmt = $conn->prepare($sql);

    $stmt->execute([':fieldName' => $fieldName, ':fieldId' => $fieldId]);

    header('Location: farmMap.php');
    exit();
}
