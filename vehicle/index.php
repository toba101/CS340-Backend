<?php
//Vehicle controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
//Get the Vehicles model
require_once '../model/vehicles-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Get the array of classificationList
$classificationList = getClassifications();
$message="";

// Build a navigation bar using the $classifications array
$navList = '<nav><ul class="navigation">';
$navList .= "<li><a href='../phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
$navList .= "<li><a href='../phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul></nav>';

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL){
$action = filter_input(INPUT_POST, 'action');
}

switch ($action){
case 'insertClassification':

// Filter and store the data
$classificationName = filter_input(INPUT_POST, 'classificationName');

// Check for missing data
if(empty($classificationName)){
$message = '<p>Please provide Classification Name.</p>';
include '../view/add-vehicle.php';
exit;
}

//send the data to the model if no errors exist
$insClass = insertClassification($classificationName);
include '../view/vehicle-man.php';
break;

case 'insertVehicle':

// Filter and store the data
$invMake = filter_input(INPUT_POST, 'invMake');
$invModel = filter_input(INPUT_POST, 'invModel');
$invDescription = filter_input(INPUT_POST, 'invDescription');
$invImage = filter_input(INPUT_POST, 'invImage');
$invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
$invPrice = filter_input(INPUT_POST, 'invPrice');
$invStock = filter_input(INPUT_POST, 'invStock');
$invColor = filter_input(INPUT_POST, 'invColor');
$classificationId = filter_input(INPUT_POST, 'classificationId');
// Check for missing data
/*if(empty($classificationId) ||
empty($invMake) ||
empty($invModel) ||
empty($invDescription) ||
empty($invImage) ||
empty($invThumbnail) ||
empty($invPrice) ||
empty($invStock) ||
empty($invColor)
){
$message = '<p>Please provide all Vehicle information.</p>';
include '../view/add-vehicle.php';
exit;
}*/

//send the data to the model if no errors exist
$insertVehicle = insertVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
$message = "<p>Vehicle information added successfully! </p>";
include '../view/add-vehicle.php';
exit;
break;
case 'add-vehicle':

include '../view/add-vehicle.php';
break;
case 'add-classification':
include '../view/add-classification.php';
break;

default:
include '../view/vehicle-man.php';
}