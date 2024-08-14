<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Feed</title>
</head>
<body>
    <h2>Add New Feed</h2>

    <?php
    // Display error message if it exists
    if (isset($_SESSION['feed_error_message'])) {
        echo '<div style="color: red;">' . $_SESSION['feed_error_message'] . '</div>';
        unset($_SESSION['feed_error_message']); // Clear the error message after displaying
    }

    // Display success message if it exists
    if (isset($_SESSION['feed_success'])) {
        echo '<div style="color: green;">Feed added successfully!</div>';
        unset($_SESSION['feed_success']); // Clear the success message after displaying
    }
    ?>

    <form action="AddFeed.php" method="POST">
        <label for="username">Username (from users table):</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="type_of_feed">Type of Feed:</label><br>
        <input type="text" id="type_of_feed" name="type_of_feed" required><br><br>

        <label for="supplier">Supplier:</label><br>
        <input type="text" id="supplier" name="supplier"><br><br>

        <label for="imported_from">Imported From:</label><br>
        <input type="text" id="imported_from" name="imported_from"><br><br>

        <label for="amount">Amount (in kg):</label><br>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>

        <label for="expiry_date">Expiry Date:</label><br>
        <input type="date" id="expiry_date" name="expiry_date"><br><br>

        <label for="notes">Notes:</label><br>
        <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br><br>

        <input type="submit" name="submit" value="Add F
