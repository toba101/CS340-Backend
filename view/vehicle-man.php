<?php
// Get the array of classifications

if(!$_SESSION['loggedin']){
  header('Location: /phpmotors');
  //include '/phpmotors';
  exit;
  }
  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?><!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <title>Vehicle Main Page | Toba A. Obiwale|CSE 340</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/phpmotors/css/small.css" type="text/css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body>
<main>
<article>

<header>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';
?>  
</header> 

<nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
 ?>
</nav>

 <h2> Vehicle Management </h2>
 <a href="/phpmotors/vehicles?action=add-classification" title="myAccount" target="_self">Add Classification</a><br>
 <a href="/phpmotors/vehicles?action=add-vehicle" title="myAccount" target="_self">Add Vehicle</a>

 <?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Account Management</h2>'; 
 echo '<p class="class">Chose a classification to see those vehicles.</p>'; 
 echo $classificationList; 
}
?>
<noscript>
<p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
</noscript>
<table id="inventoryDisplay"></table>

<hr>

<footer>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
</footer>

</article>
</main>

<script src="../js/inventory.js"></script>
  <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
<?php unset($_SESSION['message']); ?>