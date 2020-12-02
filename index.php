<?php

require_once "library/connections.php";
require_once "model/main-model.php";

// Create or access a Session
session_start();

$classifications = getClassifications();
$navList = '<ul class="topnav">';
$navList .= "<li><a href='/phpmotors/index.php' title= 'View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification){
    $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName'])
    ."' title=View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';


$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action) {
   
    default:
    include 'view/home.php';
    exit;
    break;
   
}
?>