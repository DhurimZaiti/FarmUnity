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
</head>
<body>

<!-- SIDEBAR -->
<div class="flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="#" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        <img src="images/FU-T.png" class="navbar-image" alt="Logo"><span class="text-dark">Farm</span><span class="text-primary">Unity</span>  
    </a>
    <ul class="list-unstyled ps-0">
    <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#search-collapse" aria-expanded="false">
         <i class="bi bi-search mr-1"></i> Search
        </button>
        <div class="collapse" id="search-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#schedule-collapse" aria-expanded="false">
          <i class="bi bi-check2-square mr-1"></i> Schedule
        </button>
        <div class="collapse" id="schedule-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#livestock-collapse" aria-expanded="false">
          <i class="far fa-cow mr-1"></i>Livestock
        </button>
        <div class="collapse" id="livestock-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#plantings-collapse" aria-expanded="false">
          <i class="bi mr-1 bi-flower1 mr-1"></i> Plantings
        </button>
        <div class="collapse" id="plantings-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#rescources-collapse" aria-expanded="false">
          <i class="far fa-tractor mr-1"></i> Resources
        </button>
        <div class="collapse" id="rescources-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#contact-collapse" aria-expanded="false">
           <i class="bi mr-1 bi-people"></i> Contacts
        </button>
        <div class="collapse" id="contact-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#farm-map-collapse" aria-expanded="false">
         <i class="bi mr-1 bi-map"></i> Farm Map
        </button>
        <div class="collapse" id="farm-map-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
            <i class="far mr-1 fa-cloud-sun-rain"></i> Climate
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
     
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
         <i class="bi mr-1 bi-person-circle"></i> Your Profile</a>
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New...</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
            <i class="bi mr-1 bi-gear"></i> Settings</a>
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Users</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Billing</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Pricing</a></li>
          </ul>
        </div>
      </li>
      <!-- ----------------------------------- -->
      <li class="mb-1">
          <a href="#"><i class="bi mr-1 bi-box-arrow-right"></i> Sign Out</a>
      </li>
      <!-- ----------------------------------- -->
    </ul>
  </div>


    <!-- Content -->
<div class="container">
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
</div>
<!-- Navbar & SideBar END -->


<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Custom JS -->
 <script src="js/main.js"></script>
</body>
</html>

        <!-- For Later (Search Related)
        <form class="d-flex ms-auto me-auto ml-5">
            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-success ml-2" type="submit"><i class=" bi bi-search"></i></button>
        </form> 
        -->