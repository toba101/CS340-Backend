<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PHP Login Page | Toba A. Obiwale|CSE 340</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/phpmotors/css/small.css" type="text/css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body>

<main>
  <article>  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
  
  <nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
  ?>
  </nav>

  <h1>Sign in</h1>
  <?php
//if (isset($message)) {
 //echo $message;
 if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
 }
?>
<form action="/phpmotors/accounts/index.php" method="post">
  <fieldset>
    <label for="clientEmail">Email Address</label>
    <input name="clientEmail" id="clientEmail" <?php 
    if(isset($clientEmail)){echo "value='$clientEmail'";
    } 
    ?> required>

    <label for="clientPassword">Password:</label>  
    <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
    <label>&nbsp;</label>
    <input type="submit" value="sign-in">
    <input type="hidden" name="action" value="Login">
  </fieldset>
 </form>
  <a href="/phpmotors/accounts/index.php/?action=register-page" id="toreg">Not a member yet?</a>


<hr>


<footer> 
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
</footer>

</article>
</main>

</body>
</html>
