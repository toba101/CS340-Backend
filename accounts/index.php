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
//Get the reviews model
require_once '../model/reviews-model.php';


// Get the array of classifications 
$classifications = getClassifications();

$navList = navList($classifications);

//var_dump($classifications);
//exit;

// // Build a navigation bar using the $classifications array
// $navList = '<nav><ul class="navigation">';
// $navList .= "<li><a href='/phpmotors/index.php' title= 'View the PHP Motors home page'>Home</a><li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" .urlencode($classification['classificationName'])
//     . "' title=view our $classification[classificationName] product line'<$classification[classificationName]</a></li>";
// }                
// $navList .= '</ul>';

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
        include '../view/login.php';
        break;
    case 'register-page':
        include '../view/register.php';
        break;
    case 'Login':
        // case 'template':
        // include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
            
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

        //validating email and password format
        $clientEmail = checkEmail($clientEmail);
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
            $_SESSION['loggedin'] = FALSE;
            $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // $_SESSION['email'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
            array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        
    exit;
    break; 

    case 'register':
        //Filter & store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        //Check for existing email
        $existingEmail = checkExistingEmail($clientEmail);

        //Deal with existing email during registration
        if ($existingEmail) {
            $message = '<p>The email address is already registered. Please login or register using a new email address.</p>';
            include '../view/login.php';
            exit;
        }

        //Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/register.php';
            exit;
        }
        //Hash the password for protection!
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        //Insert the data
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        if ($regOutcome === 1) {
            $_SESSION['message'] = "<p>Thanks for registering, $clientFirstname. Please use your email and password to login.</p>";
            setcookie('firstname', $clientFirstname,/* 'lastname', $clientLastname,*/ strtotime('+1 year'), "/");

            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p>Sorry, $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/register.php';
            exit;
        }
        include '../view/register.php';
        break;


    case 'logout':
            session_destroy();
            header('Location: /phpmotors');
    exit;        
    break;
  
//Account Update
    case 'updateClient':
// Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_STRING);
            
        $_SESSION['clientData']['clientFirstname']=$clientFirstname;
        $_SESSION['clientData']['clientLastname']=$clientLastname;
        $_SESSION['clientData']['clientEmail']=$clientEmail;

        $clientEmail = checkEmail($clientEmail);
        // $checkPassword = checkPassword($clientPassword);
            
            // check for existing email
        $existingEmail = checkExistingEmail($clientEmail);

        // Deal with existing email during the registration
        if($existingEmail && $clientEmail != $_SESSION['clientData']['clientEmail']){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit; 
            }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);    
            
        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        // $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, 
        //$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, 
        // $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, 
        // $hashedPassword);

        // Check and report the result
        if($regOutcome === 1){
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
        // $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
        //include '../view/login.php';//
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/register.php';
            exit;
        }

        break;

        case 'clientInfo':
            $clientData = getClientById($_SESSION['clientData']['clientId']);
           
             $_SESSION['clientData'] = $clientData;
               include '../view/client-update.php';
               exit;
             break;

    default:
        include '../view/login.php';
        break;
    }
    ?>