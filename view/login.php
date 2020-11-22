<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>

<body>

<main>
  <article>  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
  
  <nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
  ?>
  </nav>

<?php
if (isset($message)) {
echo $message;
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

<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
</article>
</main>

</body>
</html>
