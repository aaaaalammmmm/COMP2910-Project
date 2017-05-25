// Displays hints, clickable and navigatable, below the search bar with id 'search-box'
// The hints are displayed in a div tag with id 'search-hints'
// Calls the livesearch.php page to get the hint text to display
function showResult(food) {
  // If 'food' parameter has length 0 do the following:
  //   - Forces the livesearch to reload empty (foodLoad function with empty parameters)
  //   - Autoscrolls back to the top of page (searchScroll function)
  //   - Calls the resizeBtn function with empty string
  //   - Calls the resetBtn function
  //   - Returns to caller
  if (food.length==0) {
    foodLoad("","");
    searchScroll("");
    resizeBtn("");
    resetBtn();
    return;
  }
  //For easter egg lol
  if (food === "soylent green") {
    foodLoad("soylent-green","vegetable");
  } else if (food === "slurm") {
    foodLoad("slurm","vegetable");
  } else if (food === "tomacco") {
    foodLoad("tomacco","vegetable");
  } else if (food === "krabby patty") {
    foodLoad("krabby-patty","vegetable");
  } else if (food === "popplers") {
    foodLoad("popplers","vegetable");
  }
  // If 'food' parameter has length > 1 do the following:
  //   - Creates an XMLHttpRequest to receive data from a file
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  //   - Creates variables to store the type of the food
  var type = "";
  //   - Calls anonimous function everytime a key is released
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      //   - Sets text received from php file to a variable
      var response = this.responseText;
      //   - Checks if the response text has the selected string and sets the
      //       type variable accordingly
      if(response.includes("fruit")) {
        type = "fruit";
      } else if(response.includes("vegetable")) {
        type = "vegetable";
      } else if(response.includes("grains")) {
        type = "grains";
      }
      //   - Sets the hits to the received code and gives it a slight border
      document.getElementById("search-hints").innerHTML=response;
      document.getElementById("search-hints").style.border="1px solid #A5ACB2";
      // Live loads the 'food' with the 'type'
      foodLoad_dynamic(food,type);
    }
  }
  //   - Sends 'food' parameter to livesearch.php via GET['q']
  //   - Receives data from livesearch.php
  xmlhttp.open("GET","livesearch.php?q="+food,true);
  xmlhttp.send();
}
// Live loads a php page in the element with the 'livesearch' id and clears the
// search bar with the 'search-box' id. If the page to load is one of the all<food>
// pages, highlights the correct button. If the page to load if 'home' it blanks
// the 'livesearch' div.
// ------------------
// Adds the page loaded to the browser history
// ------------------
// THIS FUNCTION IS ONLY USED TO LOAD THE ALL <FOOD> PAGES AND THE HOME LANDING PAGE
function load(str) {
  // Sets search bar to empty
  document.getElementById("search-box").value = " ";
  // If str is anything but 'home'
  if (str == "home") {
    // Loads the blank landing page
    document.getElementById("livesearch").innerHTML = " ";
  } else {
    // Loads the 'str' page in the 'livesearch' div
    $("#livesearch").load(str+'.php');
  }

  //Object for history
  var historyObj = {page: str};
  //Adds to history
  history.pushState(historyObj, str, "#"+str);

  //Ensures the search bar and hints are blank
  foodLoad(""," ");
  if (str == "home") {
    showResult("");
  }
  // Checks the 'str' parameter against pre-determined strings
  //  - If fruit
  if (str == "allFruits") {
    //  - If Fruits button isn't highlighted -> toggle highlight class
    //       (makes sure button IS highlighted)
    if (!document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    //  - If Veggies button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    //  - If Grains button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
    //  - If veggie
  } else if (str == "allVeggies") {
    //  - If Fruits button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    //  - If Veggies button isn't highlighted -> toggle highlight class
    //       (makes sure button IS highlighted)
    if (!document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    //  - If Grains button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
    //  - If grain
  } else if (str == "allGrains") {
    //  - If Fruits button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    //  - If Veggies button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    //  - If Grains button isn't highlighted -> toggle highlight class
    //       (makes sure button IS highlighted)
    if (!document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
  }
}

// A clone of the load(str) fucntion with the exception that it does not update
// the history. Necessary for proper redirection
function loadHistory(str) {
  // Sets search bar to empty
  document.getElementById("search-box").value = " ";
  // If str is anything but 'home'
  if (str == "home") {
    // Loads the blank landing page
    document.getElementById("livesearch").innerHTML = "";
  } else {
    // Loads the 'str' page in the 'livesearch' div
    $("#livesearch").load(str+'.php');
  }
  //Ensures the search bar and hints are blank
  foodLoad(""," ");
  if (str == "home") {
    showResult("");
  }
  // Checks the 'str' parameter against pre-determined strings
  //  - If fruit
  if (str == "allFruits") {
    //  - If Fruits button isn't highlighted -> toggle highlight class
    //       (makes sure button IS highlighted)
    if (!document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    //  - If Veggies button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    //  - If Grains button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
    //  - If veggie
  } else if (str == "allVeggies") {
    //  - If Fruits button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    //  - If Veggies button isn't highlighted -> toggle highlight class
    //       (makes sure button IS highlighted)
    if (!document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    //  - If Grains button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
    //  - If grain
  } else if (str == "allGrains") {
    //  - If Fruits button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    //  - If Veggies button is highlighted -> toggle highlight class
    //       (makes sure button is NOT highlighted)
    if (document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    //  - If Grains button isn't highlighted -> toggle highlight class
    //       (makes sure button IS highlighted)
    if (!document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
  }
}

// Live loads a php page in the element with the 'livesearch' id and replaces the
// search bar text with id 'search-box' to the passed string. Removes hint suggestions.
function foodLoad(food,type) {
  // If parameters 'food' and 'type' are not empty do the following:
  if (food != "" && type != "") {
    //  - Scroll 'livesearch' to top for max readability
    searchScroll(food);
    //  - Dynamically loads the food item from dynamically created food.php page
    //    (uses parameter passed in as guidelines on which food page to create)
    $("#livesearch").load("food.php?f=" + food + "&t=" + type);
    //Object for history
    var historyObj = {page: food, type: type, live: true};
    //Adds to history
    history.pushState(historyObj, food, "#"+food);
    //  - Sets the values of the search bar to 'food' parameter
    document.getElementById("search-box").value=food;
    //  - Sets search hitns to empty and removes the border
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";

    // If both parameters are empty:
    //   - Set 'livesearch' div to empty
  } else if (type == " ") {
    //  - Sets search hitns to empty and removes the border
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
    //Resizes the buttons to the footer version and back
    resizeBtn_blank();
  } else {
    document.getElementById("livesearch").innerHTML="";
    //  - Sets search hitns to empty and removes the border
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
  }
}

// A clone of foodload without the history event
function foodLoadHistory(food,type) {
  // If parameters 'food' and 'type' are not empty do the following:
  if (food != "" && type != "") {
    //  - Scroll 'livesearch' to top for max readability
    searchScroll(food);
    //  - Dynamically loads the food item from dynamically created food.php page
    //    (uses parameter passed in as guidelines on which food page to create)
    $("#livesearch").load("food.php?f=" + food + "&t=" + type);
    //  - Sets the values of the search bar to 'food' parameter
    document.getElementById("search-box").value=food;
    //  - Sets search hitns to empty and removes the border
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";

    // If both parameters are empty:
    //   - Set 'livesearch' div to empty
  } else if (type == " ") {
    //  - Sets search hitns to empty and removes the border
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
    //Resizes the buttons to the footer version and back
    resizeBtn_blank();
  } else {
    document.getElementById("livesearch").innerHTML="";
    //  - Sets search hitns to empty and removes the border
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
  }
}

// NOTE: Pretty much a clone of the foodLoad function. Does NOT reset hints
//       or search bar
// Live loads a php page in the element with the 'livesearch' id and replaces the
// search bar text with id 'search-box' to the passed string. Removes hint suggestions.
function foodLoad_dynamic(food,type) {
  // If parameters 'food' and 'type' are not empty do the following:
  if (food != "" && type != "") {
    //   - Creates an XMLHttpRequest to receive data from a file
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    // Variable to track if livesearch should load or not
    canLoad = "false";

    xmlhttp.onreadystatechange=function() {
      if (this.readyState == 4 && this.status == 200) {
        canLoad = this.responseText;
        if(canLoad == "true") {
          //  - Scroll 'livesearch' to top for max readability
          searchScroll(food);
          //  - Dynamically loads the food item from dynamically created food.php page
          //    (uses parameter passed in as guidelines on which food page to create)
          $("#livesearch").load("food.php?f=" + food + "&t=" + type);
          //Object for history
          var historyObj = {page: food, type: type, live: true};
          //Adds to history
          history.pushState(historyObj, food, "#"+food);
          ///Makes the hints blank
          document.getElementById("search-hints").innerHTML="";
          document.getElementById("search-hints").style.border="0px";
          //Resizes the buttons to the footer version and back
          resizeBtn(food);
        }
      }
    }
    //   - Sends 'food' parameter to liveload.php via GET['q']
    //   - Receives data from liveload.php
    xmlhttp.open("GET","liveload.php?q="+food,true);
    xmlhttp.send();

    // If both parameters are empty:
    //   - Set 'livesearch' div to empty
  } else {
    $("#livesearch").innerHTML = "";
  }
}

// Dinamically resizes all<food> buttons to proper size
function resizeBtn(str) {
  // If 'str' is less than 1 character ignore function
  if(str.length!=0){
    // Calls function to load 'str' if 'str' is an all<food> page
    if (str == "allGrains" || str == "allFruits" || str == "allVeggies") {
      load(str);
    }
    // Checks if the 'livesearch' div is NOT EMPTY
    if(document.getElementById("livesearch").innerHTML != "" || str != "") {
      // - If large buttons are NOT hidden
      if (!document.getElementById("large-btn").classList.contains("hidden")){
        //  - Hides the large buttons (entire screen width)
        document.getElementById("large-btn").classList.toggle("hidden");
      }
      // - If small buttons ARE hidden
      if (document.getElementById("small-btn").classList.contains("hidden")) {
        //  - Shows the small buttons (three accross the bottom)
        document.getElementById("small-btn").classList.toggle("hidden");
      }
      // If 'livesearch' div IS EMPTY
    } else {
      //  - If large buttons are hidden, make them visible
      if (document.getElementById("large-btn").classList.contains("hidden")) {
        document.getElementById("large-btn").classList.toggle("hidden");
      }
      //  - If small buttons are NOT hidden, hide them
      if (!document.getElementById("small-btn").classList.contains("hidden")) {
        document.getElementById("small-btn").classList.toggle("hidden");
      }
    }
  } else {
    // Checks if the 'livesearch' div is NOT EMPTY
    if(document.getElementById("livesearch").innerHTML != "") {
      // - If large buttons are NOT hidden
      if (!document.getElementById("large-btn").classList.contains("hidden")){
        //  - Hides the large buttons (entire screen width)
        document.getElementById("large-btn").classList.add("hidden");
      }
      // - If small buttons ARE hidden
      if (document.getElementById("small-btn").classList.contains("hidden")) {
        //  - Shows the small buttons (three accross the bottom)
        document.getElementById("small-btn").classList.remove("hidden");
      }
      // If 'livesearch' div IS EMPTY
    } else if (str== ""){
      //  - If large buttons are hidden, make them visible
      if (document.getElementById("large-btn").classList.contains("hidden")) {
        document.getElementById("large-btn").classList.toggle("hidden");
      }
      //  - If small buttons are NOT hidden, hide them
      if (!document.getElementById("small-btn").classList.contains("hidden")) {
        document.getElementById("small-btn").classList.toggle("hidden");
      }
    }
  }
}

// Dinamically resizes all<food> buttons to proper size
function resizeBtn_blank() {
  // Checks if the 'livesearch' div is NOT EMPTY
  if(document.getElementById("livesearch").innerHTML != "") {
    // - If large buttons are NOT hidden
    if (!document.getElementById("large-btn").classList.contains("hidden")){
      //  - Hides the large buttons (entire screen width)
      document.getElementById("large-btn").classList.add("hidden");
    }
    // - If small buttons ARE hidden
    if (document.getElementById("small-btn").classList.contains("hidden")) {
      //  - Shows the small buttons (three accross the bottom)
      document.getElementById("small-btn").classList.remove("hidden");
    }
  }
}

// Loads a food page with header and footer. AKA a stand alone page
// NOTE: - This call is slightly different from the one in the foodLoad function
//       - This version has an extra variable that lets the page know that it's
//         a stand alone page rather than a dynamic search
function pageLoad(food,type) {
  //Object for history
  var historyObj = {page: food, type: type, live: false};
  //Adds to history
  history.pushState(historyObj, food, "#"+food);
  location.href = "food.php?l=&f=" + food + "&t=" + type;
}

// A clone of pageLoad without a historyevent
function pageLoadHistory(food,type) {
  location.href = "food.php?l=&f=" + food + "&t=" + type;
}

// Autoscrolls when using livesearch bar
function searchScroll(str) {
  //  - If 'str' is less than 2 characters, scroll to top
  if (str.length <1) {
    scrollTo(0,0);
    //  - Scrolls the 'ajax-search' element to the top
  } else {
    document.getElementById("ajax-search").scrollIntoView(true);
  }
}

function autoScroll(element){
  var target = element.getAttribute("data-target");
  $(checkForChanges);

  function checkForChanges() {
    if ($(target).hasClass('in')) {
      element.scrollIntoView(true);
    } else {
      setTimeout(checkForChanges, 50);
    }
  }
}

// Resets the category buttons upon searching
function resetBtn() {
  // Checks if Fruit button is highlighted, removes highlight
  if(document.getElementById("fruit-btn").classList.contains("btn-highlight")) {
    document.getElementById("fruit-btn").classList.toggle("btn-highlight");
  }
  // Checks if Veggie button is highlighted, removes highlight
  if(document.getElementById("veggie-btn").classList.contains("btn-highlight")) {
    document.getElementById("veggie-btn").classList.toggle("btn-highlight");
  }
  // Checks if Grain button is highlighted, removes highlight
  if(document.getElementById("grain-btn").classList.contains("btn-highlight")) {
    document.getElementById("grain-btn").classList.toggle("btn-highlight");
  }
}

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
  document.getElementById("mySidenav").style.width = "80%";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

/* Displays information about fridge shelf onto page */
function get_fridge_info(shelf) {
  console.log("calling get_fridge_info()");
  var fridge_element = document.getElementById("fridge_info");
  var reference = database.ref('fridge/'+'shelf-'+shelf).once('value').then(function(snapshot) {
    var info = snapshot.val();
    console.log(info);
    fridge_element.innerHTML = info;
  });
  console.log(reference);
}
