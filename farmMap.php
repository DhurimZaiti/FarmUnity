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
                <li><a class="dropdown-item" href="registerField.php">Field</a></li>
                <li><a class="dropdown-item" href="registerStable.php">Stable</a></li>
                <li><a class="dropdown-item" href="registerWarehouse.php">Warehouse</a></li>
            </ul>
        </div>

        <!-- MapBox Satellite view -->
        <div id="map" style="height: 600px;"></div>

        <script>
            // Define map variables
            var farmCoordinates = "<?php echo $farm['farm_coordinates']; ?>";

            // Split the coordinates string into an array of latitude and longitude
            var coordsArray = farmCoordinates.split(',').map(Number);

            console.log(coordsArray);

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
                zoom: 13, // Set zoom level to 13 for a closer view
                layers: [esriWorldImagery] // Start with the satellite view
            });

            // Add a marker at the farm's coordinates
            var marker = L.marker(coordsArray).addTo(map);

            // Initialize a new FeatureGroup for drawn items
            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);

            // Add drawing controls for polygons only
            var drawControl = new L.Control.Draw({
                edit: {
                    featureGroup: drawnItems
                },
                draw: {
                    polygon: true,
                    rectangle: false,
                    circle: false,
                    marker: false,
                    polyline: false
                }
            });
            map.addControl(drawControl);

            // Handle the created polygon event
            map.on(L.Draw.Event.CREATED, function(e) {
                var type = e.layerType,
                    layer = e.layer;

                if (type === 'polygon') {
                    // Store the polygon in the database via AJAX
                    var geojson = layer.toGeoJSON();
                    var coords = JSON.stringify(geojson.geometry.coordinates);

                    // AJAX request to save the polygon in the database
                    fetch('save_polygon.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                coords: coords
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log("Polygon saved successfully.");
                            } else {
                                console.log("Failed to save polygon.");
                            }
                        });
                }

                drawnItems.addLayer(layer);
            });

            // Define base maps for layer control
            var baseMaps = {
                "Satellite": esriWorldImagery,
                "Streets": openStreetMap
            };

            // Define overlay maps for layer control
            var overlayMaps = {
                "Markers": drawnItems,
            };

            // Add layer control to the map
            L.control.layers(baseMaps, overlayMaps).addTo(map);
        </script>


        <!-- MapBox Satellite view END -->
    </div>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>