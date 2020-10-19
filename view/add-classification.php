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


  <h2> Add-Classification </h2><br>
  <h4> Classification Name </h4>
  <form action="/phpmotors/vehicles/index.php" method ="post">
  <input type="text" name="classificationName">
  <input type="submit" value="submit">
  <input type="hidden" name="action" value="add-classification">
  </form>
  

 
  
 
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
   

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