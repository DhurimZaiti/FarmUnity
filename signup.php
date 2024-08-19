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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <!-- FontAwesome 5 CDN -->
    <link rel="stylesheet" href="font-awsome-5/css/all.min.css">    
    <!-- CSS Links -->
    <link rel="stylesheet" href="css/poppins-font.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sidebar-mdb.css">
    <!-- MDB -->
    <style>
        .bg-image {
            background-image: url('images/login-farm.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>
</head>

<body class="bg-image">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Sign Up</h1>
                        <h1 class="card-title text-center mb-4">Sign Up</h1>
                        <form action="signupLogic.php" method="POST">
                            <!-- Display error if any -->
                            <?php
                            if (isset($_SESSION['signup_error_message'])) {
                                echo "<p class='text-danger'><strong>" . $_SESSION['signup_error_message'] . "</strong></p>";
                                unset($_SESSION['signup_error_message']); // Clear the message after displaying
                            }
                            ?>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required
                                    value="<?php echo isset($_SESSION['signup_data']['username']) ? htmlspecialchars($_SESSION['signup_data']['username']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required
                                    value="<?php echo isset($_SESSION['signup_data']['email']) ? htmlspecialchars($_SESSION['signup_data']['email']) : ''; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="conf_password" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                            </div>
                        </form>
                        <div class="text-center mt-3 mb-3">
                            <p>Already have an account? <a href="login.php">Log In</a></p>
                            <p>Or sign up with:</p>
                            <!-- Google Sign-In Button -->
                            <div class="g-signin2" data-onsuccess="onSignIn"></div>
                            <!-- Facebook Sign-In Button -->
                            <fb:login-button 
                                scope="public_profile,email"
                                onlogin="checkLoginState();">
                            </fb:login-button>
                        </div>
                            <div class="text-center mt-3">
                            <a href="#" class="link-underline link-underline-opacity-0 mx-2">
                                <i class="fab fa-facebook" style="color: #6c757d;"></i> 
                            </a>
                            <a href="#" class="link-underline link-underline-opacity-0 mx-2">
                                <i class="fab fa-google" style="color: #6c757d;"></i>
                            </a>
                        </div>
                            <div class="text-center mt-3">
                            <a href="#" class="link-underline link-underline-opacity-0 mx-2">
                                <i class="fab fa-facebook" style="color: #6c757d;"></i> 
                            </a>
                            <a href="#" class="link-underline link-underline-opacity-0 mx-2">
                                <i class="fab fa-google" style="color: #6c757d;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1019118506432972', // Replace with your Facebook App ID
          cookie     : true,
          xfbml      : true,
          version    : 'v5.1' // Use the current version of the Facebook API
        });
        
        FB.AppEvents.logPageView();
        
        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

      function statusChangeCallback(response) {
        if (response.status === 'connected') {
          // User is logged in and authenticated
          // You can fetch user information or handle login here
          console.log('Logged in');
          console.log(response.authResponse);

          // Send user data to server
          fetch('facebookLogin.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(response.authResponse)
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Redirect to signupLogic.php or handle the successful login
              window.location.href = 'signupLogic.php';
            } else {
              // Handle the error
              console.log('Login error:', data.message);
            }
          })
          .catch(error => console.error('Error:', error));
        } else {
          // User is not logged in
          console.log('Not logged in');
        }
      }

      function checkLoginState() {
        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });
      }

      function onSignIn(googleUser) {
        // Get the Google ID token
        var id_token = googleUser.getAuthResponse().id_token;
        
        // Send the ID token to the server
        fetch('googleLogin.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ id_token: id_token })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Redirect to signupLogic.php or handle the successful login
            window.location.href = 'signupLogic.php';
          } else {
            // Handle the error
            console.log('Login error:', data.message);
          }
        })
        .catch(error => console.error('Error:', error));
      }
    </script>

    <!-- Preloader -->
    <div id="preloader"></div>
    <!-- Bootstrap 5 JS CDN -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
    <script src="js/sidebar.js"></script>
    <!-- OpenLayers API -->
    <script src="https://cdn.jsdelivr.net/npm/ol@latest/ol.js"></script>
</body>
</html>
