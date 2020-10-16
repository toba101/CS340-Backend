<?php

/*
 * Accounts controller
*/

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';

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

// Get the value from the action name - value pair
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action){
    case 'register';
    // Filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
    $clientLastname = filter_input(INPUT_POST, 'clientLastname');
    $clientEmail = filter_input(INPUT_POST, 'clientEmail');
    $clientPassword = filter_input(INPUT_POST, 'clientPassword');

// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/register.php';
    exit; 
   }

   // Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, 
$clientPassword);

// Check and report the result
if($regOutcome === 1){
    $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
    include '../view/login.php';
    exit;
   } else {
    $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
    include '../view/register.php';
    exit;
   }

case 'register':
    echo'You are in the register case statement.';
break;

   
switch ($action) {
    case 'login':
// case 'template':
    include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
    break;
    case 'registration':
        include '../view/register.php';

    break;
    default:
    include '../view/home.php';
    break;
}
   }
?>