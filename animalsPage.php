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

// Initialize the variables to avoid undefined variable warnings
$numberOfAnimals = 0;
$numberOfMaleAnimals = 0;
$numberOfFemaleAnimals = 0;

if ($animalData) {
    $numberOfAnimals = sizeof($animalData); // Get the total number of animals

    // Loop through each animal in the data
    foreach ($animalData as $animal) {
        // Ensure the gender comparison matches the data case ('Male'/'Female')
        if (isset($animal['gender']) && strtolower($animal['gender']) == 'male') {
            $numberOfMaleAnimals++; // Increment male animal count
        } elseif (isset($animal['gender']) && strtolower($animal['gender']) == 'female') {
            $numberOfFemaleAnimals++; // Increment female animal count
        }
    }
}
?>

                <div class="row mb-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Animals</h5>
                                <p class="card-text"><?php echo $numberOfAnimals; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Male</h5>
                                <p class="card-text"><?php echo $numberOfMaleAnimals; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Female</h5>
                                <p class="card-text"><?php echo $numberOfFemaleAnimals;  ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Animal / Add Group Buttons -->
                <div class="d-flex justify-content-end mb-4">
                    <a href="addAnimalPage.php" class="btn btn-primary mx-3">Add Animal</a>
                </div>

                <!-- Animals Section -->
                <h2>Animals</h2>
                <div class="list-group">
                    <table class="table table-striped border rounded">
                        <tbody>
                            <?php
                            foreach ($animalData as $animal) {
                                // Get the animal details from the array
                                $animalId = $animal['animal_id']; // Assuming animal_id is a unique identifier
                                $animalName = $animal['animal_name']; // Assuming animal_name is the name of the animal

                                // Generate the table row for each animal
                                echo '<tr>';
                                    echo '<td><a href="singleAnimal.php?animalId=' . htmlspecialchars($animalId) . '">' . ucfirst(htmlspecialchars($animal['animal'])) . '</a></td>';
                                    echo '<td class="text-end">';
                                        
                                            echo '<a href="addAnimalPage.php?animalId=' . $animalId . '" class="btn btn-outline-secondary btn-sm">Edit Animal</a>';
                                            echo '<a href="deleteData.php?table=animals&idQuery=animal_id&id=' . $animalId . '" class="btn btn-danger btn-sm ms-1">Delete Animal</a>';
                                       
                                    echo '</td>';
                                echo '</tr>';
                            }
                            ?>
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