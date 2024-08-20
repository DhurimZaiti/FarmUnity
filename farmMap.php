<?php 
    include_once('header.php');
?>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw/dist/leaflet.draw.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>
    <script src="https://unpkg.com/maplibre-gl/dist/maplibre-gl.js"></script>
    <link href="https://unpkg.com/maplibre-gl/dist/maplibre-gl.css" rel="stylesheet" />
</head>
<div class="contents">
    <div class="container-fluid">
        <div class="content">
            <h1 class="h1 text-center my-3">Fam Map</h1>
            <!-- If the user hasn't added the farm, he can add it here with a button -->
            <div class="text-center d-none" id="farmNotRegistered">
                <h2 class="mb-4 h2">You havent added your farm(s), add one now.</h2>
                <div id="icon" class="nothing-added text-center">
                    <i class="fad fa-map fa-4x mb-4"></i>
                    <h4 class="h4 mb-3">Haven't added an area yet? Add one now!</h4>
                    <p class="text-muted">Click the green button above to add your farms, stables, and other places.</p>
                    <a href="registerFarm.php">
                        <button class="btn btn-primary mb-4">Add your farm</button>
                    </a>    
                </div>
            </div>
            <!-- If the user has added the farm, he can see it with the google maps API. -->
            <div class="">
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
                        var map = L.map('map').setView([42.07127962581522, 21.08935888915006], 13);

                        // Create a new MapLibre GL layer
                        var gl = L.maplibreGL({
                            style: 'https://demotiles.maplibre.org/style.json', // Use MapLibre's default style or any other tile URL for satellite view
                            accessToken: '' // No access token required for public tile servers
                        }).addTo(map);

                        var drawnItems = new L.FeatureGroup();
                        map.addLayer(drawnItems);

                        var drawControl = new L.Control.Draw({
                            edit: {
                                featureGroup: drawnItems
                            },
                            draw: {
                                polygon: true,
                                polyline: false,
                                rectangle: false,
                                circle: false,
                                marker: false
                            }
                        });
                        map.addControl(drawControl);

                        map.on(L.Draw.Event.CREATED, function (e) {
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
                                    body: JSON.stringify({ coords: coords })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if(data.success) {
                                        console.log("Polygon saved successfully.");
                                    } else {
                                        console.log("Failed to save polygon.");
                                    }
                                });
                            }

                            drawnItems.addLayer(layer);
                        });
                    </script>


                <!-- MapBox Satellite view END -->
            </div>
        </div>
    </div>
</div>
<?php 
    include_once('footer.php');
?>