<?php 
    include_once 'header.php';
?>

<body>
    <div class="contents">
        <div class="container">
            <div class="content ms-3">
                <div class="row mb-4">
                    <!-- Artina, kjo hin brenda contents, container ene content, se kto jan paddingat tamam per secollen faqe. -->
                    <div class="d-none">
                        <h2 class="mb-4 h2">You havent added any plantings, add one now.</h2>
                        <div id="icon" class="nothing-added text-center">
                            <i class="fad fa-seedling fa-4x mb-4"></i>
                            <h4 class="h4 mb-3">Haven't added a planting yet? Add one now!</h4>
                            <p class="text-muted">Click the green button above to add your planting(s).</p>
                            <a href="addPlanting.php">
                                <button class="btn btn-primary mb-4">Add your plantings</button>
                            </a>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Plantings</h5>
                                <p class="card-text">100% of 17</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Cereals </h5>
                                <p class="card-text">100% of 17</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Vegetables</h5>
                                <p class="card-text">50% of 17</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Fruits</h5>
                                <p class="card-text">50% of 17</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Other</h5>
                                <p class="card-text">50% of 17</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Plantings -->
                <div class="d-flex justify-content-end mb-4">
                    <div class="dropdown me-3">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Most Recent
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sortingDropdown">
                            <li><a class="dropdown-item" href="#" onclick="changeSorting('Most Recent')">Most Recent</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSorting('By Location')">By Location</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSorting('By Type')">By Type</a></li>
                        </ul>
                    </div>
                    <a href="addPlanting.php" class="btn btn-primary mx-3">Add Planting</a>
                    <a href="#" class="btn btn-info">Add Group</a>
                </div>

                <!-- Plantings Section -->
                <h2>Plantings</h2>
                <div class="list-group">
                    <table class="table table-striped border rounded">
                        <tbody>
                            <tr>
                                <td><a href="singlePlanting.php">Planting 1</a></td>
                                <td class="text-end">
                                    <a href="editSinglePlanting.php" class="btn btn-outline-secondary btn-sm">Edit Planting Data</a>
                                    <a href="deleteSinglePlanting.php" class="btn btn-danger btn-sm ms-1">Delete Planting</a>
                                </td> 
                            </tr>
                            <tr>
                                <td><a href="singlePlanting.php">Planting 2</a></td>
                                <td class="text-end">
                                    <a href="editSinglePlanting.php" class="btn btn-outline-secondary btn-sm">Edit Planting Data</a>
                                    <a href="deleteSinglePlanting.php" class="btn btn-danger btn-sm ms-1">Delete Planting</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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