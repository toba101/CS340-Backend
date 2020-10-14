<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PHP Motors HomePage | Toba A. Obiwale|CSE 340</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="/phpmotors/css/small.css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" rel="stylesheet" media="screen">

</head>

<body>

<main>
  <article> 

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
 
  <nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
  </nav>

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
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