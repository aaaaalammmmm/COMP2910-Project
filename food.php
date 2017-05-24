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
  <button class="btn-link glyphicon glyphicon-chevron-left" onclick="prevFood()"></button>
  <img id="image" src=<?php if($food == "bread"){ echo "images/".$food.".png";} else if($type == "grains"){ echo "images/".$food."-R.png"; } else {echo "images/".$food.".png"; }?> class="single-food-imagesize" alt=<?php echo $food; ?> />
  <button class="btn-link glyphicon glyphicon-chevron-right" onclick="nextFood()"></button>
  <div class="padding-sm">
    <button class="btn mobile-button accordion-toggle collapsed" data-toggle="collapse" href="#storage" data-target="#storage">Storage</button>
    <div class="storageText">
      <div id="storage" class="text-left collapse "></div>
    </div>
  </div>
  <div class="padding-sm">
    <button class="btn mobile-button accordion-toggle collapsed" data-toggle="collapse" href="#recipes" data-target="#recipes">Recipes</button>
    <div id="recipes" class="text-left collapse"></div>
  </div>
  <!-- Redirection for further info on food state -->
  <div id="ripeness" class="btn-group-justified">
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
  <div class="padding-sm"></div>
  <script>
  //Assign the food and type php variables to Javascript variables
  var food = "<?php echo $food; ?>";
  var type = "<?php echo $type; ?>";
  //Stores the child keys of the food node
  var foodArray = foodKeyArray();
  console.log(foodArray);
  //Creates a food item to be added to the ajax history. Added below with the proper state
  //  - Creates complex object for food item
  var foodHistory = new Object();
  //  - Checks if standAlone page or livesearch
  var standAlone = "<?php echo isset($_GET["l"]); ?>";
  //  - Assigns the food to the complex food item variable
  foodHistory.value1 = food;
  //  - Assigns the type to the complex food item variable
  foodHistory.value2 = type;
  //  - Assigns the standAlone condition to the complex food item variable
  foodHistory.value3 = standAlone;
  dhtmlHistory.add(food,foodHistory);

  //This stores a pointer to all info about bananas
  var foodInfo = rootRef.child(type + "/" + food);
  //This creates a pointer to the food item storage div
  var storageDiv = document.getElementById("storage");
  //This creates a pointer to the food item recipes div
  var recipesDiv = document.getElementById("recipes");
  //This creates a pointer to main image element
  var image = document.getElementById("image");

  //This function will pull the string containing information about storage
  //and then assigns it to the storage div
  function foodInformation(state) {
    //This changes the main image icon
    if (state === "ripe" || state === "fresh") {
      image.src = "<?php echo "images/".$food.".png"; ?>";
    } else if (state === "raw") {
      image.src = "<?php echo "images/".$food."-R.png"; ?>";
    } else if (state === "cooked") {
      image.src = "<?php echo "images/".$food."-C.png"; ?>";
    } else if (state === "underripe") {
      image.src = "<?php echo "images/".$food."-UR.png"; ?>";
    } else if (state === "overripe") {
      image.src = "<?php echo "images/".$food."-OR.png"; ?>";
    } else if (state === "stale") {
      image.src = "<?php echo "images/".$food."-S.png"; ?>";
    }

    //Go to the child node containing the state for the food item
    var stateInfo = foodInfo.child(state);

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
    //Adds the state to the foodHistory object
    foodHistory.value4 = state;
    //Adds the foodHistory to the ajax history data
    dhtmlHistory.add(food,foodHistory);
  }

  //This creates a node in foods, and then uses a for each to find each key
  //of the parent node and then assigns them to an array.
  function foodKeyArray() {
    var foodArray = new Array();
    var food      = rootRef.child(type);

    food.once("value")
    .then(function(snapshot) {
      //the forEach function enumerates and iterates
      //through all the child nodes of the parent
      snapshot.forEach(function(childSnapshot) {
        //Add to foodArray
        foodArray.push(childSnapshot.key);
      });
    });

    return foodArray;
  }

  //Navigate to the next food item
  function nextFood() {
    for(let i = 0; i < foodArray.length; i++) {
      if ((foodArray[i] === food) && (i == foodArray.length - 1)) {
        pageLoad(foodArray[0], type);
      } else if (foodArray[i] === food) {
        pageLoad(foodArray[i + 1], type);
      }
    }
  }

  //Navigate to the previous food item
  function prevFood() {
    for(let i = 0; i < foodArray.length; i++) {
      if ((foodArray[i] === food) && (i == 0)) {
        pageLoad(foodArray[foodArray.length - 1], type);
      } else if (foodArray[i] === food) {
        pageLoad(foodArray[i - 1], type);
      }
    }
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

  //Tests for a standAlone page; if true, makes ripeness buttons into a footer
  var standAloneTest = <?php if (isset($_GET['l'])) { echo "1"; } else { echo "0"; } ?>;
  if (standAloneTest == 1){
    //If doesn't have buttons footer class, give it button footer class
    if (!document.getElementById("ripeness").classList.contains("button-footer")){
      document.getElementById("ripeness").classList.toggle("button-footer");
    }
  }
  </script>
</div>
<?php include 'footer.php'; ?>
