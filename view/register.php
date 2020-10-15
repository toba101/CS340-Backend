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

        
  <fieldset>
    <form method="get" action="accounts.php">
  <h3>Register:</h3> <br>
  First name: <br>
  <input type="text" id="fname" name="firstname" placeholder="first name.."><br>
  Last name: <br>
  <input type="text" id="lname" name="lastname" placeholder="last name.."><br>
  Email: <br>
  <input type="email" name="email" placeholder="weather@mail.com"><br>
  Password: <br>
  <input type="password" name="password" required><br>
</form>
</fieldset>

<div class="click">
<button type="submit">Submit</button>
</div>


<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
  </article>

</main>

</body>
</html>
