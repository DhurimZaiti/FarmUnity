<?php 
    include_once('header.php');
?>
<div class="contents">
    <div class="container">
        <div class="content">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="avatar-tab" data-bs-toggle="tab" data-bs-target="#your_avatar" type="button" role="tab" aria-controls="your_avatar" aria-selected="true">Your Avatar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="farm-tab" data-bs-toggle="tab" data-bs-target="#farm" type="button" role="tab" aria-controls="farm" aria-selected="false">Farm Preferences</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact Us</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                 <!-- Remove content and add it to myProfile.php -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active mt-3" id="your_avatar" role="tabpanel" aria-labelledby="avatar-tab">
                        <h3>Change Your Avatar</h3>
                        <div class="row">
                            <div class="col-8">
                                <img src="images/fallback-avatar.jpg" class="rounded-circle mt-3" height="240" alt="" loading="lazy" />
                            </div>
                            <div class="col-4">
                                <a href="" class="btn btn-primary"></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-3" id="farm" role="tabpanel" aria-labelledby="farm-tab">
                        <div class="row">
                            <div class="col-md-8 offset-md-2 mt-5">
                                <div class="card bg-light mb-5">
                                    <div class="card-body">
                                        <h1 class="card-title text-center mb-4">Edit Your Farm and Preferences</h1>
                                        <form action="RegisterFarmLogic.php" method="POST">
                                            <div class="mb-3">
                                                <input type="text" class="form-control " id="farm-name" name="farmName" placeholder="What do you call your farm?" required>
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select " id="country" name="country" required>
                                                    <option selected>Select your Country</option>
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
                                                <select class="form-select " id="currency" name="currency" required>
                                                    <option selected>Select your Currency</option>
                                                    <option value="all">Albanian Lek (ALL)</option>
                                                    <option value="bam">Bosnian Convertible Mark (BAM)</option>
                                                    <option value="eur">Euro (&euro;)</option>
                                                    <option value="mkd">Macedonian Denar (MKD)</option>
                                                    <option value="rsd">Serbian Dinar (RSD)</option>
                                                </select>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" name="submit">Confirm Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h3 class="h3 text-center">
                            Contact Us
                        </h3>
                        <form action="contactLogic.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>