<!DOCTYPE html>
<html lang="en">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
</head>

<body>
<main>
<article>

<header>
 <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';?>
</header>

<nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
</nav>

<main>
  <article>  
  
<h1 class="account-heading">Register</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>
<form action="/phpmotors/accounts/index.php" method="post">
<fieldset>
 <label for="clientFirstname">First Name</label>
 <input name="clientFirstname" id="clientFirstname" <?php 
 if(isset($clientFirstname)){echo "value='$clientFirstname'";
} ?> required>
 

<label for="clientLastname">Last Name</label>
 <input type="text" name="clientLastname" id="clientLastname" <?php
 if (isset($clientLastname)) {
   echo "value='$clientLastname'";
} ?> required>

<label for="clientEmail">Email Address</label>
<input name="clientEmail" id="clientEmail" <?php 
if(isset($clientEmail)){echo "value='$clientEmail'";
} ?> required>

<label for="Clientpassword">Password</label>
<input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
 <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
 <label>&nbsp;</label>
<input type="submit" name="submit" id="regbtn" value="Register">

 <input type="hidden" name="action" value="register">
 </fieldset>
 </form>

<hr>
  
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>

</article>
</main>

</body>
</html>
