<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <title> Add Vehicle | Toba A. Obiwale|CSE 340</title>
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
   require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
  ?>
  </nav>

 <h2> Vehicle Management </h2>
 <label for="select">*Note all field are Required:</label><br>
 <select classificationid="Car" id="classificationName">
 <option value="">--Choose Car Classification--</option>
 <option value="suv">SUV</option>
 <option value="classic">Classic</option>
 <option value="sport">Sport</option>
 <option value="truck">Truck</option>
 <option value="used">Used</option>
 </select> <br>

<h4> Make </h4>
<input type="text" id="spring" name="spring" value=""><br>

<h4> Model </h4>
<input type="text" id="spring" name="spring" value=""><br>

<label car="select">Description:</label><br>
<textarea id="comment" name="comment"
  rows="5" cols="33">
 Enter description here!
 </textarea> <br>

 <h4> Image Path </h4>
<input type="text" id="spring" name="spring" value=""><br>

<h4> Thumbnail Path </h4>
<input type="text" id="spring" name="spring" value=""><br>

<h4> Price </h4>
<input type="text" id="spring" name="spring" value=""><br>
<br>

<hr>

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