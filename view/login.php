<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title> PHP Login HomePage | Toba A. Obiwale|CSE 340</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="/phpmotors/css/small.css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" rel="stylesheet" media="screen">

</head>

<body>

<main>
  <article>  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
  
  <nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
  ?>
  </nav>

        
  <fieldset>
    <form method="get" action="register.php">
  <h3>Sign in:</h3><br>
  Email: <br>
  <input type="email" name="mail" placeholder="weather@mail.com"><br>
  Password: <br>
  <input type="password" name="password" required><br>
</fieldset> 

<div class="butons">
<button type="submit">Submit</button>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
  </article>

</main>
