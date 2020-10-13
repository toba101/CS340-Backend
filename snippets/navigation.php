<?php
require_once "../library/connections.php";
require_once "../model/main-model.php";

$classifications = getClassifications();
$navList = '<nav><ul class="navigation">';
$navList .= "<li><a href='../phpmotors/index.php' title= 'View the PHP Motors home page'>Home</a><li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='../phpmotors/index.php?action=" . urlencode($classification['classificationName'])
    . "' title=view our $classification[classificationName] product line'<$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

?>








<!--<nav>
     <div class="topnav" id="myTopnav">
       <ul>       
           <li><a href="home.php">Home</a></li>
           <li><a href="classic.php">Classic</a></li>
           <li><a href="sports.php">Sports</a></li>
           <li><a href="suv.php">SUV</a></li>
           <li><a href="truck.php">Truck</a></li>
           <li><a href="used.php">Used</a></li>
       </ul>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
     </div>
  </nav> -->

