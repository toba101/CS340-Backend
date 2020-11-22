<?php

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';



// Get the array of classifications
$classifications = getClassifications();

//var_dump($classifications);
//exit;

// Build a navigation bar using the $classifications array
$navList = '<nav><ul class="navigation">';
$navList .= "<li><a href='/phpmotors/index.php' title= 'View the PHP Motors home page'>Home</a><li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=" .urlencode($classification['classificationName'])
    . "' title=view our $classification[classificationName] product line'<$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }

// Get the value from the action name - value pair
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

   
switch ($action) {
    case 'login':
// case 'template':
    // include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
    include '../view/login.php';
    break;

    case 'register-page':
        include '../view/register.php';
    break;

    case 'Login':
        // case 'template':
            // include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
            
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($clientPassword);
        
        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
         $message = '<p class="notice">Please provide a valid email address and password.</p>';
         include '../view/login.php';
         exit;
        }
          
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
          $message = '<p class="notice">Please check your password and try again.</p>';
          include '../view/login.php';
          exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = TRUE;
        // Remove the password from the array
        if($_SESSION['email']){
            $displayUser = "Welcome User " . $_SESSION["email"];
        }
        // else{
        //     header("location:login.php");
        // }
        
        
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;

        case 'register':
            // Filter and store the data
            $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
            $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
            
            $clientEmail = checkEmail($clientEmail);
            $checkPassword = checkPassword($clientPassword);
            
            // check for existing email
            $existingEmail = checkExistingEmail($clientEmail);

            // Deal with existing email during the registration
            if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
            }

            // Check for missing data
            if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/register.php';
            exit; 
            }
            // Hash the checked password
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);    

            // Send the data to the model
            $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, 
            $hashedPassword);

            // Check and report the result
            if($regOutcome === 1) {
                setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');

            $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
            } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/register.php';
            exit;
            }

        
    // break;
    default:
    include '../view/admin.php';
    break;

}
?>