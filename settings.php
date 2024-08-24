<?php
include_once('header.php');

// User's username
$user = $userData['username'];

// SQL query to fetch farm data where the farm manager is the specified user
$sql = "SELECT * FROM farm WHERE farmManager = :username";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the username to the parameter
$stmt->bindParam(':username', $user, PDO::PARAM_STR);

// Execute the statement
$stmt->execute();

// Fetch all results
$farms = $stmt->fetchAll(PDO::FETCH_ASSOC);

$farm = [];

if (!empty($farms)) {
    $farm = $farms[0];
}
?>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .tab-content {
            position: relative;
            /* Ensure relative positioning */
        }

        .tab-pane {
            position: relative;
            /* Ensure relative positioning */
        }

        #map {
            height: 100%;
            /* Ensure the map fills the container */
            width: 100%;
        }
    </style>
</head>
<div class="contents">
    <div class="container">
        <div class="content">
            <!-- Tab Navigation -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="mapway-tab" data-bs-toggle="tab" data-bs-target="#map_way" type="button" role="tab" aria-controls="map_way" aria-selected="false">Map Waypoint</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="farm-tab" data-bs-toggle="tab" data-bs-target="#farm" type="button" role="tab" aria-controls="farm" aria-selected="true">Farm Preferences</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact Us</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <!-- Remove content and add it to myProfile.php -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active mt-3 mt-3" id="map_way" role="tabpanel" aria-labelledby="mapway-tab">
                    <div class="col-12">
                        <div class="container-fluid my-3 p-0">
                            <div class="card bg-light">
                                <h1 class="h3 my-3 text-center">Change your farm's waypoint</h1>
                                <?php
                                if (isset($_SESSION['update_map_error'])) {
                                    echo "<p class='text-danger ps-4'>" . $_SESSION['update_map_error'] . "</p>";
                                } elseif (isset($_SESSION['update_farm_true'])) {
                                    echo "<p class='text-success ps-4'>" . $_SESSION['update_farm_true'] . "</p>";
                                }
                                unset($_SESSION['update_map_error']);
                                unset($_SESSION['update_farm_true']);
                                ?>
                                <div class="card-body">
                                    <div id="map" style="height: 500px; width: 100%;"></div>
                                    <form action="changeFarmCoordinates.php" method="POST">
                                        <input type="text" id="farmCoordinates" name="farmCoordinates" class="d-none">
                                        <button type="submit" class="btn btn-primary text-center mt-3" name="submit">Confirm Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="farm" role="tabpanel" aria-labelledby="farm-tab">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 mt-5">
                            <div class="card bg-light mb-5">
                                <div class="card-body">
                                    <h1 class="card-title text-center mb-4">Edit Your Farm and Preferences</h1>
                                    <form action="RegisterFarmLogic.php" method="POST">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Farm Name</label>
                                            <input type="text" class="form-control " id="farm-name" name="farmName" placeholder="--Users Farm Name" value="<?php echo $farm['farmName'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="timezone" class="form-label form-label-sm">Country</label>
                                            <select class="form-select" id="country" name="country" required>
                                                <option value="">Select your Country</option>
                                                <option value="albania" <?php if ($farm['country'] === 'albania') echo 'selected'; ?>>Albania</option>
                                                <option value="bosnia" <?php if ($farm['country'] === 'bosnia') echo 'selected'; ?>>Bosnia & Herzegovina</option>
                                                <option value="croatia" <?php if ($farm['country'] === 'croatia') echo 'selected'; ?>>Croatia</option>
                                                <option value="kosovo" <?php if ($farm['country'] === 'kosovo') echo 'selected'; ?>>Kosovo</option>
                                                <option value="macedonia" <?php if ($farm['country'] === 'macedonia') echo 'selected'; ?>>North Macedonia</option>
                                                <option value="serbia" <?php if ($farm['country'] === 'serbia') echo 'selected'; ?>>Serbia</option>
                                                <option value="slovenia" <?php if ($farm['country'] === 'slovenia') echo 'selected'; ?>>Slovenia</option>
                                            </select>

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                                            <input type="text" class="form-control " id="address" placeholder="Address" name="address" value="<?php echo $farm['address'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">City</label>
                                            <input type="text" class="form-control " id="city" name="city" placeholder="City" value="<?php echo $farm['city'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Province/Municipality</label>
                                            <input type="text" class="form-control " id="province" placeholder="Province/Municipality" name="province" value="<?php echo $farm['province'] ?>" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput1" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control " id="postal-code" placeholder="Postal Code" name="postal-code" value="<?php echo $farm['postalCode'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="timezone" class="form-label form-label-sm">Timezone</label>
                                            <select class="form-select form-select-readonly" disabled id="timezone" name="timezone" required>
                                                <option selected value="0100">UTC +01:00</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="timezone" class="form-label form-label-sm">Currency</label>
                                            <select class="form-select" id="currency" name="currency" required>
                                                <option value="">Select your Currency</option>
                                                <option value="all" <?php if ($farm['currency'] === 'all') echo 'selected'; ?>>Albanian Lek (ALL)</option>
                                                <option value="bam" <?php if ($farm['currency'] === 'bam') echo 'selected'; ?>>Bosnian Convertible Mark (BAM)</option>
                                                <option value="eur" <?php if ($farm['currency'] === 'eur') echo 'selected'; ?>>Euro (&euro;)</option>
                                                <option value="mkd" <?php if ($farm['currency'] === 'mkd') echo 'selected'; ?>>Macedonian Denar (MKD)</option>
                                                <option value="rsd" <?php if ($farm['currency'] === 'rsd') echo 'selected'; ?>>Serbian Dinar (RSD)</option>
                                            </select>

                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="submit">Confirm Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade mt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="col-12 col-md-8 offset-md-2">
                        <div class="card bg-light">
                            <h3 class="h3 card-title my-3 text-center">
                                Contact Us
                            </h3>
                            <div class="card-body">
                                <form action="contactLogic.php" class="bg-light" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" name="submit">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Define map variables
    let farmCoordinates = "<?php echo $farm['farm_coordinates']; ?>";
    let mapZoom = 18

    var coordsArray = farmCoordinates.split(',').map(Number);

    if(coordsArray == 0) {
        coordsArray = [0, 0]
        mapZoom = 2
    }

    console.log(coordsArray)

    // Add Esri World Imagery satellite tile layer
    var esriWorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 18,
        attribution: '&copy; <a href="https://www.esri.com/">Esri</a> &mdash; Source: Esri, Maxar, Earthstar Geographics, and the GIS User Community'
    });

    // Add OpenStreetMap streets tile layer
    var openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    // Initialize the Leaflet map with Esri World Imagery as the default layer
    var map = L.map('map', {
        center: coordsArray,
        zoom: mapZoom, // Set zoom level to 13 for a closer view
        layers: [esriWorldImagery] // Start with the satellite view
    });

    // Add a marker at the farm's coordinates
    var marker = L.marker(coordsArray).addTo(map);

    // Handle the click event to update the waypoint
    map.on('click', function(e) {
        // Remove the previous marker if it exists
        if (marker) {
            map.removeLayer(marker);
        }

        // Add a marker at the clicked location
        marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

        // Get the coordinates of the clicked location
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // Update the input field with the coordinates
        var farmCoordinatesInput = document.getElementById('farmCoordinates');
        farmCoordinatesInput.value = lat + ', ' + lng;
    });
</script>