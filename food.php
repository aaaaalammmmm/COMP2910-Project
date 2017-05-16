<?php
// This condition checks for livesearch or stand alone page
if (isset($_GET["l"])) {
  include 'food-header.php';
}
if (!isset($type)) {
  $type = $_GET['t'];
}
$food = $_GET['f'];
?>
<div class="text-center col-xs-12">
  <h3><?php echo ucfirst($food);?></h3>
  <img src=<?php echo "images/".$food.".png";?> class="single-food-imagesize" alt=<?php echo $food; ?> />
  <div class="padding-sm">
    <button class="btn mobile-button" data-toggle="collapse" data-target="#storage">Storage</button>
    <div id="storage" class="collapse"></div>
  </div>
  <div class="padding-sm">
    <button class="btn mobile-button" data-toggle="collapse" data-target="#recipes">Recipes</button>
    <div id="recipes" class="collapse"></div>
  </div>
  <!-- Redirection for further info on food state -->
  <div class="row btn-group btn-group-justified">
    <div class="col-xs-4 pull-left">
      <?php if($food === "bread") {
        echo "<button type='button' class='btn-link' id='fresh'><img src='" . "images/" . $food . ".png'" . "class='single-food-imagesize' alt='Fresh " . $food . "' onclick='" . "foodInformation(\"fresh\")'/><p>Fresh</p></button>";
      } else if($type === "grains"){
        echo "<button type='button' class='btn-link' id='raw'><img src='" . "images/" . $food . "-R.png'" . "class='single-food-imagesize' alt='Raw " . $food . "' onclick='" . "foodInformation(\"raw\")'/><p>Raw</p></button>";
      } else {
        echo "<button type='button' class='btn-link'><img src='" . "images/" . $food . "-UR.png'" . "class='single-food-imagesize' alt='Underripe " . $food . "' onclick='" . "foodInformation(\"underripe\")'/><p>Underripe</p></button>";
      }?>
    </div>
    <div class="col-xs-4">
      <?php if($type === "grains") {
        echo "<div></div>";
      }else{
        echo "<button type='button' class='btn-link' id='ripe'><img src='" . "images/" . $food . ".png'" . "class='single-food-imagesize' alt='Ripe " . $food . "' onclick='" . "foodInformation(\"ripe\")'/><p>Ripe</p></button>";
      }?>
    </div>
    <div class="col-xs-4 pull-right">
      <?php if($food === "bread") {
        echo "<button type='button' class='btn-link'><img src='" . "images/" . $food . ".png'" . " class='single-food-imagesize' alt='Stale " . $food . "' onclick='" . "foodInformation(\"stale\")'/><p>Stale</p></button>";
      } else if($type === "grains"){
        echo "<button type='button' class='btn-link'><img src='" . "images/" . $food . "-C.png'" . " class='single-food-imagesize' alt='Cooked " . $food . "' onclick='" . "foodInformation(\"cooked\")'/><p>Cooked</p></button>";
      }else{
        echo "<button type='button' class='btn-link'><img src='" . "images/" . $food . "-OR.png'" . " class='single-food-imagesize' alt='Overripe " . $food . "' onclick='" . "foodInformation(\"overripe\")'/><p>Overripe</p></button>";
      }?>
    </div>
  </div>
  <script>
  //Assign the food and type php variables to Javascript variables
  var food = "<?php echo $food; ?>";
  var type = "<?php echo $type; ?>";
  //Checks to assign if they have been assigned
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

    //Go to the child node containing the state for the banana
    stateInfo = foodInfo.child(state);
    //Create a snapshot of the banana state node
    stateInfo.once("value")
    .then(function(snapshot) {
      //Assign the string as inner html to the storage div
      storageDiv.innerHTML = snapshot.child("storage").val();
      //Assign the string as inner html to the recipes div
      recipesDiv.innerHTML = snapshot.child("recipes").val();
    });
  }

  //This sets the default state
  if (food === "bread") {
    onload = foodInformation("fresh");
    $("#fresh").addClass("btn-outline");
    $("#fresh").removeClass("btn-link");
  } else if (type === "grains") {
    onload = foodInformation("raw");
    $("#raw").addClass("btn-outline");
    $("#raw").removeClass("btn-link");
  } else {
    onload = foodInformation("ripe");
    $("#ripe").addClass("btn-outline");
    $("#ripe").removeClass("btn-link");
  }
  </script>
</div>
<?php include 'footer.php'; ?>
