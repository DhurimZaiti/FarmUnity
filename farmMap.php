<?php 
    include_once('header.php');
?>
<div class="contents">
    <div class="container-fluid">
        <div class="content">
            <h1 class="h1 text-center my-3">Fam Map</h1>
            <!-- If the user hasn't added the farm, he can add it here with a button -->
            <div class="text-center" id="farmNotRegistered">
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
            <div class="d-none">
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
                

                <iframe class="container-fluid mx-1" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d887.0035580645165!2d21.08935888915006!3d42.07127962581522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2smk!4v1723908798174!5m2!1sen!2smk"  height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
