<?php
/***********************************************
 * Vehicles  Controller
 *********************************************/

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the database connection file
require_once '../library/functions.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
// require_once '../model/classification-model.php';
// Get the accounts model
require_once '../model/vehicles-model.php';


 // Get the array of classifications
 $classifications = getClassifications();

// var_dump($classifications);
// exit;
// Build a navigation bar using the $classifications array
 $navList = '<ul>';
 $navList .= "<li><a href='/index.php' title='View the PHP Motors home page'>Home</a></li>";
 foreach ($classifications as $classification) {
  $navList .= "<li> <a href='/vehicles/?action=classification&classificationName="
    .urlencode($classification['classificationName']).
    "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a> </li>";
 }
 $navList .= '</ul>';

 $action = filter_input(INPUT_GET, 'action');
 if($action == NULL) {
     $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {
    case 'add-classification':
      if (isset($_SESSION['loggedin']) && $_SESSION['clientData']['clientLevel']>1){
        include '../view/add-classification.php';
      } else {
       header('Location: /index.php');
      }
      break;
    case 'add-vehicle':
      if (isset($_SESSION['loggedin']) && $_SESSION['clientData']['clientLevel']>1){
        include '../view/vehicle-update.php';
      } else {
       header('Location: /index.php');
      }
      break;
    case 'adding-classification':
        // Filter and store the data
        $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING);
      // Check for missing data
      if(empty($classificationName)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/add-classification.php';
        exit;
      }
      
      // Send the data to the model
      $regOutcome = regClassification($classificationName);
      
      // Check and report the result
      if($regOutcome === 1){
        $message = "<p>Thanks for registering $classificationName.</p>";
        // Get the array of classifications
        $classifications = getClassifications();
        // Build a navigation bar using the $classifications array
        $navList = '<ul>';
        $navList .= "<li><a href='/index.php' title='View the PHP Motors home page'>Home</a></li>";
        foreach ($classifications as $classification) {
          $navList .= "<li> <a href='/vehicles/?action=classification&classificationName="
            .urlencode($classification['classificationName']).
            "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a> </li>";
         }
        $navList .= '</ul>';
        include '../view/add-classification.php';
        exit;
      } else {
        $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
        include '../view/add-classification.php';
        exit;
      }

      
      break;
     case 'adding-vehicle':
         // Filter and store the data
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        // Check for missing data
        if(empty($invMake)|| empty($invModel)||empty($invDescription)||empty($invImage)||empty($invThumbnail)||empty($invPrice)||empty($invStock)||empty($invColor)||empty($classificationId) ){
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/add-vehicle.php';
          exit;
        }
        
        // Send the data to the model
        $regOutcome = regVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        
        // Check and report the result
        if($regOutcome === 1){
          $message = "<p>Thanks for registering $invModel.</p>";
          include '../view/add-vehicle.php';
          exit;
        } else {
          $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
          include '../view/add-vehicle.php';
          exit;
        }
        break;
    case 'vehicle':
      if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
      if (isset($_SESSION['loggedin'])  && $_SESSION['clientData']['clientLevel']>1){
        $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-man.php';
      } else {
       header('Location: /index.php');
      }
      break;
    
    case 'mod':
      $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
      $invInfo = getInvItemInfo($invId);
      if(count($invInfo)<1){
        $message = 'Sorry, no vehicle information could be found.';
      }
      include '../view/vehicle-update.php';
      exit;
      break;

    /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ********************************** */ 
    case 'getInventoryItems': 
      // Get the classificationId 
      $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
      // Fetch the vehicles by classificationId from the DB 
      $inventoryArray = getInventoryByClassification($classificationId); 
      // Convert the array to a JSON object and send it back 
      echo json_encode($inventoryArray); 
      break;
    
    case 'updateVehicle':
      $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
      $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
      $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
      $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
      $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
      $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
      $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
      $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
      $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
      
      if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
      $message = '<p>Please complete all information for the updated item! Double check the classification of the item.</p>';
      include '../view/vehicle-update.php';
      exit;
      }
      $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
      if ($updateResult) {
        $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully updated.</p>";
        $_SESSION['message'] = $message;
        header('location: /vehicles/index.php?action=vehicle');
        exit;
       } else {
        $message = "<p>Error. The vehicle was not updated.</p>";
        include '../view/vehicle-update.php';
        exit;
      }
      break;
  case 'del':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
        $message = 'Sorry, no vehicle information could be found.';
      }
      include '../view/vehicle-delete.php';
      exit;
      break;
  case 'deleteVehicle':
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    
    $deleteResult = 'deleteVehicle'($invId);
    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations the, $invMake $invModel was   successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /vehicles/index.php?action=vehicle');
      exit;
    } else {
      $message = "<p class='notice'>Error: $invMake $invModel was not
    deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /vehicles/index.php?action=vehicle');
      exit;
    }
    break;
    case 'classification':
      $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
      $vehicles = getVehiclesByClassification($classificationName);
      if(!count($vehicles)){
       $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
      } else {
       $vehicleDisplay = buildVehiclesDisplay($vehicles);
      }
      include '../view/classification.php';
      break;
    case 'vehicleDetails':
      $invId = filter_input(INPUT_GET, 'invid', FILTER_VALIDATE_INT);
      $vehicleData = getInvItemInfo($invId);
      $_SESSION['vehicleData'] = $vehicleData;
      include '../view/vehicle-detail.php';
      break;
    default:
      $classificationList = buildClassificationList($classifications);
      include '../view/vehicle-man.php';
      break;
   
}