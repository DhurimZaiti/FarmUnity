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
<div class="container mt-5 ">
<?php
    session_start();
    if (isset($_SESSION['alert'])) {
        $alert = $_SESSION['alert'];
        echo '<div class="alert alert-' . $alert['type'] . ' alert-dismissible fade show" role="alert">' .
             $alert['message'] .
             '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
             '</div>';
        unset($_SESSION['alert']);
    }
    ?>
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card bg-light mb-5">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Login</h1>
                        <form action="loginLogic.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-eye ms-auto"></i><!-- <i class="fas fa-eye-slash ms-auto"></i> --></button>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" name="login">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Preloader -->
  <div id="preloader"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
