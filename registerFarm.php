<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tab Image & Title -->
         <link rel="icon" href="images/FU32.png" type="image/png">
    <title>FarmUnity</title>
    <!-- Bootstrap Icons & Bootstrap 5 links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- FontAwsome 5 CDN -->
    <link rel="stylesheet" href="font-awsome-5/css/all.min.css">    
    <!-- CSS Links -->
    <link rel="stylesheet" href="css/poppins-font.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sidebar-bs.css">
    <link rel="stylesheet" href="css/sidebar-mdb.css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet"/>
  <style>
            .bg-image {
            background-image: url('images/login-farm.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
  </style>
</head>
<body>
<div class="bg-image d-flex justify-content-center overflow-auto">
<div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="card bg-light mb-5">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Your Farm and Preferences</h1>
                        <form action="farmLogic.php" method="POST">
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
                                <button type="submit" class="btn btn-success" name="submit">Continue to Homepage</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- In farm logic, after the info gets saved, it should redirect to the past page, which is for account preferences, this can go in the users table, or potentially a new table called preferences -->

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Preloader -->
  <div id="preloader"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
