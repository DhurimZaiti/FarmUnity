<?php
include_once 'header.php';
session_start();

$animalData;

if (isset($_GET['animalId'])) {
    $animalId = $_GET['animalId'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare('SELECT * FROM animals WHERE animal_id = :animal_id');
    $stmt->bindParam(':animal_id', $animalId, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    // Fetch the animal data
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
        $animalData = $animal;
    if ($animal) {
    } else {
        echo "No animal found with ID: " . htmlspecialchars($animalId);
    }
}
?>
<div class="content">
    <div class="container mb-5 mt-3">
        <div class="contents">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="h1 mb-0">Bessie's Information</h1>
                </div>
                <div class="col-12 mb-3 d-flex justify-content-end">
                    <!-- <a href="editSingleAnimal.php" class="mx-3"><button class="btn btn-primary">Edit Information</button></a> -->
                    <a href="addAnimalPage.php?animalId=<?php echo $animalData['animal_id'] ?>&page=singleAnimal.php?animalId=<?php echo $animalData['animal_id'] ?>" class="mx-3"><button class="btn btn-primary">Edit Information</button></a>
                </div>
                <div class="col-12">
                    <h4 class="h4 mb-0">General Info</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Name:<span class="ms-2 text-dark"><?php echo $animalData['animal_name'] ?></span></p>
                        <p class="h6 mb-1 text-primary">Species:<span class="ms-2 text-dark"><?php echo $animalData['animal'] ?></span></p>
                        <!-- <p class="h6 mb-1 text-primary">Breed:<span class="ms-2 text-dark">Busha</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Date of Birth:<span class="ms-2 text-dark">12/03/2021</span></p> -->
                        <p class="h6 mb-1 text-primary">Age:<span class="ms-2 text-dark"><?php echo $animalData['age'] ?> <!-- This is as of 27.8.24 . Please fix this to where the date of birth auto calculates the age of the animal --></span></p>
                        <p class="h6 mb-1 text-primary">Gender:<span class="ms-2 text-dark"><?php echo $animalData['gender'] ?></span></p>
                        <!-- <p class="h6 mb-1 text-primary">Color:<span class="ms-2 text-dark">White, Brown, Black</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Location/Paddock:<span class="ms-2 text-dark">Farm 2</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Internal ID:<span class="ms-2 text-dark">C001</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">External ID:<span class="ms-2 text-dark">K01382</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Description:<span class="ms-2 text-dark">Solid Cow, Beautiful, Very Economical :))</span></p> -->
                    </div>

                    <h4 class="h4 mb-0 mt-5">Metrics</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <!-- <p class="h6 mb-1 text-primary">Height:<span class="ms-2 text-dark">190cm</span></p> -->
                        <p class="h6 mb-1 text-primary">Weight:<span class="ms-2 text-dark"><?php echo $animalData['weight'] ?></span></p>
                        <!-- <p class="h6 mb-1 text-primary">Length:<span class="ms-2 text-dark">224cm</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Specific Metrics:<span class="ms-2 text-dark">Tail Length: 55cm</span></p> -->
                    </div>

                    <h4 class="h4 mb-0 mt-5">Health</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <!-- <p class="h6 mb-1 text-primary">Health Report:<span class="ms-2 text-dark">The cow is always clean. It has no health complications and has the ability to graze farms easily. Bessie has always had Calcium and Iron defficiencies but they have never bothered her.</span></p> -->
                        <p class="h6 mb-1 text-primary">Vaccination Status:<span class="ms-2 text-dark"><?php echo $animalData['vaccination_status'] ?></span></p>
                        <!-- <p class="h6 mb-1 text-primary">Breeding Season:<span class="ms-2 text-dark">21/2/2023 - 24/5/2023</span></p> -->
                        <p class="h6 mb-1 text-primary">Reproduction Status:<span class="ms-2 text-dark"><?php echo $animalData['reproducing_status'] ?></span></p>
                        <!-- <p class="h6 mb-1 text-primary">Vaccination Records:<span class="ms-2 text-dark">Not Vaccinated in 2020. Vaccinated from 2021-2023.</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Allergies:<span class="ms-2 text-dark">Peanuts, Cornstarch</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Nutrient Defitions:<span class="ms-2 text-dark">Calcium, Iron</span></p> -->
                        <!-- <p class="h6 mb-1 text-primary">Current Medications:<span class="ms-2 text-dark">Antibiotics, Calcium Tablets</span></p> -->
                        <p class="h6 mb-1 text-primary">Illness:<span class="ms-2 text-dark"><?php echo $animalData['illness_type'] ?></span></p>
                        <p class="h6 mb-1 text-primary">Medication Records:<span class="ms-2 text-dark"><?php echo $animalData['illness_history'] ?></span></p>
                    </div>

                    <!-- <h4 class="h4 mb-0 mt-5">Living Conditions</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Ideal Living Conditions:<span class="ms-2 text-dark">In a paddock, with a temperature between 19-24 C</span></p>
                        <p class="h6 mb-1 text-primary">Enviromental Needs:<span class="ms-2 text-dark">Humidity at 49% for ideal milk production.</span></p>
                        <p class="h6 mb-1 text-primary">Specific Care Instructions:<span class="ms-2 text-dark">Bessie needs to be handled carefully, because she is very sensitive to pressure.</span></p>
                    </div> -->

                    <!-- <h4 class="h4 mb-0 mt-5">Other Information</h4>
                    <hr class="bg-dark" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Animal's Cleanliness:<span class="ms-2 text-dark">The Animal maintains it's own cleanliness and doesn't require any help.</span></p>
                        <p class="h6 mb-1 text-primary">Offspring:<span class="ms-2 text-dark">Amy, Betty</span></p>
                        <p class="h6 mb-1 text-primary">Estimated Value:<span class="ms-2 text-dark">540€</span></p>
                        <p class="h6 mb-1 text-primary">Average Feed / Day:<span class="ms-2 text-dark">20kg</span></p>
                    </div> -->


                </div>
            </div>
        </div>
    </div>
</div>