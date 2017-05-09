<?php
// This condition checks for livesearch or stand alone page
if (isset($_GET["l"])) {
  include 'food-header.php';
}

?>
<!-- Padding for propper alignment of content -->
<div class="padding-xl"></div>
<!-- Back button -->

<br>
<span onclick="goBack('fruit')" class="glyphicon glyphicon-menu-left "></span>
<!-- Information on a banana -->
<div class="text-center col-xs-12">
    <div id="back-button" class="center-block">
        <img src="images/Banana.png" class="single-food-imagesize" alt="Banana" />
    </div>
  <div>
    <h3>Storage</h3>
    <div id="bananaStorage"></div>
    <h3>Recipes</h3>
    <div id="bananaRecipes"></div>
  </div>
  <!-- Redirection for further info on food state -->
  <div class="row">
    <div class="col-xs-4 pull-left">
      <img src="images/Banana-UR.png" class="single-food-imagesize" alt="Underripe Banana" onclick="bananaInformation('underripe')"/>
      <div>Underripe</div>
    </div>
    <div class="col-xs-4">
      <img src="images/Banana.png" class="single-food-imagesize" alt="Ripe Banana" onclick="bananaInformation('ripe')"/>
      <div>Ripe</div>
    </div>
    <div class="col-xs-4 pull-right">
      <img src="images/Banana-OR.png" class="single-food-imagesize" alt="Overripe Banana" onclick="bananaInformation('overripe')"/>
      <div>Overripe</div>
    </div>
  </div>
</div>
<br />
<script>
//This stores a pointer to all info about bananas
var bananaInfo = rootRef.child("fruit/banana");
//This creates a pointer to the banana storage div
var bananaStorageDiv  = document.getElementById("bananaStorage");
//Test variable
console.log(bananaStorageDiv);
//This creates a pointer to the banana recipes div
var bananaRecipesDiv  = document.getElementById("bananaRecipes");
//Test variable
console.log(bananaRecipesDiv);

//This function will pull the string containing information about storage
//and then assigns it to the storage div
function bananaInformation(state) {
  //This stores the location of the banana storage
  var bananaStateInfo;
  //This stores the string from the database
  var bananaStorageText;
  //This stores the string from the database
  var bananaRecipesText;

  //Go to the child node containing the state for the banana
  bananaStateInfo = bananaInfo.child(state);
  //Create a snapshot of the banana state node
  bananaStateInfo.once("value")
  .then(function(snapshot) {
    //store the contents of the node as a string variable
    bananaStorageText = snapshot.child("storage").val();
    //store the contents of the node as a string variable
    bananaRecipesText = snapshot.child("recipes").val();
    //check to see if it is stored in the variable
    console.log(bananaStorageText);
    //check to see if it is stored in the variable
    console.log(bananaRecipesText);
    //Assign the string as inner html to the storage div
    bananaStorageDiv.innerHTML = bananaStorageText;
    //Assign the string as inner html to the recipes div
    bananaRecipesDiv.innerHTML = bananaRecipesText;
  });
}

onload = bananaInformation("ripe");

</script>
<?php include 'footer.php'; ?>
