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
  <label for="email">Email</label><br>
  <input type="text" id="email" name="email"><br>
  <label for="password">Password</label><br>
  <input type="password" id="password" name="password"><br>
  <input type="submit" value="sign-in"> 
  <a href="/phpmotors/accounts/index.php/?action=register-page" id="toreg">Not a member yet?</a>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
  </article>
</main>

</body>
</html>
