\\<?php 
    include_once('header.php');
?>
<div class="contents">
    <div class="container">
        <div class="content">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="farm-tab" data-bs-toggle="tab" data-bs-target="#farm" type="button" role="tab" aria-controls="farm" aria-selected="true">Farm Preferences</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mapway-tab" data-bs-toggle="tab" data-bs-target="#map_way" type="button" role="tab" aria-controls="map_way" aria-selected="false">Map Waypoint</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact Us</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                 <!-- Remove content and add it to myProfile.php -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active mt-3" id="farm" role="tabpanel" aria-labelledby="farm-tab">
                    <div class="row">
                            <div class="col-md-8 offset-md-2 mt-5">
                                <div class="card bg-light mb-5">
                                    <div class="card-body">
                                        <h1 class="card-title text-center mb-4">Edit Your Farm and Preferences</h1>
                                        <form action="RegisterFarmLogic.php" method="POST">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Farm Name</label>
                                                <input type="text" class="form-control " id="farm-name" name="farmName" placeholder="--Users Farm Name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="timezone" class="form-label form-label-sm">Country</label>
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
                                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                                <input type="text" class="form-control " id="address" placeholder="Address" name="address" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">City</label>  
                                                <input type="text" class="form-control " id="city" name="city" placeholder="City" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Province/Municipality</label>
                                                <input type="text" class="form-control " id="province" placeholder="Province/Municipality" name="province" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleFormControlInput1" class="form-label">Postal Code</label>
                                                <input type="text" class="form-control " id="postal-code" placeholder="Postal Code" name="postal-code" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="timezone" class="form-label form-label-sm">Timezone</label>
                                                <select class="form-select form-select-readonly" disabled id="timezone" name="timezone" required>
                                                    <option selected value="0100">UTC +01:00</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="timezone" class="form-label form-label-sm">Currency</label>
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
                    <div class="tab-pane fade mt-3" id="map_way" role="tabpanel" aria-labelledby="mapway-tab">
                        <div class="col-12">
                            <div class="container-fluid my-3 p-0"> <!-- Remove padding to make it full width -->
                                <div class="card bg-light">
                                    <h1 class="h3 my-3 text-center">Change your farm's waypoint</h1>
                                    <div class="card-body">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23933.423172086736!2d20.94833126826459!3d42.007651497363156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1353f0e82a50e8db%3A0x5587e34b46cad34c!2sTetovo%2C%20North%20Macedonia!5e1!3m2!1sen!2s!4v1724448649743!5m2!1sen!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                       <div class="col-12 col-md-8 offset-md-2">
                            <div class="card bg-light">
                            <h3 class="h3 card-title my-3 text-center">
                                Contact Us
                            </h3>
                                <div class="card-body">
                                    <form action="contactLogic.php" class="bg-light" method="POST">
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
        </div>
    </div>
</div>