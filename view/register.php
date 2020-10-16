<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>

<body>

<main>
  <article>  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';?> 
  
  <nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
  ?>
  </nav>

<h1 class="account-heading">Register</h1>

<?php
if (isset($message)) {
 echo $message;
}
?>

 <form action="/phpmotors/accounts/index.php" method="post">
 <fieldset>
 <label for="fname">First Name</label>
 <input type="text" id="fname" name="clientFirstname">
 <label for="lname">Last Name</label>
 <input type="text" id="lname" name="clientLastname">
 <label for="email">Email</label>
 <input type="text" id="email" name="clientEmail">      
 <label for="password">Password</label> 
 <input type="password" id="password" name="clientPassword"> 
 <label>&nbsp;<label>
 <input type="submit" name="submit" id="regbtn" value="Register">
 <!-- Add the action key - value pair -->
 <input type="hidden" name="action" value="register">
 </fieldset>
 </form>
  
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
  </article>
</main>

</body>
</html>
