<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title> PHP Register Homepage | Toba A. Obiwale|CSE 340</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="/phpmotors/css/small.css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" rel="stylesheet" media="screen">

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

       <form method="get" action="account.php"> 
  <fieldset>
  <h3>Register:</h3> <br>
  First name: <br>
  <input type="fname" name="mail" placeholder="first name?"><br>
  Last name: <br>
  <input type="lname" name="mail" placeholder="last name?"><br>
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

