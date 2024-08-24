<?php
include_once('header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

unset($_SESSION['animal_data']);

// Assuming you already have a PDO connection in $pdo
// and $userData['username'] contains the username of the logged-in user

$user = $userData['username'];
$animalData = [];

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT animal, gender, age, animal_name, animal_id, illness, illness_type, vaccination_status, weight, illness_history, reproducing_status, notes FROM animals WHERE username = :username");

    // Bind the username parameter
    $stmt->bindParam(':username', $user);

    // Execute the statement
    $stmt->execute();

    // Fetch all results into an associative array
    $animalData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle exception
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Livestock</title>
    <style>
        /* Apply to all table cells */
        td,
        th {
            word-wrap: break-word;
            /* Ensure long words break and wrap */
            overflow-wrap: break-word;
            /* Support wrapping in modern browsers */
            white-space: normal;
            /* Ensure text wraps normally, not on a single line */
            max-width: 150px;
            /* Optional: limit the width of cells to avoid excessive width */
        }
    </style>
</head>

<body>
    <div class="contents">
        <div class="container">
            <div class="content ms-3">
                <h2 class="mb-3">Your Livestock</h2>

                <a class="btn btn-outline-success mb-4" href="addAnimalPage.php">Add Animal</a>

                <div class="table-responsive">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Animal</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Animal Name</th>
                                <th scope="col">Illness</th>
                                <th scope="col">Illness History</th>
                                <th scope="col">Vaccination</th>
                                <th scope="col">Reproducing Status</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($animalData)) : ?>
                                <?php foreach ($animalData as $animal) : ?>
                                    <tr>
                                        <th scope="row"><?php echo htmlspecialchars($animal['animal']); ?></th>
                                        <td><?php echo htmlspecialchars($animal['gender']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['age']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['weight']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['animal_name']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['illness_type']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['illness_history']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['vaccination_status']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['reproducing_status']); ?></td>
                                        <td><?php echo htmlspecialchars($animal['notes']); ?></td>
                                        <td>
                                            <a href="addAnimalPage.php?animalId=<?php echo urlencode($animal['animal_id']); ?>&reqQuery=update" class="btn btn-warning btn-sm">Update</a>
                                        </td>
                                        <td>
                                            <a href="deleteData.php?table=animals&idQuery=animal_id&id=<?php echo urlencode($animal['animal_id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="12">No animals found for this user.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
<?php
include_once('footer.php');
?>