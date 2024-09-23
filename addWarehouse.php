<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('header.php');

// Check if 'warehouseId' is set in the URL parameters
if (isset($_GET['warehouseId'])) {
    // Get the warehouse ID from the URL
    $warehouseId = $_GET['warehouseId'];

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM warehouses WHERE warehouse_id = :warehouse_id");

        // Bind the warehouse_id parameter
        $stmt->bindParam(':warehouse_id', $warehouseId, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Fetch the data
        $warehouseData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if any data was retrieved
        if ($warehouseData) {
            // Output or process the data as needed
            $_SESSION['warehouse_data'] = $warehouseData;
        } else {
            echo "No warehouse found with the provided ID.";
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
                            <h1 class="card-title text-center mb-4">warehouse Information</h1>
                            <?Php
                            if (isset($_GET['reqQuery']) && $_GET['reqQuery'] == "update") {
                                echo "<form action='addWarehouseLogic.php?warehouseId=" . $_GET['warehouseId'] . "&req=update' method='POST'>";
                            } else {
                                echo "<form action='addWarehouseLogic.php' method='POST'>";
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['warehouse_error_message'])) {
                                echo "<p class='text-danger'><strong>" . $_SESSION['warehouse_error_message'] . "</strong></p>";
                            }
                            unset($_SESSION['warehouse_error_message'])
                            ?>
                           
                           
                            <div class="mb-3">
                                <label for="Name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="Name" name="Name" required value="<?php echo isset($_SESSION['warehouse_data']['Name']) ? htmlspecialchars($_SESSION['warehouse_data']['Name']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="max_capacity" class="form-label">Max Capacity</label>
                                <input type="text" class="form-control" id="max_capacity" name="max_capacity" required value="<?php echo isset($_SESSION['warehouse_data']['max_capacity']) ? htmlspecialchars($_SESSION['warehouse_data']['max_capacity']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-check-label">Description</label>
                                <textarea class="form-control" id="description" name="description"><?php echo isset($_SESSION['warehouse_data']['description']) ? htmlspecialchars($_SESSION['warehouse_data']['description']) : ''; ?></textarea>
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
unset($_SESSION['warehouse_data'])
?>