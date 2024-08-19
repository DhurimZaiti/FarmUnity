<?php
include_once('header.php');
?>
<div class="contents">
    <div class="container ms-4">
        <div class="content">
            <h1 class="w-fit">Hello <?php echo $userData['username'] ?></h1>
            <p><?php echo $userData['email'] ?></p>
            <form action="" method="POst" class="w-25 mt-5">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                </div>
                <button>Save</button>
            </form>
        </div>
    </div>
</div>
<?php
include_once('footer.php');
?>