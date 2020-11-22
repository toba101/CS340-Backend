

<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <title>Add Vehicle Page | Toba A. Obiwale|CSE 340</title>
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
  <?php
   require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';?>
  </nav>

<h1>Add Vehicle</h1>
<?php
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/vehicles-model.php';

// Get the array of classifications
#$classifications = getClassifications();

// $classificationDropDown = '<select id="classification" name="classificationId">';
// $classificationDropDown .= '<option>Choose a car classification</option>';
// foreach ($classificationList as $classification) {
// $classificationDropDown .= "<option value='".$classification['classificationId']."'>".$classification['classificationName']."</option>";
// }
// $classificationDropDown .= '</select>';


$classificationDropDown = '<select id="classification" name="classificationId">';
$classificationDropDown .= '<option>Choose a car classification</option>';
foreach ($classificationList as $classification) {
  $classificationDropDown .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
      if($classification['classificationId'] === $classificationId) {
        $classificationDropDown .= 'selected';
      }
    }
  $classificationDropDown .= ">$classification[classificationName]</option>";
}
$classificationDropDown .= '</select>';



if($message){
    echo "<h6 color='red'>".$message."</h6>";
    }
    ?>

<form class="add" action="/phpmotors/vehicles/index.php" method="post">
<table class="regForm">
<tr><td>
<label id="classificationId">Classification<abbr class="req">*</abbr></label>
</td><td>
<?php echo $classificationDropDown; ?>
</td></tr>

<tr><td>
<label for="invMake">Make<abbr class="req">*</abbr></label>
</td><td>
<input type="text" id="invMake" name="invMake" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required>
</td></tr>

<tr><td>
<label for="invModel">Model<abbr class="req">*</abbr></label>
</td><td>
<input type="text" id="invModel" name="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} ?>required> 
</td></tr>

<tr><td>
<label for="invDescription">Description<abbr class="req"></abbr></label>
</td><td>
<!-- <input type="text" id="invDescription" name="invDescription" required> -->
<textarea id="invDescription" name="invDescription" required><?php if(isset($invDescription)){echo $invDescription;} ?></textarea>
</td></tr>

<tr><td>
<label for="invImage">Image<abbr class="req">*</abbr></label>
</td><td>
<input type="text" id="invImage" name="invImage" value="/phpmotors/images/no-image.png" required>
</td></tr>

<tr><td>
<label for="invThumbnail">Thumbnail<abbr class="req">*</abbr></label>
</td><td>
<input type="text" id="invThumbnail" name="invThumbnail" value="/phpmotors/images/no-image 2.png" required>
</td></tr>

<tr><td>
<label for="invPrice">Price<abbr class="req">*</abbr></label>
</td><td>
<input type="number" id="invPrice" name="invPrice" required>
</td></tr>

<tr><td>
<label for="invStock">Stock<abbr class="req">*</abbr></label>
</td><td>
<input type="number" id="invStock" name="invStock" required>
</td></tr>

<tr><td>
<label for="invColor">Color<abbr class="req">*</abbr></label>
</td><td>
<input type="text" id="invColor" name="invColor" required>
</td></tr>



<tr><td colspan="2">
<input type="submit" name="submit" id="regbtn" value="Add Vehicle">
<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="insertVehicle">
</td></tr>
</table>
</form>

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