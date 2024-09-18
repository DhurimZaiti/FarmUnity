<?php
include_once('header.php');

?>
<div class="contents">
    <div class="container mb-5 pe-0 ms-4">
        <div class="content">
            <div class="row">
            <div class="col-lg-6 col-12">
                <form action="editUserDetails.php" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Change Your Account Details</h5>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Username</label>
                                <input type="text" name="username" value="<?php echo $userData['username']; ?>" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" value="<?php echo $userData['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Change Your Avatar</label>
                                <input class="form-control" type="file" id="formFile" name="avatar" accept=".jpg, .jpeg, .png">
                                <div id="fileHelp" class="form-text">Maximum file size cannot exceed 9MB.</div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Change Details</button>
                        </div>
                    </div>
                </form>
            </div>


                <div class="col-lg-6 col-12">
                    <form action="changePassword.php" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Change Your Password</h5>
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <div class="input-group">
                                        <input type="password" name="current_password" class="form-control" id="currentPassword">
                                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('currentPassword')">
                                            <i class="fas fa-eye" id="toggleCurrentPasswordIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" name="new_password" class="form-control" id="newPassword">
                                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('newPassword')">
                                            <i class="fas fa-eye" id="toggleNewPasswordIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <div class="input-group">
                                        <input type="password" name="confirm_password" class="form-control" id="confirmPassword">
                                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('confirmPassword')">
                                            <i class="fas fa-eye" id="toggleConfirmPasswordIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
            <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="my-3">
                                <h5 class="card-title text-center">Change Your Map Waypoint</h5>
                            </div>
                            <div class="mb-3">
                                <!-- Map Goes Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
            <div class="col-10 offset-1">
                <form action="editPreferences.php" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <div class="my-3">
                                <h5 class="card-title text-center">Change Your Preferences</h5>
                            </div>
                            <div class="mb-3">
                                    <input type="text" class="form-control " id="farm-name" name="farmName" placeholder="Farm's Name" required>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select " id="country" name="country" required>
                                        <option value="albania">Albania</option>
                                        <option value="bosnia">Bosnia & Herzegovina</option>
                                        <option value="croatia">Croatia</option>
                                        <option value="kosovo">Kosovo</option>
                                        <option value="macedonia">North Macedonia</option>
                                        <option value="serbia">Serbia</option>
                                        <option value="slovenia">Slovenia</option>
                                    </select>
                                </div>
                                  <div class="mb-3">
                                    <input type="text" class="form-control " id="address" placeholder="Address" name="address" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control " id="city" name="city" placeholder="City" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control " id="province" placeholder="Province/Municipality" name="province" required>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control " id="postal-code" placeholder="Postal Code" name="postal-code" required>
                                </div>
                                <div class="mb-3">
                                    <label for="timezone" class="form-label form-label-sm">Timezone</label>
                                    <select class="form-select form-select-readonly" disabled id="timezone" name="timezone" required>
                                        <option selected value="0100">UTC +01:00</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="currency" name="currency" required>
                                        <option value="all">Albanian Lek (ALL)</option>
                                        <option value="bam">Bosnian Convertible Mark (BAM)</option>
                                        <option value="eur">Euro (&euro;)</option>
                                        <option value="mkd">Macedonian Denar (MKD)</option>
                                        <option value="rsd">Serbian Dinar (RSD)</option>
                                    </select>
                                </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Change Your Preferences</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId) {
    var input = document.getElementById(inputId);
    var iconId;
    
    // Determine the correct icon based on the input field
    switch(inputId) {
        case 'currentPassword':
            iconId = 'toggleCurrentPasswordIcon';
            break;
        case 'newPassword':
            iconId = 'toggleNewPasswordIcon';
            break;
        case 'confirmPassword':
            iconId = 'toggleConfirmPasswordIcon';
            break;
    }
    
    var icon = document.getElementById(iconId);
    
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
