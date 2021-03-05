<?php

if(!$_SESSION || !$_SESSION['loggedin']){
    header('Location: /phpmotors/index.php');
    //include '/phpmotors';
    exit;
    }

?><!DOCTYPE html>
<html lang="en-us">

<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>
</head>

<body>
<main>
<article>

<header>
       <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';
?>  
</header> 

<nav>
  <?php 
  require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; //
  ?>
  </nav>


  <main>
  <article>

  <h1>Update User Information</h1>
  <?php
if (isset($message)) {
 echo $message;
}
?>
<form class="add" action="/phpmotors/accounts/index.php" method="post">
<input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']?>">
<input type="hidden" name="action" value="updateClient">

 <table class="regForm">
     <tr><td>
    <label for="clientFirstname">First Name<abbr class="req">*</abbr></label>
    </td><td>
    <input type="text" id="clientFirstname" name="clientFirstname" 
    <?php
     if(isset($_SESSION['clientData']['clientFirstname'])){ 
        echo "value=".$_SESSION['clientData']['clientFirstname'].""; 
    } 
    ?> required>
 
    
    </td></tr>
    <tr><td>
     <label for="clientLastname">Last Name<abbr class="req">*</abbr></label>
     </td><td>
    <input type="text" id="clientLastname" name="clientLastname" placeholder="Your last name.." 
    <?php
     if(isset($_SESSION['clientData']['clientLastname'])){ 
        echo "value=".$_SESSION['clientData']['clientLastname']."";  
    } 
    ?> required>
    </td></tr>
    <tr><td>
    <label for="clientEmail">Email:<abbr class="req">*</abbr></label>
    </td><td>
    <input type="email" id="clientEmail" name="clientEmail" required placeholder="Enter a valid email address"<?php
      if(isset($_SESSION['clientData']['clientEmail'])){ 
        echo "value=".$_SESSION['clientData']['clientEmail']."";  
    } 
    ?> required>
    </td></tr>
    <tr><td colspan="2">  
        <input type="submit" name="submit" id="regbtn" value="Update User Information">

        </td></tr>
 </table>
</form>
 <form class="add" action="/phpmotors/accounts/index.php" method="post">
<input type="hidden" name="clientId" value="<?php echo $_SESSION['clientData']['clientId']?>">
<input type="hidden" name="action" value="updatePassword">

 <table>
    <tr><td>
    <label for="password">Password:<abbr class="req">*</abbr></label>
  </td><td>
    
 <input type="password" id="clientPassword" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

        <span class="expect">Passwords must be at least 8 characters and contain at least 1 number,
      1 capital letter and 1 special character. </span>
 </td></tr>
 <p>Note: this will change your password.</p>
    <tr><td colspan="2">  
        <input type="submit" name="submit" id="regbtn" value="Update Password">

        </td></tr>
 </table>
</form>

</article>
</main>