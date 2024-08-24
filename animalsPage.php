<?php 
    include_once('header.php')
?>

<body>
                <?php
                    if (!$animalData) {
                        echo "<div class='text-center' id='farmNotRegistered'>";
                    } else {
                        echo "<div class='d-none'>";
                    }
                ?>
                <h2 class="mb-4 h2">You havent added any animal(s), add one now.</h2>
                <div id="icon" class="nothing-added text-center">
                    <i class="fad fa-cow fa-4x mb-4"></i>
                    <h4 class="h4 mb-3">Haven't added an animal yet? Add one now!</h4>
                    <p class="text-muted">Click the green button above to add your animal.</p>
                    <a href="addAnimalPage.php">
                        <button class="btn btn-primary mb-4">Add your animal.</button>
                    </a>
                </div>
            </div>
    <div class="contents">
        <div class="container">
            <div class="content ms-3">
                <div class="row mb-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Animals</h5>
                                <p class="card-text">100% of 10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Cow</h5>
                                <p class="card-text">100% of 10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Male</h5>
                                <p class="card-text">50% of 10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Female</h5>
                                <p class="card-text">50% of 10</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Animal / Add Group Buttons -->
                <div class="d-flex justify-content-end mb-4">
                    <div class="dropdown me-3">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Most Recent
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                            <li><a class="dropdown-item" href="#" onclick="changeSorting('Most Recent')">Most Recent</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSorting('By Location')">By Location</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSorting('By Type')">By Type</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-primary mx-3">Add Animal</button>
                    <button class="btn btn-info">Add Group</button>
                </div>

                <!-- Animals Section -->
                <h4>Animals</h4>
                <div class="list-group">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><a href="animal-details.html">Animal 1</a></td>
                                <td class="text-end"><button class="btn btn-outline-secondary btn-sm">Edit Animal</button></td>
                            </tr>
                            <tr>
                                <td><a href="animal-details.html">Animal 2</a></td>
                                <td class="text-end"><button class="btn btn-outline-secondary btn-sm">Edit Animal</button></td>
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
