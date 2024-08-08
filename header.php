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
    
<!-- Navbar & SideBar -->
 <!-- Navbar
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">
            <img src="images/FU1T.png" alt="Logo" style="height: 40px;">
            <span class="text-dark">Farm</span><span class="text-primary">Unity</span>
        </a>
        <form class="form-inline mx-5">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
        <div class="ml-auto">
            <a href="#" class="nav-link">
                <i class="bi bi-gear"></i>
            </a>
            <a href="#" class="nav-link profile-icon">
                <img src="images/fallback-profile.png" alt="Profile" class="img-fluid rounded-circle">
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-1 d-md-block sidebar light">
                <h4></h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Schedule</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownLivestock" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Livestock
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownLivestock">
                            <li><a class="dropdown-item" href="#">Animals</a></li>
                            <li><a class="dropdown-item" href="#">Livestock Groups</a></li>
                            <li><a class="dropdown-item" href="#">Grazing</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownPlantings" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Plantings
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownPlantings">
                            <li><a class="dropdown-item" href="#">My Crops</a></li>
                            <li><a class="dropdown-item" href="#">Grow Locations</a></li>
                            <li><a class="dropdown-item" href="#">Crop Plan</a></li>
                            <li><a class="dropdown-item" href="#">Locations Map</a></li>
                            <li><a class="dropdown-item" href="#">Yield Comparison</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownResources" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resources
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownResources">
                            <li><a class="dropdown-item" href="#">Equipment</a></li>
                            <li><a class="dropdown-item" href="#">Warehouses</a></li>
                            <li><a class="dropdown-item" href="#">Inventory</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownAccounting" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Accounting
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownAccounting">
                            <li><a class="dropdown-item" href="#">Transactions</a></li>
                            <li><a class="dropdown-item" href="#">P&L Statement</a></li>
                            <li><a class="dropdown-item" href="#">Cash Flow</a></li>
                            <li><a class="dropdown-item" href="#">Balance Sheet</a></li>
                            <li><a class="dropdown-item" href="#">Budgeting</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Farm Map</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownClimate" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Climate
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownClimate">
                            <li><a class="dropdown-item" href="#">Weather History</a></li>
                            <li><a class="dropdown-item" href="#">Gauges</a></li>
                            <li><a class="dropdown-item" href="#">Climate Logs</a></li>
                            <li><a class="dropdown-item" href="#">Weather Map</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
            </main>
        </div>
    </div> 

    
<!-- Navbar & SideBar END -->

<nav class="navbar navbar-light bg-light" aria-label="First navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Never expand</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse col-lg-2" id="navbarsExample01">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
        <div class="flex-shrink-0 p-3 bg-light col-lg-2">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                <span class="fs-5 fw-semibold">Collapsible</span>
                </a>
                <ul class="list-unstyled ps-0 ml-3">
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    Home
                    </button>
                    <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                <i class="bi bi-speedometer2"></i>
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Dashboard
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
                        <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Orders
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
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Account
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
                </ul>
        </div>
    </div>
    </div>
<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>