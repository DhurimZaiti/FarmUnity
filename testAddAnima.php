<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- !!  MOS I PREKNI PHP OSE VALUE -->

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Animal Information</h1>
                        <form action="addAnimal.php" method="POST">
                            <?php
                            if (isset($_SESSION['animal_error_message'])) {
                                echo "<p class='text-danger'><strong>" . $_SESSION['animal_error_message'] . "</strong></p>";
                            }
                            ?>
                            <div class="mb-3">
                                <label for="animal" class="form-label">Animal</label>
                                <input type="text" class="form-control" id="animal" name="animal" required value="<?php echo isset($_SESSION['animal_data']['animal']) ? htmlspecialchars($_SESSION['animal_data']['animal']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Select gender</option>
                                    <option value="Male" <?php echo (isset($_SESSION['animal_data']['gender']) && $_SESSION['animal_data']['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo (isset($_SESSION['animal_data']['gender']) && $_SESSION['animal_data']['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" required value="<?php echo isset($_SESSION['animal_data']['age']) ? htmlspecialchars($_SESSION['animal_data']['age']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="animal_name" class="form-label">Animal Name</label>
                                <input type="text" class="form-control" id="animal_name" name="animal_name" required value="<?php echo isset($_SESSION['animal_data']['animal_name']) ? htmlspecialchars($_SESSION['animal_data']['animal_name']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="illness" class="form-check-label">Illness</label>
                                <input type="checkbox" class="form-check-input" id="illness" name="illness" <?php echo isset($_SESSION['animal_data']['illness']) ? 'checked' : ''; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="illness_type" class="form-label">Illness Type</label>
                                <input type="text" class="form-control" id="illness_type" name="illness_type" placeholder="leave empty if there is no illness" value="<?php echo isset($_SESSION['animal_data']['illness_type']) ? htmlspecialchars($_SESSION['animal_data']['illness_type']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="illness_history" class="form-label">Illness History</label>
                                <textarea class="form-control" id="illness_history" name="illness_history" placeholder="write the animal's illness history if it had an illness"><?php echo isset($_SESSION['animal_data']['illness_history']) ? htmlspecialchars($_SESSION['animal_data']['illness_history']) : ''; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="vaccination_status" class="form-label">Vaccination Status</label>
                                <select class="form-select" id="vaccination_status" name="vaccination_status">
                                    <option value="">Select status</option>
                                    <option value="Vaccinated" <?php echo (isset($_SESSION['animal_data']['vaccination_status']) && $_SESSION['animal_data']['vaccination_status'] == 'Vaccinated') ? 'selected' : ''; ?>>Vaccinated</option>
                                    <option value="Not Vaccinated" <?php echo (isset($_SESSION['animal_data']['vaccination_status']) && $_SESSION['animal_data']['vaccination_status'] == 'Not Vaccinated') ? 'selected' : ''; ?>>Not Vaccinated</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="number" step="0.1" class="form-control" id="weight" name="weight" value="<?php echo isset($_SESSION['animal_data']['weight']) ? htmlspecialchars($_SESSION['animal_data']['weight']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="reproducing_status" class="form-label">Reproducing Status</label>
                                <select class="form-select" id="reproducing_status" name="reproducing_status">
                                    <option value="">Select status</option>
                                    <option value="pregnant" <?php echo (isset($_SESSION['animal_data']['reproducing_status']) && $_SESSION['animal_data']['reproducing_status'] == 'pregnant') ? 'selected' : ''; ?>>pregnant</option>
                                    <option value="lactating" <?php echo (isset($_SESSION['animal_data']['reproducing_status']) && $_SESSION['animal_data']['reproducing_status'] == 'lactating') ? 'selected' : ''; ?>>lactating</option>
                                    <option value="infertile" <?php echo (isset($_SESSION['animal_data']['reproducing_status']) && $_SESSION['animal_data']['reproducing_status'] == 'infertile') ? 'selected' : ''; ?>>infertile</option>
                                    <option value="none" <?php echo (isset($_SESSION['animal_data']['reproducing_status']) && $_SESSION['animal_data']['reproducing_status'] == 'none') ? 'selected' : ''; ?>>none</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" id="notes" name="notes" placeholder="optional"><?php echo isset($_SESSION['animal_data']['notes']) ? htmlspecialchars($_SESSION['animal_data']['notes']) : ''; ?></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>