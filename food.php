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
<div class="text-center">
  <h3><?php echo ucfirst($food);?></h3>
  <img id="image" src=<?php echo "images/".$food.".png";?> class="single-food-imagesize" alt=<?php echo $food; ?> />
  <div class="padding-sm">
    <button class="btn mobile-button" data-toggle="collapse" data-target="#storage">Storage</button>
    <div class="storageText">
      <div id="storage" class="text-left collapse"></div>
    </div>
  </div>
  <div class="padding-sm">
    <button class="btn mobile-button" data-toggle="collapse" data-target="#recipes">Recipes</button>
    <div id="recipes" class="collapse"></div>
  </div>
  <!-- Redirection for further info on food state -->
  <div class="btn-group-justified button-footer">
    <div class="btn-group">
      <?php if($food === "bread") {
        echo "<button type='button' class='btn padding-xs state-button' id='fresh' onclick='foodInformation(\"fresh\")'>Fresh</button>";
      } else if($type === "grains"){
        echo "<button type='button' class='btn padding-xs state-button' id='raw' onclick='foodInformation(\"raw\")'>Raw</button>";
      } else {
        echo "<button type='button' class='btn padding-xs state-button' id=underripe onclick='foodInformation(\"underripe\")'>Underripe</button>";
      }?>
    </div>
      <?php if($type != "grains") {
        echo "<div class=\"btn-group\"><button type='button' class='btn padding-xs state-button btn-highlight' id='ripe' onclick='foodInformation(\"ripe\")'>Ripe</button></div>";
      }?>
    <div class="btn-group">
      <?php if($food === "bread") {
        echo "<button type='button' class='btn padding-xs state-button' onclick='foodInformation(\"stale\")'>Stale</button>";
      } else if($type === "grains"){
        echo "<button type='button' class='btn padding-xs state-button btn-highlight' onclick='foodInformation(\"cooked\")'>Cooked</button>";
      }else{
        echo "<button type='button' class='btn padding-xs state-button' onclick='foodInformation(\"overripe\")'>Overripe</button>";
      }?>
    </div>
  </div>
  <script>
  //Assign the food and type php variables to Javascript variables
  var food = "<?php echo $food; ?>";
  var type = "<?php echo $type; ?>";
  //Adds the page to the ajax history
  var foodHistory = new Object();
  var standAlone = "<?php echo isset($_GET["l"]); ?>";
  foodHistory.value1 = food;
  foodHistory.value2 = type;
  foodHistory.value3 = standAlone;
  dhtmlHistory.add(food,foodHistory);
  //This stores a pointer to all info about bananas
  var foodInfo = rootRef.child(type + "/" + food);
  //This creates a pointer to the food item storage div
  var storageDiv  = document.getElementById("storage");
  //This creates a pointer to the food item recipes div
  var recipesDiv  = document.getElementById("recipes");
  //This creates a pointer to main image element
  var image      = document.getElementById("image");
  //This function will pull the string containing information about storage
  //and then assigns it to the storage div
  function foodInformation(state) {
    if (state === "ripe" || state === "fresh" || state === "stale") {
      image.src = "<?php echo "images/".$food.".png"; ?>";
    } else if (state === "raw") {
      image.src = "<?php echo "images/".$food."-R.png"; ?>";
    } else if (state === "cooked") {
      image.src = "<?php echo "images/".$food."-C.png"; ?>";
    } else if (state === "underripe") {
      image.src = "<?php echo "images/".$food."-UR.png"; ?>";
    } else if (state === "overripe") {
      image.src = "<?php echo "images/".$food."-OR.png"; ?>";
    }
    //This stores the location of the food storage
    var stateInfo;
    //Go to the child node containing the state for the food item
    stateInfo = foodInfo.child(state);
    //Create a snapshot of the food state node
    stateInfo.once("value")
    .then(function(snapshot) {
      //Assign the string as inner html to the storage div
      storageDiv.innerHTML = snapshot.child("storage").val();
      //Assign the string as inner html to the recipes div
      recipesDiv.innerHTML = snapshot.child("recipes").val();
    });
    //This highlights and de-highlight the states depending on which
    //state is focused
    $("div.btn-group button").click(function(){
      $("div.btn-group").find("button").removeClass("btn-highlight");
      $(this).addClass("btn-highlight");
    });
  }

  //This sets the default state
  if (food === "bread") {
    onload = foodInformation("fresh");
    $("#fresh").addClass("btn-outline");
  } else if (type === "grains") {
    onload = foodInformation("raw");
    $("#raw").addClass("btn-outline");
  } else {
    onload = foodInformation("ripe");
    $("#ripe").addClass("btn-outline");
  }

  </script>
</div>
<?php include 'footer.php'; ?>
