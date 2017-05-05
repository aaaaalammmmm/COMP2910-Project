<br />
<!-- Information on a banana -->
<script>
	var bananaStorage = rootRef.child("fruit/banana/ripe");
	var bananaDiv     = document.getElementById("bananaStorage");	
	
	var bananaStorageTextNode;
	var bananaStorageText;
	
	//Create a snapshot of the ripe banana node
	bananaStorage.once("value")
	.then(function(snapshot) {
		//store the contents of the node as a string variable
		bananaStorageText = snapshot.child("storage").val();
		//check to see if it is stored in the variable
		console.log(bananaStorageText);
		//Assign the string as inner html to the div		
		bananaDiv.innerHTML = bananaStorageText;
	});
</script>
<div class="text-center">
  <img src="Images/Banana.png" alt="Ripe Banana" />
  <div>
    <h3>Storage</h3>
	<div id="bananaStorage"></div>
  </div>
  <!-- Redirection for further info on food state -->
  <div>
    <div>
      <a href="">Recipes</a>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <a href='javascript:foodLoad("banana-underripe")' style="cursor: pointer;">
        <img src="" alt="Underripe Banana" />
        <div>Underripe</div>
      </a>
    </div>
    <div class="col-xs-6">
      <a href='javascript:foodLoad("banana-overripe")' style="cursor: pointer;">
        <img src="" alt="Overripe Banana" />
        <div>Overripe</div>
      </a>
    </div>
  </div>
</div>
<br />
