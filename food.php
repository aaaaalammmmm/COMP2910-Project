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
<div id="main-content" class="text-center">
  <h3><?php echo ucfirst($food);?></h3>
  <span onclick="" data-toggle="modal" data-target="#share" class="glyphicon glyphicon-share"></span>
  <button class="btn-link glyphicon glyphicon-chevron-left" onclick="prevFood()"></button>
  <img id="image" src=<?php if($food == "bread"){ echo "images/".$food."-S.png";} else if($type == "grains"){ echo "images/".$food."-R.png"; } else {echo "images/".$food.".png"; }?> class="single-food-imagesize" alt=<?php echo $food; ?> />
  <button class="btn-link glyphicon glyphicon-chevron-right" onclick="nextFood()"></button>
  <div class="padding-sm">
    <button class="btn mobile-button accordion-toggle collapsed" data-toggle="collapse" href="#storage" data-target="#storage">Storage</button>
    <div class="storageText">
      <div id="storage" class="text-left collapse "></div>
    </div>
  </div>
  <div class="padding-sm">
    <button class="btn mobile-button accordion-toggle collapsed" data-toggle="collapse" data-target="#recipes">Recipes</button>
    <div id="recipes" class="text-left collapse">
      <div id="recipeText"></div>
    </div>
  </div>
  <!-- Redirection for further info on food state -->
  <div id="ripeness" class="btn-group-justified">
    <div id="button1" class="btn-group">
    </div>
    <div id="button2" class="btn-group">
    </div>
    <div id="button3" class="btn-group">
    </div>
    <!-- Left & centered positioning -->
  </div>
  <div class="padding-sm"></div>
  <div id="share" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-title">
          <br/>
          <p>Share with your friends!</p>
        </div>
      <div class="modal-body">
        <a href="" class="ssk ssk-facebook"></a>
        <a href="" class="ssk ssk-twitter"></a>
        <a href="" class="ssk ssk-pinterest"></a>
      </div>

        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <script>
  //Assign the food and type php variables to Javascript variables
  var food = "<?php echo $food; ?>";
  var type = "<?php echo $type; ?>";
  //Stores the child keys of the food node
  var foodArray = foodKeyArray();
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

  //This function takes the child keys of a food item and
  //adds to an array. The array is returned.
  function stateKeyArray() {
    var stateArray = new Array();

    foodInfo.once("value")
    .then(function(snapshot) {
      //the forEach function enumerates and iterates
      //through all the child nodes of the parent
      snapshot.forEach(function(childSnapshot) {
        //Add to stateArray
        stateArray.push(childSnapshot.key);
      });
    });

    return stateArray;
  }

  //This sets the state buttons in food.php, depending on what sort of states
  //exists in Firebase
  function setButtons() {
    var stateArray = stateKeyArray();

    setTimeout(function () {
      console.log(stateArray);
      console.log(stateArray.length);
      if (stateArray.length === 2) {
        $("#button3").remove();
        foodInformation(stateArray[1]);
        $("#button1").html("<button type='button' class='btn padding-xs state-button btn-highlight' id='" + stateArray[1] + "' onclick='foodInformation(\"" + stateArray[1] + "\")'>" + stateArray[1] + "</button>");
        $("#button2").html("<button type='button' class='btn padding-xs state-button' id='" + stateArray[0] + "' onclick='foodInformation(\"" + stateArray[0] + "\")'>" + stateArray[0] + "</button>");
      } else if (stateArray.length === 3) {
        foodInformation(stateArray[1]);
        $("#button1").html("<button type='button' class='btn padding-xs state-button' id='" + stateArray[2] + "' onclick='foodInformation(\"" + stateArray[2] + "\")'>" + stateArray[2] + "</button>");
        $("#button2").html("<button type='button' class='btn padding-xs state-button btn-highlight' id='" + stateArray[1] + "' onclick='foodInformation(\"" + stateArray[1] + "\")'>" + stateArray[1] + "</button>");
        $("#button3").html("<button type='button' class='btn padding-xs state-button' id='" + stateArray[0] + "' onclick='foodInformation(\"" + stateArray[0] + "\")'>" + stateArray[0] + "</button>");
      }
    }, 2000);
  }

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
      image.src = "<?php echo 'images/'.$food.'-R.png'; ?>";
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
      getRecipes(snapshot);
    });



    //This highlights and de-highlight the states depending on which
    //state is focused
    $("div.btn-group-justified").on("click","div.btn-group button", function(){
      $("div.btn-group").find("button").removeClass("btn-highlight");
      $(this).addClass("btn-highlight");
    });

    //Adds the state to the foodHistory object
    foodHistory.value4 = state;
    //Adds the foodHistory to the ajax history data
    dhtmlHistory.add(food,foodHistory);
  }

  function getRecipes(snapshot){
    jsonhttp = new XMLHttpRequest();
    var url = snapshot.child("recipes").val();

    jsonhttp.open("GET", url, false);
    jsonhttp.send();

    var jsonString = jsonhttp.responseText;
    var obj = JSON.parse(jsonString);

    recipeText.innerHTML = "";

    var counter;
    for(counter = 0; counter < 4; counter++){


      var count;
      var string = "";
      for(count = 0; count < obj.hits[counter].recipe.ingredients.length; count++){
        string += "<p>" + obj.hits[counter].recipe.ingredients[count].text + "<\/p>";
      }

      var recLab = JSON.stringify(obj.hits[counter].recipe.label);
      recLab = recLab.replace(/\"/g, "");
      recipeText.innerHTML += "<div class=\"col-xs-12 recArea padding-sm\"><div><img class=\"padding-xs img-rounded recImg\" src=" +  JSON.stringify(obj.hits[counter].recipe.image) + "alt=" + JSON.stringify(obj.hits[counter].recipe.label) + "<\/img><\/div>" + "<span class=\"recipeTitle padding-sm\"><h4><button type=\"button\" class=\"btn recModal\" data-toggle=\"modal\" data-target=\"#recipeBody" + counter + "\">" + recLab + "<\/button><\/h4><\/span><\/div>";

      recipeText.innerHTML += "<div class=\"modal fade\" id=\"recipeBody" + counter + "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"recipeBody" + counter + "\" aria-hidden=\"true\"><div class=\"modal-dialog\"role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\"><h5 class=\"modal-title\" id=\"recipeBody" + counter + "\">" + recLab + "<\/h5><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;<\/span><\/button><\/div><div class=\"recipeBody\">" + string+ "<\/div><\/div><\/div><\/div>";
    }
    recipeText.innerHTML += "<\/div>";
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
    for(var i = 0; i < foodArray.length; i++) {
      if ((foodArray[i] === food) && (i == foodArray.length - 1)) {
        pageLoad(foodArray[0], type);
      } else if (foodArray[i] === food) {
        pageLoad(foodArray[i + 1], type);
      }
    }
  }



  //Navigate to the previous food item
  function prevFood() {
    for(var i = 0; i < foodArray.length; i++) {
      if ((foodArray[i] === food) && (i == 0)) {
        pageLoad(foodArray[foodArray.length - 1], type);
      } else if (foodArray[i] === food) {
        pageLoad(foodArray[i - 1], type);
      }
    }
  }


  onload = setButtons();

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
