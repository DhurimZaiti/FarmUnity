<?php
include_once('header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

unset($_SESSION['warehouses_data']);

// Assuming you already have a PDO connection in $pdo
// and $userData['username'] contains the username of the logged-in user

$user = $userData['username'];
$warehousesData = [];

try {
    // Prepare the SQL statement to fetch all warehouses
    $stmt = $conn->prepare("SELECT id, Name, max_capacity, description FROM warehouses");

    // Execute the statement
    $stmt->execute();

    // Fetch all results into an associative array
    $warehousesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle exception
    echo "Error: " . $e->getMessage();
}

// Initialize the variables to avoid undefined variable warnings
$numberOfwarehouses = sizeof($warehousesData);
?>

<body>
    <div class="contents">
        <div class="container">
            <div class="content ms-3">
                <div class="row mb-4">
                    <div class="d-flex justify-content-end mb-4">
                        <div class="dropdown me-3">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Most Recent
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sortingDropdown">
                                <li><a class="dropdown-item" href="#" onclick="changeSorting('Most Recent')">Most Recent</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeSorting('By Location')">By Location</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeSorting('By Type')">By Type</a></li>
                            </ul>
                        </div>
                        <a href="addWarehouse.php" class="btn btn-primary mx-3">Add Warehouse</a>
                    </div>

                    <!-- Warehouses Section -->
                    <h2>Warehouses</h2>
                    <div class="list-group">
                        <table class="table table-striped border rounded">
                            <thead>
                                <tr>
                                    <th>Warehouse Name</th>
                                    <th>Max Capacity</th>
                                    <th>Description</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($numberOfwarehouses > 0): ?>
                                    <?php foreach ($warehousesData as $warehouse): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($warehouse['Name']); ?></td>
                                            <td><?php echo htmlspecialchars($warehouse['max_capacity']); ?></td>
                                            <td><?php echo htmlspecialchars($warehouse['description']); ?></td>
                                            <td class="text-end">
                                                <a href="editWarehouse.php?id=<?php echo $warehouse['id']; ?>" class="btn btn-outline-secondary btn-sm">Edit Warehouse</a>
                                                <a href="deleteWarehouse.php?id=<?php echo $warehouse['id']; ?>" class="btn btn-danger btn-sm ms-1">Delete Warehouse</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No warehouses found. Add one now!</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeSorting(selectedOption) {
            document.getElementById('sortingDropdown').innerText = selectedOption;
        }
    </script>
</body>
