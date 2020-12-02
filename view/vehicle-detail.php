<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PHP Vehicle Detail Page |CSE 340</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/phpmotors/css/small.css" type="text/css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body>

<main>
  <article>
<header>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
</header>

<nav>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
?>
</nav>

<?php if(isset($message)){
 echo $message; }
 ?>
<?php if(isset($vehicleDetail)){

echo "<table><tr id='both'><td id='thumb'><h2 class='hidden'>Thumbnails</h2>".$vehicleThumbnails."</td><td>".$vehicleDetail."</td></tr></table>";
 } 
 ?>

<hr>

<footer>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
</footer>

</article>
</main>

</body>
</html