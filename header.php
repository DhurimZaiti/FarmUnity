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
</head>
<body>
<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <!-- Collapse 1 -->
          <a class="list-group-item py-2 ripple"href="#">
            <i class="far fa-calendar-alt fa-fw me-3"></i><span>Schedule</span>
          </a>
        <!-- Collapse 1 END -->
        <!-- Collapse 2 -->
          <a class="list-group-item py-2 ripple" href="#" >
            <i class="far fa-check-circle fa-fw me-3"></i><span>Tasks</span>
          </a>
        <!-- Collapse 2 END -->
        <!-- Collapse 3 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-mdb-collapse-init href="#livestock" aria-expanded="true" aria-controls="livestock">
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
            <li class="list-group-item py-1">
            </li>
          </ul>
        <!-- Collapse 3 END -->
        <!-- Collapse 4 -->
        <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-mdb-collapse-init href="#plantings" aria-expanded="true" aria-controls="plantings">
            <i class="far fa-seedling fa-fw me-3"></i><span>Plantings</span>
          </a>
          <!-- Collapsed content -->
          <ul id="plantings" class="collapse list-group list-group-flush">
            <li class="list-group-item py-1">
              <a href="#" class="text-reset">My Crops</a>
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
            <li class="list-group-item py-1">
            </li>
          </ul>
        <!-- Collapse 4 END -->
        <!-- Collapse 5 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-mdb-collapse-init href="#rescources" aria-expanded="true" aria-controls="rescources">
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
            <li class="list-group-item py-1">
            </li>
          </ul>
        <!-- Collapse 5 END -->
        <!-- Collapse 6 -->
          <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-mdb-collapse-init href="#accounting" aria-expanded="true" aria-controls="accounting">
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
            <li class="list-group-item py-1">
            </li>
          </ul>
        <!-- Collapse 6 END -->
        <!-- Collapse 7 -->
          <a class="list-group-item py-2 ripple" aria-current="true" href="#">
            <i class="far fa-address-book fa-fw me-3"></i><span>Contacts</span>
          </a>
        <!-- Collapse 7 END -->
        <!-- Collapse 8 -->
        <a class="list-group-item py-2 ripple" aria-current="true" href="#">
            <i class="far fa-map fa-fw me-3"></i><span>Farm Map</span>
          </a>
        <!-- Collapse 8 END -->
        <!-- Collapse 9 -->
        <a class="list-group-item list-group-item-action dropdown-toggle py-2 ripple" aria-current="true" data-mdb-collapse-init href="#climate" aria-expanded="true" aria-controls="climate">
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
            <li class="list-group-item py-1">
            </li>
          </ul>
        <!-- Collapse 9 END -->
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img src="images/FU1T.png" height="25" alt="" loading="lazy"/>
      </a>
      <!-- Search form -->
      <form class="d-none d-md-flex input-group w-auto my-auto">
        <input autocomplete="off" type="search" class="form-control rounded" placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
        <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
      </form>

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link me-3 me-lg-0 dropdown" aria-current="true" data-mdb-collapse-init href="#bell" aria-expanded="true" aria-controls="bell">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="collapse dropdown-menu dropdown-menu-end list-group" aria-labelledby="bell" id="bell">
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>

        <!-- Icon -->
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="#">
            <i class="fas fa-cog"></i>
          </a>
        </li>

      <!-- Language dropdown -->
<li class="nav-item dropdown">
    <a class="nav-link me-3 me-lg-0 dropdown" aria-current="true" data-mdb-collapse-init href="#lang" aria-expanded="true" aria-controls="lang">
        <i class="far fa-language"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="lang" id="lang">
        <li><a class="dropdown-item" href="#"><i class="united kingdom flag"></i> English<i class="fa fa-check text-success ms-2"></i></a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#"><i class="poland flag"></i> Polski</a></li>
        <li><a class="dropdown-item" href="#"><i class="china flag"></i> 中文</a></li>
        <li><a class="dropdown-item" href="#"><i class="japan flag"></i> 日本語</a></li>
        <li><a class="dropdown-item" href="#"><i class="germany flag"></i> Deutsch</a></li>
        <li><a class="dropdown-item" href="#"><i class="france flag"></i> Français</a></li>
        <li><a class="dropdown-item" href="#"><i class="spain flag"></i> Español</a></li>
        <li><a class="dropdown-item" href="#"><i class="russia flag"></i> Русский</a></li>
        <li><a class="dropdown-item" href="#"><i class="portugal flag"></i> Português</a></li>
    </ul>
</li>



        <!-- Avatar -->
        <li class="nav-item dropdown">
          <a
             class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
             href="#"
             id="navbarDropdownMenuLink"
             role="button"
             data-mdb-toggle="dropdown"
             aria-expanded="false"
             >
            <img
                 src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                 class="rounded-circle"
                 height="22"
                 alt=""
                 loading="lazy"
                 />
          </a>
          <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink"
              >
            <li><a class="dropdown-item" href="#">My profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">

  </div>
</main>
<!--Main layout-->




        <!-- For Later (Search Related)
        <form class="d-flex ms-auto me-auto ml-5">
            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-success ml-2" type="submit"><i class=" bi bi-search"></i></button>
        </form> -->