<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/head.php'; ?>

<body>

<main>
  <article>  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
  
  <nav>
  <?php 
  require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; //
  ?>
  </nav>
  
  

  <div class="content">
  <h2>Welcome to PHP Motors!</h2><br>
  <p><strong>DMC Delorean</strong> <br> 3 Cup holders <br> Superman doors <br> Fuzzy dice!</p>
  </div>

   <div class="buttons">
     <button type="submit">OWN TODAY</button>
   </div>

   <div class="camaro">
     <img src="/phpmotors/images/vehicles/camaro.jpg" alt="Camaro Car">
   </div> 

   <div class="row-container">
     <div class="column-container">
      <div class="row-container">
         <h4>Delorean Upgrade</h4> 
      </div>

   
    <div class="row-container">
   <div class="grid">
      <img src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux Cap">
       <p> Flux Capacitor </p>
   </div>

   <div class="grid">
       <img src="/phpmotors/images/upgrades/flame.jpg" alt="Flame">
       <p>Flame</p>
   </div>
  </div>

   <div class="row-container">
   <div class="grid">
       <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Bumper Sticker">
       <p> Bumper Stickers</p>
   </div>

   <div class="grid">
       <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Hub Cap">
       <p>Hub Cap</p>
   </div>
   </div>

</div><!--close column container-->

<div class="column-container">
<div class="review">
  <h4>DMC Delorean Review</h4>
  <p><strong>.</strong>"So fast its just like traveling in time."(4/5)</p><br>
  <p><strong>.</strong>"Coolest ride on the road." (4/5)</p><br>
  <p><strong>.</strong>"I am feeling Marty McFly." (5/5)</p><br>
  <p><strong>.</strong>"So fast its just like traveling in time." (4/5)</p><br>
  <p><strong>.</strong>"The most futuristic ride of our days." (4.5/5)</p><br>
  <p><strong>.</strong>"80's livivng and i love it." (5/5)<br></p>
</div>
</div><!--close column container-->
</div><!--close row container-->
  
<hr>

 <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
  </article>

</main>
  

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