<header>
       <div class="picture1">
             <img src="/phpmotors/images/site/logo.png" alt="PHP Logo">
       </div>

       <?php 
       if(isset($cookieFirstname)){
echo "<span>Welcome $cookieFirstname</span>";
} ?>

<?php
if ($_SESSION && $_SESSION['loggedin']){
echo '<a href="/phpmotors/accounts?action=logout" title="myAccount" target="_self">Log Out</a>';

}else {
echo '<a href="/phpmotors/accounts?" title="myAccount" target="_self">My Account</a>';
}
?>
</div>
</header>