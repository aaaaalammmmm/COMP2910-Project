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
<div class="container">
  <!-- Information on a food item -->
<div class="text-center col-xs-12">
  <h3><?php echo ucfirst($food);?></h3>
  <img id="image" src=<?php echo "images/".$food.".png";?> class="single-food-imagesize" alt=<?php echo $food; ?> />
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
    <br />
  </div>
  <script>

  //Assign the food and type php variables to Javascript variables
  var food = "<?php echo $food; ?>";
  var type = "<?php echo $type; ?>";
  //This stores a pointer to all info about bananas
  var foodInfo = rootRef.child(type + "/" + food);
//This creates a pointer to main image element
  var image      = document.getElementById("image");
  //This function will pull the string containing information about storage
  //and then assigns it to the storage div
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
    //This highlights and de-highlight the states depending on which
    //state is focused
    $("div.btn-group button").click(function(){
      $("div.btn-group").find("button").removeClass("btn-outline");
      $("div.btn-group").find("button").addClass("btn-link");
      $(this).removeClass("btn-link");
      $(this).addClass("btn-outline");
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
