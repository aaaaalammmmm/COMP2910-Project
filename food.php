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
<br>
<!-- Information on a food item -->
<div class="text-center col-xs-12">
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
  <br />
	<script>
		//Stores the food and type variables from the url as a Javascript string
		var food = "<?php echo $food; ?>";
		var type = "<?php echo $type; ?>";
		//Check if they have successfully been assigned
		console.log(food, type);
		//This stores a pointer to all info about bananas
		var foodInfo = rootRef.child(type + "/" + food);
		//This creates a pointer to the food item storage div
		var storageDiv = document.getElementById("storage");
		//This creates a pointer to the food item recipes div
		var recipesDiv = document.getElementById("recipes");

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
				//Assign the string of html code from the database as inner html to the storage div
				storageDiv.innerHTML = snapshot.child("storage").val();
				//Assign the string of html code from the database as inner html to the recipes div
				recipesDiv.innerHTML = snapshot.child("recipes").val();
			});
		  
			//When a food state button is clicked, remove all current btn-outline css, reapply btn-link,
			//and then remove btn-link and reapply btn-outline for the specific state button clicked.
			$("div.btn-group button").click(function(){
				$("div.btn-group").find("button").removeClass("btn-outline");
				$("div.btn-group").find("button").addClass("btn-link");
				$(this).removeClass("btn-link");
				$(this).addClass("btn-outline");
			});  
		}
		
		//This loads a default state according the food item selected
		if (food === "bread") {
			onload = foodInformation("fresh");
			$("#fresh").removeClass("btn-link");
			$("#fresh").addClass("btn-outline");
		} else if (type === "grains") {
			onload = foodInformation("raw");
			$("#raw").removeClass("btn-link");
			$("#raw").addClass("btn-outline");
		} else {
			onload = foodInformation("ripe");
			$("#ripe").removeClass("btn-link");
			$("#ripe").addClass("btn-outline");
		}
	</script>
</div>
<?php include 'footer.php'; ?>
