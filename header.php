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
    <!-- CSS Links -->
    <link rel="stylesheet" href="css/poppins-font.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    

 
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" id="menuToggle" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-image" href="#"><img class="navbar-image" src="images/FU32.png" alt=""></a>
            <a class="navbar-brand" href="#"><span class="text-dark">Farm</span><span class="text-primary">Unity</span></a>
            <form class="d-flex ms-auto me-auto ml-5">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success ml-2" type="submit"><i class=" bi bi-search"></i></button>
            </form>
            <div class="ml-auto">
            <a href="#" class="btn btn-outline-primary"><i class="bi bi-gear"></i></a>
            <a href="#" class="btn btn-outline-primary"><i class="bi bi-person-circle"></i></a>
            <a href="#" class="btn btn-outline-primary"><i class="bi bi-box-arrow-right"></i></a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar bg-light">
        <a href="#" class="active"><i class="bi bi-check2-square"></i> Schedule</a>
        <a href="#"><i class="bi bi-list-check"></i> Tasks</a>
        <a href="#"><i class="bi bi-person-lines-fill"></i> Livestock</a>
        <a href="#"><i class="bi bi-flower1"></i> Plantings</a>
        <a href="#"><i class="bi bi-gear-wide-connected"></i> Resources</a>
        <a href="#"><i class="bi bi-calculator"></i> Accounting</a>
        <a href="#"><i class="bi bi-shop"></i> Market</a>
        <a href="#"><i class="bi bi-people"></i> Contacts</a>
        <a href="#"><i class="bi bi-map"></i> Farm Map</a>
        <a href="#"><i class="bi bi-cloud-sun"></i> Climate</a>
        <a href="#"><i class="bi bi-file-earmark-bar-graph"></i> Reports</a>
        <a href="#"><i class="bi bi-person-circle"></i> Your Profile</a>
        <a href="#"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
    </div>

    <!-- Content -->
    <div class="content mt-5">
        <h1>Weather for TETOVO, TETOVO</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">34°C</h2>
                        <p class="card-text">Scattered Clouds - H 35°C L 18°C</p>
                        <p class="card-text">Sunset: 7:46PM</p>
                        <p class="card-text">Wind: 1 mps</p>
                        <p class="card-text">Humidity: 23%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Hourly Forecast</h5>
                        <p class="card-text">7PM - 34°C</p>
                        <p class="card-text">8PM - 33°C</p>
                        <p class="card-text">9PM - 31°C</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Navbar & SideBar END -->


<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>