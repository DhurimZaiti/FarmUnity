<?php
// Start session
session_start();
// !! kjo e sheh a oshte user logged in
$userData = '';

// Check if the session contains the username
if (isset($_SESSION['farm_unity_user'])) {
    $userData = $_SESSION['farm_unity_user'];

    // Include your database configuration
    include_once('config.php');

    try {
        // Prepare a SQL statement to check if the user exists
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $userData, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the user's data if they exist
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // User exists, you can now access the user's data through the $user array
            // For example, $user['email'], $user['avatar'], etc.
            $userData = $user;
        } else {
            // User does not exist, redirect to the signup page
            // header("Location: signup.php");
            exit();
        }
    } catch (PDOException $e) {
        // Handle any potential database errors
        echo "Database error: " . $e->getMessage();
        exit();
    }
} else {
    // If the session does not have a username, redirect to the signup page
    header("Location: signup.php");
    exit();
}
?>

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
    <link rel="stylesheet" href="css/sidebar-mdb.css">
    <!-- MDB -->
</head>
<body>
<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse sidebar bg-white d-none d-md-flex">
    <div class="sidebar-sticky ">
      <div class="list-group list-group-flush mx-3 mt-4">
        <!-- Collapse 1 -->
          <a class="list-group-item py-2 ripple" href="#">
            <i class="far fa-calendar-alt fa-fw me-3"></i><span>Schedule</span>
          </a>
        <!-- Collapse 1 END -->
        <!-- Collapse 2 -->
          <a class="list-group-item py-2 ripple" href="#" >
            <i class="far fa-check-circle fa-fw me-3"></i><span>Tasks</span>
          </a>
        <!-- Collapse 2 END -->
        <!-- Collapse 3 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#livestock" aria-expanded="true" aria-controls="livestock">
            <i class="far fa-cow fa-fw me-3"></i><span>Livestock</span>
          </a>
          <!-- Collapsed content -->
          <ul id="livestock" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="animalsPage.php" class="text-reset">Animals</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Livestock Groups</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Grazing</a>
            </li>
            <li class="list-group-item py-1"></li>
 
          </ul>
        <!-- Collapse 3 END -->
        <!-- Collapse 4 -->
        <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#plantings" aria-expanded="true" aria-controls="plantings">
            <i class="far fa-seedling fa-fw me-3"></i><span>Plantings</span>
          </a>
          <!-- Collapsed content -->
          <ul id="plantings" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">My Crops</a>
            </li>
            <li class="list-group-item py-1">
              <a href="seasonalPlants.php" class="text-reset">Seasonal Plants</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Grow Locations</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Crop Plan</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Location Map</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Yeild Comparison</a>
            </li>
            <li class="list-group-item py-1"></li>

 
          </ul>
        <!-- Collapse 4 END -->
        <!-- Collapse 5 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#rescources" aria-expanded="true" aria-controls="rescources">
            <i class="far fa-tractor fa-fw me-3"></i><span>Rescources</span>
          </a>
          <!-- Collapsed content -->
          <ul id="rescources" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Equipment</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Warehouses</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Inventory</a>
            </li>
            <li class="list-group-item py-1"></li>

 
          </ul>
        <!-- Collapse 5 END -->
        <!-- Collapse 6 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#accounting" aria-expanded="true" aria-controls="accounting">
            <i class="far fa-calculator fa-fw me-3"></i><span>Accounting</span>
          </a>
          <!-- Collapsed content -->
          <ul id="accounting" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Transactions</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">P&L Statements</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Cash Flow</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Balance Sheet</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Budgeting</a>
            </li>
            <li class="list-group-item py-1"></li>

 
          </ul>
        <!-- Collapse 6 END -->
        <!-- Collapse 8 -->
        <a class="list-group-item py-2 ripple" aria-current="true" href="farmMap.php">
            <i class="far fa-map fa-fw me-3"></i><span>Farm Map</span>
          </a>
        <!-- Collapse 8 END -->
        <!-- Collapse 9 -->
        <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#climate" aria-expanded="true" aria-controls="climate">
            <i class="far fa-cloud-sun-rain fa-fw me-3"></i><span>Climate</span>
          </a>
          <!-- Collapsed content -->
          <ul id="climate" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Weather History</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Gauges</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Climate Logs</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Weather Map</a>
            </li>
            <li class="list-group-item py-1"></li>

 
          </ul>
        <!-- Collapse 9 END -->
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-md navbar-light bg-white fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
    <a class="dropdown py-2 px-2 ripple" aria-current="true" type="button" data-bs-toggle="collapse"  href="#hamburger" aria-expanded="true" aria-controls="hamburger">
      <button class="navbar-toggler">
        <i class="fas fa-bars"></i>
      </button>
    </a>

      <!-- Brand -->
      <a class="navbar-brand" href="home.php">
        <img src="images/FU1T.png" height="25" alt="" loading="lazy"/>
      </a>
      <!-- Search form -->
      <form class=" input-group w-auto my-auto px-1">
        <input autocomplete="off" type="search" class="form-control rounded d-flex form-width" placeholder='Search' />
        <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
      </form>

      <!-- Right links -->
      <ul class="navbar-nav ms-auto flex-row d-none d-md-flex">
        <!-- Notifications -->
        <li class="nav-item me-3 me-lg-0">
        <a class="nav-link me-3 me-lg-0" href="#" aria-expanded="true">
          <i class="fas fa-bell"></i>
        </a>
        </li>
        <!-- Settings -->
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="settings.php">
            <i class="fas fa-cog"></i>
          </a>
        </li>

    <!-- Language Dropdown -->
      <div class="dropdown">
        <li class="nav-item">
          <a href="#language" class="nav-link me-3 me-lg-0" type="button" data-bs-toggle="dropdown" aria-expanded="true">
            <i class="far fa-language"></i>
          </a>
          
          <ul class="dropdown-menu dropdown-menu-end" id="language">
            <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/h20/gb.png" srcset="https://flagcdn.com/h40/gb.png 2x, https://flagcdn.com/h60/gb.png 3x" height="12" width="16" alt="United Kingdom"> English<i class="fa fa-check text-success ms-2"></i></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/h20/al.png" srcset="https://flagcdn.com/h40/al.png 2x, https://flagcdn.com/h60/al.png 3x" height="12" width="16" alt="Albania"> Shqip</a></li>
            <li><a class="dropdown-item" href="#"><img src="https://flagcdn.com/h20/mk.png" srcset="https://flagcdn.com/h40/mk.png 2x, https://flagcdn.com/h60/mk.png 3x" height="12" width="16" alt="North Macedonia"> Македонски</a></li>
          </ul>
        </li>
    </div>



    <!-- Avatar -->
    <div class="dropdown">
      <li class="nav-item">
        <a href="#profile" class="nav-link me-3 me-lg-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
          <img src="images/fallback-avatar.jpg" class="rounded-circle" height="22" alt="" loading="lazy" />
        </a>

        <ul class="dropdown-menu dropdown-menu-end" id="profile">
          <li><a class="dropdown-item" href="myProfile.php">My profile</a></li>
          <li><a class="dropdown-item" href="settings.php">Settings</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </li>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
    <!-- Mobile Hamburger Menu Content -->
    <div class="d-flex d-lg-none mx-3 mt-2">
      <ul class="collapse list-group list-group-item-action mx-3" id="hamburger">
           <!-- Collapse 1 -->
           <a class="list-group-item py-2 ripple" href="#">
            <i class="far fa-calendar-alt fa-fw me-3"></i><span>Schedule</span>
          </a>
        <!-- Collapse 1 END -->
        <!-- Collapse 2 -->
          <a class="list-group-item py-2 ripple" href="#" >
            <i class="far fa-check-circle fa-fw me-3"></i><span>Tasks</span>
          </a>
        <!-- Collapse 2 END -->
        <!-- Collapse 3 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#livestock" aria-expanded="true" aria-controls="livestock">
            <i class="far fa-cow fa-fw me-3"></i><span>Livestock</span>
          </a>
          <!-- Collapsed content -->
          <ul id="livestock" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Animals</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Livestock Groups</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Grazing</a>
            </li>
 
          </ul>
        <!-- Collapse 3 END -->
        <!-- Collapse 4 -->
        <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#plantings" aria-expanded="true" aria-controls="plantings">
            <i class="far fa-seedling fa-fw me-3"></i><span>Plantings</span>
          </a>
          <!-- Collapsed content -->
          <ul id="plantings" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">My Crops</a>
            </li>
            <li class="list-group-item py-1">
              <a href="seasonalPlants.php" class="text-reset">Seasonal Plants</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Grow Locations</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Crop Plan</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Location Map</a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">Yeild Comparison</a>
            </li>
 
          </ul>
        <!-- Collapse 4 END -->
        <!-- Collapse 5 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#rescources" aria-expanded="true" aria-controls="rescources">
            <i class="far fa-tractor fa-fw me-3"></i><span>Rescources</span>
          </a>
          <!-- Collapsed content -->
          <ul id="rescources" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Equipment</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Warehouses</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Inventory</a>
            </li>
 
          </ul>
        <!-- Collapse 5 END -->
        <!-- Collapse 6 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#accounting" aria-expanded="true" aria-controls="accounting">
            <i class="far fa-calculator fa-fw me-3"></i><span>Accounting</span>
          </a>
          <!-- Collapsed content -->
          <ul id="accounting" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Transactions</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">P&L Statements</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Cash Flow</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Balance Sheet</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Budgeting</a>
            </li>
 
          </ul>
        <!-- Collapse 6 END -->
        <!-- Collapse 7 -->
          <a class="list-group-item py-2 ripple" aria-current="true" href="contact.php">
            <i class="far fa-address-book fa-fw me-3"></i><span>Contacts</span>
          </a>
        <!-- Collapse 7 END -->
        <!-- Collapse 8 -->
        <a class="list-group-item py-2 ripple" aria-current="true" href="farmMap.php">
            <i class="far fa-map fa-fw me-3"></i><span>Farm Map</span>
          </a>
        <!-- Collapse 8 END -->
        <!-- Collapse 9 -->
        <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#climate" aria-expanded="true" aria-controls="climate">
            <i class="far fa-cloud-sun-rain fa-fw me-3"></i><span>Climate</span>
          </a>
          <!-- Collapsed content -->
          <ul id="climate" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Weather History</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Gauges</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Climate Logs</a>
            </li>
            <li class="list-group-item py-1">
              <a href="" class="text-reset">Weather Map</a>
            </li>
 
          </ul>
        <!-- Collapse 9 END -->
        <!-- Notifications -->
        <a class="list-group-item py-2 ripple" aria-current="true" href="#">
            <i class="far fa-bell fa-fw me-3"></i><span>Notifications</span>
        </a>
        <!-- Notifications END -->
        <!-- Settings -->
        <a class="list-group-item py-2 ripple" aria-current="true" href="settings.php">
            <i class="far fa-cog fa-fw me-3"></i><span>Settings</span>
        </a>
        <!-- Settings END -->
         <!-- Language Dropdown -->
        <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#lang" aria-expanded="true" aria-controls="lang">
            <i class="far fa-language fa-fw me-3"></i><span>Language</span>
          </a>
          <!-- Languages -->
          <ul id="lang" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a class="text-reset" href="#"><img src="https://flagcdn.com/h20/gb.png" srcset="https://flagcdn.com/h40/gb.png 2x, https://flagcdn.com/h60/gb.png 3x" height="12" width="16" alt="United Kingdom"> English<i class="fa fa-check text-success ms-2"></i></a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="#"><img src="https://flagcdn.com/h20/al.png" srcset="https://flagcdn.com/h40/al.png 2x, https://flagcdn.com/h60/al.png 3x" height="12" width="16" alt="Albania"> Shqip</a>
            </li>
            <li class="list-group-item py-1">
              <a class="text-reset" href="#"><img src="https://flagcdn.com/h20/mk.png" srcset="https://flagcdn.com/h40/mk.png 2x, https://flagcdn.com/h60/mk.png 3x" height="12" width="16" alt="North Macedonia"> Македонски</a>
            </li>
          </ul>
          <!-- Language Dropdown END -->
          <!-- Profile  -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-bs-toggle="collapse"  href="#profile" aria-expanded="true" aria-controls="profile">
          <img src="images/fallback-avatar.jpg" class="rounded-circle me-3 fa-fw" height="22" alt="" loading="lazy"/><span>Profile</span>
          </a>
          <!-- Profile Dropdown -->
          <ul id="profile" class="collapse list-group list-group-flush ls-none">
            <li class="list-group-item py-1">
              <a href="#" class="text-reset" aria-current="true">
                <i class="far fa-user-alt fa-fw me-3"></i><span>Profile</span>
              </a>
            </li>
            <li class="list-group-item py-1">
              <a href="#" class="text-reset" aria-current="true">
                <i class="far fa-sign-out fa-fw"></i><span>Sign Out</span>
              </a>
            </li>
          </ul>
          <!-- Profile END -->
        </ul>
      </div>
    <!-- Mobile Hamburger Menu Content END -->
  </div>
</main>
<!--Main layout-->


<?php 
  include_once('footer.php');
?>


        <!-- For Later (Search Related)
        <form class="d-flex ms-auto me-auto ml-5">
            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-success ml-2" type="submit"><i class=" bi bi-search"></i></button>
        </form> -->