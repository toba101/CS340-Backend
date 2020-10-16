<?php
//This is the accounts controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the array of classificationList
$classificationList = getClassifications();
$message="";


//var_dump($classifications);
//exit;

// Build a navigation bar using the $classifications array
$navList = '<nav><ul class="navigation">';
$navList .= "<li><a href='/phpmotors/index.php' title= 'View the PHP Motors home page'>Home</a><li>";
foreach ($classificationList as $classifications) {
    $navList .= "<li><a href='/phpmotors/index.php?action=" .urlencode($classification['classificationName'])
    . "' title=view our $classification[classificationName] product line'<$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

//echo $navList;
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action) {
    case 'vehicle-form':
// case 'template':
    include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
    break;
    case 'vehicle-reg':
      

    break;
    default:
    include '../view/home.php';
    break;
}
?>