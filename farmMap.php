<?php 
    include_once('header.php');
?>
<div class="contents">
    <div class="container">
        <div class="content">
            <!-- If the user hasn't added the farm, he can add it here with a button -->
            <div class="text-center" id="farmNotRegistered">
                <h1 class="mb-4 h1">You havent added your farm(s), add one now.</h1>
                <a href="registerFarm.php">
                <button class="btn btn-primary mb-4">Add your farm</button>
                </a>
                <div id="icon" class="nothing-added text-center">
                    <i class="fad fa-map fa-4x mb-4"></i>
                    <h4 class="h4 mb-3">Haven't added an area yet? Add one now!</h4>
                    <p class="text-muted">Click the green button above to add your farms, stables, and other places.</p>
                </div>
            </div>
            <!-- If the user has added the farm, he can see it with the google maps API. -->
            <div class="d-none">
            <iframe class="container-fluid" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d887.0035580645165!2d21.08935888915006!3d42.07127962581522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2smk!4v1723908798174!5m2!1sen!2smk"  height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<?php 
    include_once('footer.php');
?>