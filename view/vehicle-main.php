<!DOCTYPE html>
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
  <?php
   require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';?>
  </nav>

 <div class="content">
 <h2> Add Vehicle </h2>
 <a href="/phpmotors/vehicles?action=add-classification" title="myAccount" target="_self">Add Classification</a><br>
 <a href="/phpmotors/vehicles?action=add-vehicle" title="myAccount" target="_self">Add Vehicle</a>

  
  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
   </footer>

</article>

   </main>

  

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