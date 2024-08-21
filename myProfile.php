<?php
include_once('header.php');
?>
<div class="contents">
    <div class="container pe-0 ms-4">
        <div class="content">
            <div class="row">
                <div class="col-lg-6 col-12">
                   <form action="editUserDetails.php" method="POST">
                   <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Change Your Preferences</h5>
                            <div class="mb-3">
                                <label for="exampleInputUsernameame1" class="form-label">Username</label>
                                <input type="username" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Change Your Avatar</label>
                                <label for="formFile" class="form-label">Select a file</label>
                                <input class="form-control" type="file" id="formFile">
                                <div id="emailHelp" class="form-text">Maximum file size cannot exceed 9MB.</div>
                            </div>


                            <a href="#" name="submit" class="btn btn-primary">Change Details</a>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        

            <!-- <h1 class="w-fit">Hello <?php echo $userData['username'] ?></h1>
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
            </form> -->
        </div>
    </div>
</div>
