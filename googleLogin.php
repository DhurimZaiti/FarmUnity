<?php
require_once 'vendor/autoload.php'; // Path to Composer's autoload.php

use Google\Client;
use Google_Service_Oauth2;

// Your Google Client ID
$clientId = '249154977552-qv1rmrl7nqkuorm9vun41d2suclcqeor.apps.googleusercontent.com'; // Replace with your Google Client ID

// Initialize Google Client
$client = new Client();
$client->setClientId($clientId);
$client->setClientSecret('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'); // Replace with your Google Client Secret
$client->setRedirectUri('http://localhost/FarmUnity/FarmUnity/signupLogic.php'); // Replace with your redirect URI if used
$client->addScope('email');
$client->addScope('profile');

// Get the raw POST data
$data = file_get_contents('php://input');
$request = json_decode($data, true);

if (isset($request['id_token'])) {
    $idToken = $request['id_token'];

    try {
        // Verify the ID token and get user info
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        
        // Set the ID token
        $payload = $client->verifyIdToken($idToken);

        if ($payload) {
            // Extract user details
            $googleId = $payload['sub'];
            $name = $payload['name'];
            $email = $payload['email'];

            // Here you should add code to check if the user exists in your database,
            // create a new user if not, and manage user sessions.

            // For example, you might store the user's info in the session or database
            session_start();
            $_SESSION['user_id'] = $googleId;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;

            // Respond with success
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid ID token.']);
        }
    } catch (Exception $e) {
        // Handle errors
        echo json_encode(['success' => false, 'message' => 'Error verifying ID token: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No ID token provided.']);
}
