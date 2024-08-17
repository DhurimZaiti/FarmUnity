<?php 
    include_once('header.php');
?>
<div class="contents">
    <div class="container">
        <div class="content">
            <!-- If the user hasn't added the farm, he can add it here with a button -->
            <div class="text-center" id="farmNotRegistered">
                <h1 class="text-center h1">You havent added your farm(s), add one now.</h1>
                <a href="registerFarm.php">
                <button class="btn btn-primary">Add your farm</button>
                </a>
            </div>
            <!-- If the user has added the farm, he can see it with the google maps API. -->
        </div>
    </div>
</div>
<?php 
    include_once('footer.php');
?>