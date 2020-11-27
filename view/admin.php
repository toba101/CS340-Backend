<?php
// Get the array of classifications

if(!$_SESSION || !$_SESSION['loggedin']){
  header('Location: /phpmotors');
  //include '/phpmotors';
  exit;
  }
$classifications = getClassifications();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <title>PHP motors Admin HomePag</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/phpmotors/css/small.css" type="text/css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" type="text/css" rel="stylesheet" media="screen">

</head>

<body>
<main>
<article>

<header>
       <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';
?>  
</header> 

  <nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
  echo $navList?>
  </nav>

  <main>
  <main>
  <h1>Admin User</h1>
  <?php
if(isset($_SESSION['message'])){
echo "<h6 color='red'>".$_SESSION['message']."</h6>";
}
?>
  <?php if(isset($_SESSION['clientData']['clientFirstname'])){
 echo "<h1>".$_SESSION['clientData']['clientFirstname']." ".$_SESSION['clientData']['clientLastname']."</h1>";
//DO I HAVE TO DO A WHOLE NEW ECHO?
} 

?> 
<p>You are logged in.</p>
<ul>
<li><?php
    if(isset($_SESSION['clientData']['clientFirstname'])){
      echo "<p>First Name:".$_SESSION['clientData']['clientFirstname']."</p>";
    }
    ?> </li>
  <li><?php
    if(isset($_SESSION['clientData']['clientLastname'])){
      echo "<p>Last Name:".$_SESSION['clientData']['clientLastname']."</p>";
    }
    ?> </li>  
  <li><?php
    if(isset($_SESSION['clientData']['clientEmail'])){
      echo "<p>Email:".$_SESSION['clientData']['clientEmail']."</p>";
    }
    ?></li>
    <!-- I think I still need to be able to see this if it is an administrator-->
   <!-- DO I NEED THE li????-->
 <!-- <li>
    //<php
    //if(isset($_SESSION['clientData']['clientLevel'])){
      //echo "<p>Client Level:".$_SESSION['clientData']['clientLevel']."</p>";
    //} 
    ></li>-->
  <!--<input type="hidden" name="action" value="updateUser">
        <input type="hidden" name="invId" value="
<php if(isset($clientData['clientLevel'])){ echo $clientData['clientLevel'];} 
elseif(isset($clientLevel)){ echo $clientLevel; } >"> -->
<h2>Account Management</h2>
<p>Use this link to update account information.</p>
<a href="/phpmotors/accounts?action=clientInfo">Update Client Information</a>

</ul>

<?php if($_SESSION['clientData']['clientLevel'] >1){
  echo '<link href="/phpmotors/css/small.css" rel="stylesheet">';
  echo "<h2>Inventory Management</h2>";
  echo "<p>Use this link to mange the inventory.</p>";
  echo "<a href='/phpmotors/vehicles'>Vehicle Management</>";
}?>
  
</main>
  </main>
  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
   </footer>

</article>

   

  

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>