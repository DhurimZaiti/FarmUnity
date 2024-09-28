<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('header.php');

// Check if 'equipmentId' is set in the URL parameters
if (isset($_GET['equipmentId'])) {
    // Get the equipment ID from the URL
    $equipmentId = $_GET['equipmentId'];

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM equipments WHERE equipment_id = :equipment_id");

        // Bind the equipment_id parameter
        $stmt->bindParam(':equipment_id', $equipmentId, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Fetch the data
        $equipmentData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if any data was retrieved
        if ($equipmentData) {
            // Output or process the data as needed
            $_SESSION['equipment_data'] = $equipmentData;
        } else {
            echo "No equipment found with the provided ID.";
        }
    } catch (PDOException $e) {
        // Handle any errors
        echo "Error: " . $e->getMessage();
    }
}
?>
<div class="content">
    <div class="container mt-5">
        <div class="contents">
            <div class="row mb-5">
                <div class="col-md-8 offset-md-2">
                    <div class="card border border-2 border-primary bg-body shadow-lg rounded px-3">
                        <div class="card-body">
                            <h1 class="card-title text-center mb-4">Equipment Information</h1>
                            <?Php
                            if (isset($_GET['reqQuery']) && $_GET['reqQuery'] == "update") {
                                echo "<form action='addequipmentLogic.php?equipmentId=" . $_GET['equipmentId'] . "&req=update' method='POST'>";
                            } else {
                                echo "<form action='addequipmentLogic.php' method='POST'>";
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['equipment_error_message'])) {
                                echo "<p class='text-danger'><strong>" . $_SESSION['equipment_error_message'] . "</strong></p>";
                            }
                            unset($_SESSION['equipment_error_message'])
                            ?>
                           
                           
                            <div class="mb-3">
                                <label for="Name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="Name" name="Name" required value="<?php echo isset($_SESSION['equipment_data']['Name']) ? htmlspecialchars($_SESSION['equipment_data']['Name']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="max_capacity" class="form-label">Max Capacity</label>
                                <input type="text" class="form-control" id="max_capacity" name="max_capacity" required value="<?php echo isset($_SESSION['equipment_data']['max_capacity']) ? htmlspecialchars($_SESSION['equipment_data']['max_capacity']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-check-label">Description</label>
                                <textarea class="form-control" id="description" name="description"><?php echo isset($_SESSION['equipment_data']['description']) ? htmlspecialchars($_SESSION['equipment_data']['description']) : ''; ?></textarea>
                                </div>
                            
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary me-3">Submit</button>
                                <?php
                                    if(isset($_GET['page'])){
                                        echo '<a class="btn btn-light border border-2" href="' .  $_GET['page'] . '">Cancel</a>';
                                    }
                                ?>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
unset($_SESSION['equipment_data'])
?>  
