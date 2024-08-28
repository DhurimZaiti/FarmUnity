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
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Leaflet Draw CSS and JS (compatible with Leaflet 1.7.1) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
    <script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>

    <!-- MapLibre GL JS and CSS -->
    <link href="https://unpkg.com/maplibre-gl/dist/maplibre-gl.css" rel="stylesheet" />
    <script src="https://unpkg.com/maplibre-gl/dist/maplibre-gl.js"></script>


</head>
<div class="contents">
    <div class="container-fluid">
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
        <blockquote class="h5 mb-2"><i class="far fa-info-circle text-blue ms-3 me-2"></i>Select an area type and then trace its outline by clicking on each corner of the area.</blockquote>
        <div class="dropdown ms-3">
            <button class="btn btn-primary dropdown dropdown-toggle mb-4" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                Add a Place
            </button>
            <ul class="dropdown-menu dropdown-menu-end" id="farm">
                <li><a class="dropdown-item" href="registerField.php"><?php echo $fields; ?></a></li>
                <li><a class="dropdown-item" href="registerStable.php"><?php echo $filed; ?></a></li>
                <li><a class="dropdown-item" href="registerWarehouse.php">Warehouse</a></li>
            </ul>
            <div class="d-flex mb-3 mt-3">
                <button id="addField" class="btn btn-primary">Add Field</button>
                <input type="text" id="polygonName" placeholder="Enter polygon name" style="display: none;">
                <button id="savePolygon" class="btn btn-secondary" style="display: none;">Save Polygon</button>

                <!-- Container for dynamically added delete buttons -->
                <div id="polygonControls" style="margin-top: 20px;"></div>

            </div>
        </div>

        <!-- MapBox Satellite view -->
        <div id="map" style="height: 600px;"></div>


        <script>
            //     window.onload = function() {
            //         // Define map variables
            //         var farmCoordinates = "<?php echo $farm['farm_coordinates']; ?>";
            //         var farmCoords = farmCoordinates.split(',').map(Number);

            //         let fieldsCoordinatesJSON = <?php echo json_encode($fields) ?>;

            //         // console.log(fieldsCoordinatesJSON)

            //         let fieldCoordinates = []

            //         for(let i = 0; i < fieldsCoordinatesJSON.length; i++) {

            //             fieldCoordinates.push(JSON.parse(fieldsCoordinatesJSON[i]['coordinates']));

            //         }
            //         // console.log(fieldCoordinates);


            //         // Add Esri World Imagery satellite tile layer
            //         var esriWorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            //             maxZoom: 18,
            //             attribution: '&copy; <a href="https://www.esri.com/">Esri</a> &mdash; Source: Esri, Maxar, Earthstar Geographics, and the GIS User Community'
            //         });

            //         // Add OpenStreetMap streets tile layer for place names
            //         var esriImageryLabels = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
            //             maxZoom: 18,
            //             attribution: '&copy; <a href="https://www.esri.com/">Esri</a> &mdash; Esri, HERE, Garmin, FAO, NOAA, USGS, EPA'
            //         });

            //         // Initialize the Leaflet map with Esri World Imagery and OSM as default layers
            //         var map = L.map('map', {
            //             center: farmCoords,
            //             zoom: 17,
            //             layers: [esriWorldImagery, esriImageryLabels] // Start with both satellite and place names
            //         });

            //         // Add a marker at the farm's coordinates
            //         var marker = L.marker(farmCoords).addTo(map);

            //         // Initialize a new FeatureGroup for drawn items
            //         var drawnItems = new L.FeatureGroup();
            //         map.addLayer(drawnItems);

            //         // Initialize draw control without adding it to the map initially
            //         var drawControl = new L.Control.Draw({
            //             edit: {
            //                 featureGroup: drawnItems
            //             },
            //             draw: {
            //                 polygon: true,
            //                 rectangle: false,
            //                 circle: false,
            //                 marker: false,
            //                 polyline: false,
            //                 circlemarker: false,
            //             }
            //         });

            //         // Add Field button event listener
            //         document.getElementById('addField').addEventListener('click', function() {
            //             map.addControl(drawControl); // Add the drawing control to the map
            //             document.getElementById('polygonName').style.display = 'inline-block'; // Show the name input
            //             document.getElementById('savePolygon').style.display = 'inline-block'; // Show Save button
            //         });

            //         // Save Polygon button event listener
            //         document.getElementById('savePolygon').addEventListener('click', function() {
            //             let polygonName = document.getElementById('polygonName').value.trim();

            //             if (!polygonName) {
            //                 alert('Please enter a name for the polygon.');
            //                 return;
            //             }

            //             if (lastDrawnPolygon) {
            //                 var geojson = lastDrawnPolygon.toGeoJSON();
            //                 console.log("Last draw polygon" + geojson);
            //                 var coordsArray = JSON.stringify(geojson.geometry.coordinates);

            //                 console.log(coordsArray);
            //                 console.log(polygonName);

            //                 // AJAX request to save the polygons in the database
            //                 fetch('save_polygons.php', {
            //                         method: 'POST',
            //                         headers: {
            //                             'Content-Type': 'application/json'
            //                         },
            //                         body: JSON.stringify({
            //                             name: polygonName,
            //                             coordinates: coordsArray
            //                         })
            //                     })
            //                     .then(response => response.json())
            //                     .then(data => {
            //                         if (data.success) {
            //                             console.log("Polygon saved successfully.");
            //                             // Clear input field and hide buttons after saving
            //                             document.getElementById('polygonName').value = ''; // Clear input field after saving
            //                             document.getElementById('polygonName').style.display = 'none'; // Hide name input
            //                             document.getElementById('savePolygon').style.display = 'none'; // Hide Save button

            //                             // Optionally remove draw controls to prevent more drawing until "Add Field" is clicked again
            //                             map.removeControl(drawControl);

            //                             // Optionally clear the last drawn polygon
            //                             lastDrawnPolygon = null;
            //                         } else {
            //                             console.log("Failed to save polygon.");
            //                             console.log(data.message);
            //                         }
            //                     })
            //                     .catch(error => {
            //                         console.error('Error:', error);
            //                     });
            //             } else {
            //                 alert('No polygon drawn to save.');
            //             }
            //         });

            //         // Function to add polygon control elements
            //         function addPolygonControl(name, polygonLayer) {
            //             // Ensure the polygonControls element exists
            //             var controlsContainer = document.getElementById('polygonControls');
            //             if (!controlsContainer) {
            //                 console.error("Element with ID 'polygonControls' not found.");
            //                 return;
            //             }

            //             // Create container for each polygon's controls
            //             var controlDiv = document.createElement('div');
            //             controlDiv.className = 'polygon-control';
            //             controlDiv.innerHTML = `
            //     <span>${name}</span>
            //     <button class="btn btn-danger btn-sm delete-polygon">Delete</button>
            // `;
            //             controlDiv.querySelector('.delete-polygon').addEventListener('click', function() {
            //                 map.removeLayer(polygonLayer); // Remove the polygon from the map
            //                 drawnItems.removeLayer(polygonLayer); // Remove from drawn items layer group
            //                 controlDiv.remove(); // Remove control div
            //             });

            //             controlsContainer.appendChild(controlDiv);
            //             polygons.push({
            //                 name: name,
            //                 layer: polygonLayer
            //             }); // Store polygon info
            //             lastDrawnPolygon = null; // Reset after saving
            //         }

            //         // Handle the created polygon event
            //         map.on(L.Draw.Event.CREATED, function(e) {
            //             var type = e.layerType,
            //                 layer = e.layer;

            //                 console.log(type);
            //                 console.log(layer);

            //             if (type === 'polygon') {
            //                 lastDrawnPolygon = layer; // Store the new polygon layer
            //                 drawnItems.addLayer(layer); // Add new polygon to the map
            //             }
            //         });

            //         // Function to load polygons from fieldsCoordinates
            //         function loadPolygons() {

            //             fieldsCoordinates['coordinates'].forEach(function(field) {
            //                 console.log(field)
            //                 // var polygon = L.polygon(field).addTo(map);
            //                 // drawnItems.addLayer(polygon);
            //                 // addPolygonControl("Field", polygon); // You can set a more specific name if needed
            //             });
            //         }

            //         // Load polygons on map
            //         // loadPolygons();

            //         // Define base maps for layer control
            //         var baseMaps = {
            //             "Satellite": esriWorldImagery,
            //             "Streets with Names": esriImageryLabels
            //         };

            //         // Define overlay maps for layer control
            //         var overlayMaps = {
            //             "Markers": drawnItems
            //         };

            //         // Add layer control to the map
            //         L.control.layers(baseMaps, overlayMaps).addTo(map);
            //     };
            window.onload = function() {
                // Define map variables
                var farmCoordinates = "<?php echo $farm['farm_coordinates']; ?>";
                var farmCoords = farmCoordinates.split(',').map(Number);

                let fieldsCoordinatesJSON = <?php echo json_encode($fields) ?>;
                let fieldCoordinates = []

                for (let i = 0; i < fieldsCoordinatesJSON.length; i++) {
                    fieldCoordinates.push(JSON.parse(fieldsCoordinatesJSON[i]['coordinates']));
                }

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
                        featureGroup: drawnItems
                    },
                    draw: {
                        polygon: true,
                        rectangle: false,
                        circle: false,
                        marker: false,
                        polyline: false,
                        circlemarker: false,
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
                        console.log(lastDrawnPolygon);
                        var geojson = lastDrawnPolygon.toGeoJSON();
                        var coordsArray = JSON.stringify(geojson.geometry.coordinates[0]);

                        console.log(coordsArray);
                        console.log(polygonName);

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
                function addPolygonControl(name, polygonLayer) {
                    // Ensure the polygonControls element exists
                    var controlsContainer = document.getElementById('polygonControls');
                    if (!controlsContainer) {
                        console.error("Element with ID 'polygonControls' not found.");
                        return;
                    }

                    // Create container for each polygon's controls
                    var controlDiv = document.createElement('div');
                    controlDiv.className = 'polygon-control';
                    controlDiv.innerHTML = `
            <span>${name}</span>
            <button class="btn btn-danger btn-sm delete-polygon">Delete</button>
        `;
                    controlDiv.querySelector('.delete-polygon').addEventListener('click', function() {
                        map.removeLayer(polygonLayer); // Remove the polygon from the map
                        drawnItems.removeLayer(polygonLayer); // Remove from drawn items layer group
                        controlDiv.remove(); // Remove control div
                    });

                    controlsContainer.appendChild(controlDiv);
                    polygons.push({
                        name: name,
                        layer: polygonLayer
                    }); // Store polygon info
                    lastDrawnPolygon = null; // Reset after saving
                }

                // Handle the created polygon event
                map.on(L.Draw.Event.CREATED, function(e) {
                    var type = e.layerType;
                    var polygonLayer = e.layer; // Correctly reference the drawn layer

                    console.log('Event Object:', e); // Log the full event object
                    console.log('Layer Type:', type); // Confirm it is 'polygon'
                    console.log('Polygon Layer:', polygonLayer); // Check the actual polygon layer

                    if (type === 'polygon') {
                        lastDrawnPolygon = polygonLayer; // Store the new polygon layer
                        drawnItems.addLayer(polygonLayer); // Add new polygon to the map

                        // Extract and log coordinates
                        var geojson = polygonLayer.toGeoJSON(); // Convert to GeoJSON to extract coordinates
                        console.log('Extracted GeoJSON:', geojson);
                        console.log('Extracted Coordinates:', geojson.geometry.coordinates);
                    }
                });


                // Function to load polygons from fieldsCoordinates
                function loadPolygons() {
                    fieldsCoordinates.forEach(function(field) {
                        var polygon = L.polygon(field).addTo(map);
                        drawnItems.addLayer(polygon);
                        addPolygonControl("Field", polygon); // You can set a more specific name if needed
                    });
                }

                // Load polygons on map
                loadPolygons();

                // Define base maps for layer control
                var baseMaps = {
                    "Satellite": esriWorldImagery,
                    "Streets with Names": esriImageryLabels
                };

                // Define overlay maps for layer control
                var overlayMaps = {
                    "Markers": drawnItems
                };

                // Add layer control to the map
                L.control.layers(baseMaps, overlayMaps).addTo(map);
            };
        </script>


        <!-- MapBox Satellite view END -->
    </div>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>