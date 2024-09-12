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

$fieldsSql = 'SELECT * FROM fields WHERE farm_manager = :username';
$stmt = $conn->prepare($fieldsSql);
$stmt->bindParam(":username", $user);
$stmt->execute();
$fields = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<head>
    <!-- Leaflet CSS and JS (specific version) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Leaflet Draw CSS and JS (compatible with Leaflet 1.7.1) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />

    <!-- MapLibre GL JS and CSS -->
    <link href="https://unpkg.com/maplibre-gl/dist/maplibre-gl.css" rel="stylesheet" />


</head>

<?php
if (isset($_SESSION['farm_unity_edit_field_error'])) {
    echo '
            <script>
                alert("' . $_SESSION['farm_unity_edit_field_error'] . '");
            </script>
        ';
}
?>


<div class="container-fluid mb-5">
    <div class="contents mb-5">
        <div class="content">
            <h1 class="h1 text-center my-3">Farm Map</h1>
            <!-- If the user hasn't added the farm, he can add it here with a button -->

            <?php
            if (!$farm['farm_coordinates']) {
                echo "<div class='text-center' id='farmNotRegistered'>";
            } else {
                echo "<div class='d-none'>";
            }
            ?>
            <h2 class="mb-4 h2">You havent added your farm(s), add one now.</h2>
            <div id="icon" class="nothing-added text-center">
                <i class="fad fa-map fa-4x mb-4"></i>
                <h4 class="h4 mb-3">Haven't added an area yet? Add one now!</h4>
                <p class="text-muted">Click the green button above to add your farms, stables, and other places.</p>
                <a href="settings.php">
                    <button class="btn btn-primary mb-4">Add your farm</button>
                </a>
            </div>
        </div>
        <!-- If the user has added the farm, he can see it with the google maps API. -->
        <?php
        if ($farm['farm_coordinates']) {
            echo "<div>";
        } else {
            echo "<div class='d-none'>";
        }
        ?>
        <div class="row">
            <div class="col-12 col-md-10 mt-3">
                <blockquote class="h5 mb-2 ms-3"><i class="far fa-info-circle text-blue me-2"></i>To Create a Place, click on "Add Place" and click the polygon button on the left hand side of the map, trace the perimeter of your place, enter a name for the place and then click finish near the polygon icon. Click "Save Place" and you will be able to see your place.</blockquote>
            </div>
        </div>
        <div class="mb-3 mt-3 ms-3">
            <button id="addField" class="btn btn-primary">Add Place</button>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex mt-3 col-6">
                        <input class="form-control form-control-sm" id="polygonName" type="text" placeholder="Enter A Name For Your Place" style="display: none;">
                        <button id="savePolygon" class="btn ms-3 btn-info" style="display: none;">Save Place</button>
                    </div>
                </div>
            </div>
        </div>


            <!-- Container for dynamically added delete buttons -->
        </div>
        <div id="polygonControls" style="margin-top: 20px;"></div>

        <!-- Modal alert box for confirming delete on a field-->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationLabel">Delete Field</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong><?php echo $fields['field_name']; ?></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal alert box for editing the name of the field -->
        <div class="modal fade" id="editFieldModal" tabindex="-1" aria-labelledby="editFieldModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationLabel">Edit Field</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="updateField.php" method="post">
                        <div class="modal-body col-md-9">
                            <label for="editFieldInput" class="my-1">Field Name</label> <br>
                            <input name="fieldId" type="text" id="fieldId" class="d-none">
                            <input name="fieldName" class="form-control" type="text" id="editFieldInput">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button name="submit" type="submit" class="btn btn-primary" id="SaveChanges">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- MapBox Satellite view -->
        <div id="map" style="height: 600px;" class="mt-5"></div>


        <script>
            window.onload = function() {
                var farmCoordinates = "<?php echo $farm['farm_coordinates']; ?>";
                var farmCoords = farmCoordinates.split(',').map(Number);

                let fieldsDataJSON = <?php echo json_encode($fields) ?>;
                let fieldIds = [];
                let fieldNames = [];
                let fieldCoordinates = [];

                for (let i = 0; i < fieldsDataJSON.length; i++) {
                    fieldIds.push(fieldsDataJSON[i]['fieldId']);
                    fieldNames.push(fieldsDataJSON[i]['field_name']);
                    fieldCoordinates.push(JSON.parse(fieldsDataJSON[i]['coordinates']));
                }


                // Define an array to store polygons
                var polygons = [];
                let lastDrawnPolygon = null;

                // Add Esri World Imagery satellite tile layer
                var esriWorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    maxZoom: 18,
                    attribution: '&copy; <a href="https://www.esri.com/">Esri</a> &mdash; Source: Esri, Maxar, Earthstar Geographics, and the GIS User Community'
                });

                // Add OpenStreetMap streets tile layer for place names
                var esriImageryLabels = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
                    maxZoom: 18,
                    attribution: '&copy; <a href="https://www.esri.com/">Esri</a> &mdash; Esri, HERE, Garmin, FAO, NOAA, USGS, EPA'
                });

                // Initialize the Leaflet map with Esri World Imagery and OSM as default layers
                var map = L.map('map', {
                    center: farmCoords,
                    zoom: 17,
                    layers: [esriWorldImagery, esriImageryLabels] // Start with both satellite and place names
                });

                // Add a marker at the farm's coordinates
                var marker = L.marker(farmCoords).addTo(map);

                // Initialize a new FeatureGroup for drawn items
                var drawnItems = new L.FeatureGroup();
                map.addLayer(drawnItems);

                // Initialize draw control without adding it to the map initially
                var drawControl = new L.Control.Draw({
                    edit: {
                        featureGroup: drawnItems,
                        edit: false,
                        remove: false, // Disable the delete button
                    },
                    draw: {
                        polygon: {
                            allowIntersection: false, // Restricts shapes to simple polygons
                            drawError: {
                                color: '#e1e100', // Color the shape will turn when intersects
                                message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
                            },
                            shapeOptions: {
                                color: '#bada55'
                            },
                            showArea: true,
                        },
                        rectangle: false, // Disable drawing rectangle shapes
                        circle: false, // Disable drawing circle shapes
                        marker: false, // Disable adding markers
                        polyline: false, // Disable polyline drawing
                        circlemarker: false, // Disable drawing circle markers
                    }
                });

                // Add Field button event listener
                document.getElementById('addField').addEventListener('click', function() {
                    map.addControl(drawControl); // Add the drawing control to the map
                    document.getElementById('polygonName').style.display = 'inline-block'; // Show the name input
                    document.getElementById('savePolygon').style.display = 'inline-block'; // Show Save button
                });

                // Save Polygon button event listener
                document.getElementById('savePolygon').addEventListener('click', function() {
                    let polygonName = document.getElementById('polygonName').value.trim();

                    if (!polygonName) {
                        alert('Please enter a name for the polygon.');
                        return;
                    }

                    if (lastDrawnPolygon) {
                        var latlngs = lastDrawnPolygon.getLatLngs()[0];
                        var coordsArray = latlngs.map(function(latlng) {
                            return [latlng.lat, latlng.lng];
                        });

                        console.log("Full Precision Coordinates:", JSON.stringify(coordsArray));

                        // AJAX request to save the polygons in the database
                        fetch('save_polygons.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    name: polygonName,
                                    coordinates: coordsArray
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    console.log("Polygon saved successfully.");
                                    // Clear input field and hide buttons after saving
                                    document.getElementById('polygonName').value = ''; // Clear input field after saving
                                    document.getElementById('polygonName').style.display = 'none'; // Hide name input
                                    document.getElementById('savePolygon').style.display = 'none'; // Hide Save button

                                    // Optionally remove draw controls to prevent more drawing until "Add Field" is clicked again
                                    map.removeControl(drawControl);

                                    // Optionally clear the last drawn polygon
                                    lastDrawnPolygon = null;
                                    location.reload();
                                } else {
                                    console.log("Failed to save polygon.");
                                    console.log(data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        alert('No polygon drawn to save.');
                    }
                });

                // Function to add polygon control elements
                function addPolygonControl(name, polygonLayer, fieldId) { // Updated to include fieldId parameter
                    // Ensure the polygonControls element exists
                    var controlsContainer = document.getElementById('polygonControls');
                    if (!controlsContainer) {
                        console.error("Element with ID 'polygonControls' not found.");
                        return;
                    }

                    // Create container for each polygon's controls
                    var controlDiv = document.createElement('div');
                    controlDiv.className = 'polygon-control';

                    // Include the fieldId in the delete button's href
                    controlDiv.innerHTML = `
                    <div class="row">
                        <div class="col-8 ms-3">
                            <h4>${name}</h4>
            
                            <button class="btn btn-warning btn-sm edit-polygon mb-3">Edit</button>
                            <button class="btn btn-danger btn-sm delete-polygon mb-3">Delete</button>
                        </div>
                    </div>
                    
            
        `;

                    controlDiv.querySelector('.delete-polygon').addEventListener('click', function(event) {
                        event.preventDefault();

                        // Dynamically set the polygon (field) name in the modal
                        document.querySelector('#deleteConfirmationModal strong').innerText = name;

                        // Show the modal
                        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
                        deleteModal.show();

                        // When user confirms deletion
                        document.getElementById('confirmDelete').addEventListener('click', function() {
                            // Close the modal
                            deleteModal.hide();

                            // Remove polygon from the map and DOM
                            map.removeLayer(polygonLayer);
                            drawnItems.removeLayer(polygonLayer);
                            controlDiv.remove();

                            // Proceed with the deletion request
                            fetch(`deleteField.php?fieldId=${fieldId}`, {
                                    method: 'GET',
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        console.log(`Field ${fieldId} deleted successfully.`);
                                    } else {
                                        console.error(`Failed to delete field ${fieldId}: ${data.message}`);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        });
                    });

                    controlDiv.querySelector('.edit-polygon').addEventListener('click', function(e) {
                        e.preventDefault();

                        document.querySelector('#editFieldInput').value = name
                        document.querySelector('#fieldId').value = fieldId

                        let editModal = new bootstrap.Modal(document.querySelector('#editFieldModal'));
                        editModal.show();
                    })


                    controlsContainer.appendChild(controlDiv);
                    polygons.push({
                        name: name,
                        layer: polygonLayer
                    });
                    lastDrawnPolygon = null;
                }

                // Handle the created polygon event
                map.on(L.Draw.Event.CREATED, function(e) {
                    var type = e.layerType;
                    var polygonLayer = e.layer;

                    if (type === 'polygon') {
                        lastDrawnPolygon = polygonLayer;
                        drawnItems.addLayer(polygonLayer);

                        // Extract and log coordinates
                        var geojson = polygonLayer.toGeoJSON();
                    }
                });

                // Function to load polygons from fieldsCoordinates
                function loadPolygons() {
                    fieldCoordinates.forEach(function(field, index) {
                        var polygon = L.polygon(field).addTo(map);
                        drawnItems.addLayer(polygon);

                        addPolygonControl(fieldNames[index], polygon, fieldIds[index]);
                    });
                }

                loadPolygons();
            };
        </script>
    </div>
</div>
</div>
</div>
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<!-- Leaflet draw JS -->
<script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>
<!-- Maplibre JS -->
<script src="https://unpkg.com/maplibre-gl/dist/maplibre-gl.js"></script>