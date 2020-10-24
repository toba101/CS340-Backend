<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <title>add-Classification Page | Toba A. Obiwale|CSE 340</title>
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

  <h1>Add Car Classification</h1>
<form class="add" action="/phpmotors/vehicles/index.php" method="post">
<table class="regForm">
<tr><td>
<label id="classificationName">Classification Name<abbr class="req">*</abbr></label>
</td><td>
<input type="text" id="cName" name="classificationName">
</td></tr>

<tr><td colspan="2">
<input type="submit" name="submit" id="regbtn" value="Add Classification">
<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="insertClassification">
</td></tr>
</table>
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