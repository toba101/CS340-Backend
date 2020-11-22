<header>
       <div class="picture1">
             <img src="/phpmotors/images/site/logo.png" alt="PHP Logo">
       </div>
       <?php 
// TODO: checkif you are loggedin and then echo the user name
    //    if(isset($displayUser)) {
    //        echo $displayUser }; 
           ?>
       <div class="account">
       
       <!-- TODO: check if the session logedIn is true then display "logoud link", else display "My account" -->
           <a href='/phpmotors/accounts/index.php?action=login'>My Account</a>
       </div>
</header>