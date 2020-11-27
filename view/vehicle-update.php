<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?>
<?php
// Get the array of classifications
$classifications = getClassifications();

$classificationDropDown = '<select id="classification" name="classificationId">';
$classificationDropDown .= '<option>Choose a car classification</option>';
foreach ($classificationList as $classification) {
 $classificationDropDown .= "<option value='$classification[classificationId]'";


 if (isset($classificationId)){
  if($classification['classificationId'] === $classificationId){
    $classificationDropDown .= ' selected ';
  }
} elseif(isset($invInfo['classificationId'])){
    if($classification['classificationId'] === $invInfo['classificationId']){
     $classificationDropDown .= ' selected ';
    }
 }
 $classificationDropDown .=">$classification[classificationName]</option>";
}
$classificationDropDown .= '</select>';

?><!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?>PHP Motors Add Vehicle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/phpmotors/css/small.css" type="text/css" rel="stylesheet" media="screen">
  <link href="/phpmotors/css/large.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body>

<main>
  <article>  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?> 
  
  <nav>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php';
  ?>
  </nav>

  <?php
if($message){
echo "<h6 color='red'>".$message."</h6>";
}
?>
<main>
<h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?></h1>
<p>*All fields are required</p>

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
    <input type="text" id="invMake" name="invMake" 
    <?php
    if(isset($invMake)){ 
        echo "value='$invMake'"; } 
        elseif(isset($invInfo['invMake'])) {
            echo "value='$invInfo[invMake]'"; 
    }
    ?> required>
    </td></tr>

    <tr><td>
    <label for="invModel">Model<abbr class="req">*</abbr></label>
    </td><td>
    <input type="text" id="invModel" name="invModel" 
    <?php 
    if(isset($invModel)){ 
        echo "value='$invModel'"; } 
        elseif(isset($invInfo['invModel'])) {
            echo "value='$invInfo[invModel]'";
    }   
    ?> required>
    </td></tr>

    <tr><td>
    <label for="invDescription">Description<abbr class="req">*</abbr></label>
    </td><td>
    <textarea name="invDescription" id="invDescription" required>
<?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
?></textarea>
    </td></tr>

    <tr><td>
    <label for="invImage">Image<abbr class="req">*</abbr></label>
    </td><td>
    <input type="text" id="invImage" name="invImage" value="/phpmotors/images/no-image.png" 
    <?php
    if(isset($invImage)){ 
        echo "value='$invImage'"; } 
        elseif(isset($invInfo['invImage'])) {
            echo "value='$invInfo[invImage]'"; 
    }
    ?> required>
    </td></tr>

    <tr><td>
    <label for="invThumbnail">Thumbnail<abbr class="req">*</abbr></label>
    </td><td>
    <input type="text" id="invThumbnail" name="invThumbnail" value="/phpmotors/images/no-image 2.png" 
    <?php
    if(isset($invThumbnail)){ 
        echo "value='$invThumbnail'"; } 
        elseif(isset($invInfo['invThumbnail'])) {
            echo "value='$invInfo[invThumbnail]'"; 
    }
    ?> required>
    </td></tr>

    <tr><td>
    <label for="invPrice">Price<abbr class="req">*</abbr></label>
    </td><td>
    <input type="text" id="invPrice" name="invPrice" 
    <?php
    if(isset($invPrice)){ 
        echo "value='$invPrice'"; } 
        elseif(isset($invInfo['invPrice'])) {
            echo "value='$invInfo[invPrice]'"; 
    }
    ?> required>
    </td></tr>

    <tr><td>
    <label for="invStock">Stock<abbr class="req">*</abbr></label>
    </td><td>
    <input type="text" id="invStock" name="invStock" 
    <?php
    if(isset($invStock)){ 
        echo "value='$invStock'"; } 
        elseif(isset($invInfo['invStock'])) {
            echo "value='$invInfo[invStock]'"; 
    }
    ?> required>
    </td></tr>

    <tr><td>
    <label for="invColor">Color<abbr class="req">*</abbr></label>
    </td><td>
    <input type="text" id="invColor" name="invColor" 
    <?php
     if(isset($invColor)){ 
        echo "value='$invColor'"; } 
        elseif(isset($invInfo['invColor'])) {
            echo "value='$invInfo[invColor]'"; 
    }
    ?> required>
    </td></tr>

    
   
    <tr><td colspan="2">  
        <input type="submit" name="submit" id="regbtn" value="Update Vehicle">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="updateVehicle">
        <input type="hidden" name="invId" value="
<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
elseif(isset($invId)){ echo $invId; } ?>">
        </td></tr>
 </table>
</form>

</article>
</main>

<footer>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
</footer>

</body>
</html>