<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="249154977552-qv1rmrl7nqkuorm9vun41d2suclcqeor.apps.googleusercontent.com">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Sign Up</h1>
                        <form action="signupLogic.php" method="POST">
                            <!-- Display error message if any -->
                            <?php
                            if (isset($_SESSION['signup_error_message'])) {
                                echo "<p class='text-danger'><strong>" . $_SESSION['signup_error_message'] . "</strong></p>";
                                unset($_SESSION['signup_error_message']); // Clear the message after displaying
                            }
                            ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required
                                    value="<?php echo isset($_SESSION['signup_data']['username']) ? htmlspecialchars($_SESSION['signup_data']['username']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required
                                    value="<?php echo isset($_SESSION['signup_data']['email']) ? htmlspecialchars($_SESSION['signup_data']['email']) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
