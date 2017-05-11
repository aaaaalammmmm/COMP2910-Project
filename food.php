<?php
// This condition checks for livesearch or stand alone page
if (isset($_GET["l"])) {
  include 'food-header.php';
}

$food = $_GET['f'];
$type = $_GET['t'];

?>
<!-- Padding for propper alignment of content -->
<div class="padding-xl"></div>
<!-- Back button -->
<div id="back-button" class="col-xs-12 padding-sm" style="z-index:1">
  <span  class="glyphicon glyphicon-menu-left" onclick="goBack('<?php echo $type ?>')"/>
</div>
<br>
<!-- Information on a food item -->
<div class="text-center col-xs-12">
  <img src=<?php echo "images/".$food.".png";?> class="single-food-imagesize" alt=<?php echo $food; ?> />
  <div>
    <h3>Storage</h3>
    <div id="storage"></div>
    <h3>Recipes</h3>
    <div id="recipes"></div>
  </div>
  <!-- Redirection for further info on food state -->
  <div class="row">
    <div class="col-xs-4 pull-left">
      <?php if($food === "bread") {
        echo "<img src='" . "images/" . $food . ".png'" . "class='single-food-imagesize' alt='Fresh " . $food . "' onclick='" . "foodInformation(\"fresh\")'/>";
        echo "<div>Fresh</div>";
      } else if($type === "grains"){
        echo "<img src='" . "images/" . $food . "-R.png'" . "class='single-food-imagesize' alt='Raw " . $food . "' onclick='" . "foodInformation(\"raw\")'/>";
        echo "<div>Raw</div>";
      } else {
        echo "<img src='" . "images/" . $food . "-UR.png'" . "class='single-food-imagesize' alt='Underripe " . $food . "' onclick='" . "foodInformation(\"underripe\")'/>";
        echo "<div>Underripe</div>";
      }?>
    </div>
    <div class="col-xs-4">
      <?php if($type === "grains") {
        echo "<div></div>";
      }else{
        echo "<img src='" . "images/" . $food . ".png'" . "class='single-food-imagesize' alt='Ripe " . $food . "' onclick='" . "foodInformation(\"ripe\")'/>";
        echo "<div>Ripe</div>";
      }?>
	</div>
    <div class="col-xs-4 pull-right">
      <?php if($food === "bread") {
        echo "<img src='" . "images/" . $food . ".png'" . " class='single-food-imagesize' alt='Stale " . $food . "' onclick='" . "foodInformation(\"stale\")'/>";
        echo "<div>Stale</div>";
      } else if($type === "grains"){
        echo "<img src='" . "images/" . $food . "-C.png'" . " class='single-food-imagesize' alt='Cooked " . $food . "' onclick='" . "foodInformation(\"cooked\")'/>";
        echo "<div>Cooked</div>";
      }else{
        echo "<img src='" . "images/" . $food . "-OR.png'" . " class='single-food-imagesize' alt='Overripe " . $food . "' onclick='" . "foodInformation(\"overripe\")'/>";
        echo "<div>Overripe</div>";
      }?>
    </div>
  </div>
</div>
<br />
<script>
var food = "<?php echo $food; ?>";
var type = "<?php echo $type; ?>";
console.log(food, type);
//This stores a pointer to all info about bananas
var foodInfo = rootRef.child(type + "/" + food);
//This creates a pointer to the food item storage div
var storageDiv  = document.getElementById("storage");
//This creates a pointer to the food item recipes div
var recipesDiv  = document.getElementById("recipes");

//This function will pull the string containing information about storage
//and then assigns it to the storage div
function foodInformation(state) {
  //This stores the location of the banana storage
  var stateInfo;
  //This stores the string from the database
  var storageText;
  //This stores the string from the database
  var recipesText;

  //Go to the child node containing the state for the banana
  stateInfo = foodInfo.child(state);
  //Create a snapshot of the banana state node
  stateInfo.once("value")
  .then(function(snapshot) {
    //store the contents of the node as a string variable
    storageText = snapshot.child("storage").val();
    //store the contents of the node as a string variable
    recipesText = snapshot.child("recipes").val();
    //Assign the string as inner html to the storage div
    storageDiv.innerHTML = storageText;
    //Assign the string as inner html to the recipes div
    recipesDiv.innerHTML = recipesText;
  });
}

if (food === "bread") {
	onload = foodInformation("fresh");
} else if (type === "grains") {
	onload = foodInformation("raw");
} else {
	onload = foodInformation("ripe");
}
</script>
<?php include 'footer.php'; ?>
