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

  <style>
            .bg-image {
            background-image: url('images/login-farm.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
  </style>
</head>
<body class="bg-secondary">
<div class="bg-image d-flex justify-content-center overflow-auto">
<div class="container mt-5">
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
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="card bg-light mb-5">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Sign In</h1>
                        <form action="signupLogic.php" method="POST">
                            
                           

                            <script>
                            document.getElementById('formFile').addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                if (file.size > 9 * 1024 * 1024) { // 9 MB in bytes
                                    alert('The file size must be less than 9 MB.');
                                    event.target.value = ''; // Clear the input
                                }
                            });
                            </script>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label form-label-sm">Avatar</label>
                                <input class="form-control" type="file" id="formFile" accept=".jpg, .jpeg, .png" required>
                                <small id="fileHelp" class="form-text text-muted">File must be less than 9 MB.</small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                            </div>
                            
                        </form>
                        <div class="text-center mt-3">
                            <p>Already have an account? <a href="login.php">Log In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Preloader -->
  <div id="preloader"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
