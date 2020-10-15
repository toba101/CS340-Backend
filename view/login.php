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

        
  <fieldset>
  <form method="get" action="/phpmotors/account/index.php">
  <h3>Sign in:</h3><br>
  Email: <br>
  <input type="email" name="mail" placeholder="weather@mail.com"><br>
  Password: <br>
  <input type="password" name="password" required><br>
  </form>
  </fieldset> 

<div class="click">
<button type="submit">Submit</button>
</div>
<br>
<div class="register-button">
  <a href='/phpmotors/accounts/index.php?action=registration'>Register</a>
</div>

<div class="test">
  <p>Logo</p>
</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
  </article>
</main>

</body>
</html>
