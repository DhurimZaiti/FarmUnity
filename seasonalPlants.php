<?php
include 'config.php';

// Handle deletion of a plant
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $delete_query = "DELETE FROM seasonal_plants WHERE id = :id";
    $stmt = $conn->prepare($delete_query);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        // Redirect to the same page to refresh data
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->errorInfo()[2] . "</div>";
    }
}

// Fetch all seasonal plants from the database
$query = "SELECT * FROM seasonal_plants";
$stmt = $conn->prepare($query);
$stmt->execute();
$plants = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null; // Release the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seasonal Plants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
        }
        
        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">Seasonal Plants</h2>
    
    <div class="mb-4">
        <a href="addSeasonal_plants.php" class="btn btn-custom">Add New Seasonal Plant</a>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Season</th>
                <th>Watering Cycle</th>
                <th>Watering Times</th>
                <th>Soil Type</th>
                <th>Planted At</th>
                <th>Growth Rate</th>
                <th>Height</th>
                <th>Spread</th>
                <th>Sun Requirements</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($plants as $plant): ?>
            <tr>
                <td><?php echo htmlspecialchars($plant['id']); ?></td>
                <td><?php echo htmlspecialchars($plant['username']); ?></td>
                <td><?php echo htmlspecialchars($plant['name']); ?></td>
                <td><?php echo htmlspecialchars($plant['season']); ?></td>
                <td><?php echo htmlspecialchars($plant['watering_cycle']); ?></td>
                <td><?php echo htmlspecialchars($plant['watering_times']); ?></td>
                <td><?php echo htmlspecialchars($plant['soil_type']); ?></td>
                <td><?php echo htmlspecialchars($plant['planted_at']); ?></td>
                <td><?php echo htmlspecialchars($plant['growth_rate']); ?></td>
                <td><?php echo htmlspecialchars($plant['height']); ?></td>
                <td><?php echo htmlspecialchars($plant['spread']); ?></td>
                <td><?php echo htmlspecialchars($plant['sun_requirements']); ?></td>
                <td>
                    <a href="editSeasonal_plant.php?id=<?php echo $plant['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="?delete=<?php echo $plant['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this plant?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
