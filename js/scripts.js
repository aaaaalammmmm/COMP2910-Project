// Displays hints, clickable and navigatable, below the search bar with id 'search-box'
// The hints are displayed in a div tag with id 'search-hints'
// Calls the livesearch.php page to get the hint text to display
function showResult(food) {
  // Calls the resetBtn function
  resetBtn();
  // If 'food' parameter has length 0 do the following:
  //   - Set hints to empty
  //   - Set livesearch div to empty
  //   - Autoscrolls back to the top of page (searchScroll function)
  //   - Forces the livesearch to reload empty (foodLoad function with empty parameters)
  //   - Returns to caller
  if (food.length==0) {
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
    document.getElementById("livesearch").innerHTML="";
    searchScroll("");
    foodLoad("","");
    return;
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
      //   - Sets the hits to the received code and gives it a slight border
      document.getElementById("search-hints").innerHTML=response;
      document.getElementById("search-hints").style.border="1px solid #A5ACB2";
      //document.getElementById("search-hints").size = 30;

      //   - Checks if the response text has the selected string and sets the
      //       type variable accordingly
      if(response.includes("fruit")) {
        type = "fruit";
      } else if(response.includes("veggie")) {
        type = "veggie";
      } else if(response.includes("grains")) {
        type = "grains";
      }
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
// pages, highlights the correct button.
// ------------------
// THIS FUNCTION IS ONLY USED TO LOAD THE ALL <FOOD> PAGES
function load(str) {
  // Sets search bar to empty
  document.getElementById("search-box").value = "";
  // Sets search hints to empty and removes the border
  document.getElementById("search-hints").value = "";
  document.getElementById("search-hints").style.border = "0px";
  // Loads the 'str' page in the 'livesearch' div
  $("#livesearch").load(str+'.php');
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
    //  - Sets the values of the search bar to 'food' parameter
    document.getElementById("search-box").value=food;
    //  - Sets search hitns to empty and removes the border
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";

    // If both parameters are empty:
    //   - Set 'livesearch' div to empty
  } else {
    $("#livesearch").innerHTML = "";
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
  // If 'str' is less than 2 characters ignore function
  if(str.length>1){
    // Calls function to load 'str'
    load(str);
    // Checks if the 'livesearch' div is NOT EMPTY
    if(document.getElementById("livesearch").innerHTML != "") {
      //  - Hides the large buttons (entire screen width)
      document.getElementById("large-btn").classList.toggle("hidden");
      //  - Shows the small buttons (three accross the bottom)
      document.getElementById("small-btn").classList.toggle("hidden");
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
  }
}

// Loads a food page with header and footer. AKA a stand alone page
// NOTE: - This call is slightly different from the one in the foodLoad function
//       - This version has an extra variable that lets the page know that it's
//         a stand alone page rather than a dynamic search
function pageLoad(food,type) {
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

// Resets the category buttons upon searching
function resetBtn() {
  // Checks if the large buttons are hidden
  // If visible, ignore function
  if (document.getElementById("large-btn").classList.contains("hidden")) {
    //  - Hides small buttons
    //  - Displays large buttons
    document.getElementById("large-btn").classList.toggle("hidden");
    document.getElementById("small-btn").classList.toggle("hidden");
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
}

// Goes back to the all<food> page from a stand alone food page
function goBack(str) {
  // Liveloads an all<food> page depending on the parameter passed in
  if (str == "fruit"){
    location.href ="index.php?f=f" ;
  } else if (str == "vegetable") {
    location.href ="index.php?f=v";
  } else if (str == "grains") {
    location.href ="index.php?f=g";
  }
}

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
