// Displays hints, clickable and navigatable, below the search bar with id 'search-box'
// The hints are displayed in a div tag with id 'search-hints'
// Calls the livesearch.php page to get the hint text to display
function showResult(food) {
  resetBtn();
  if (food.length==0) {
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
    document.getElementById("livesearch").innerHTML="";
    resizeBtn("");
    searchScroll("");
    foodLoad("");
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("search-hints").innerHTML=this.responseText;
      document.getElementById("search-hints").style.border="1px solid #A5ACB2";
      searchScroll(food);
    }
  }
  foodLoad(food,type);
  xmlhttp.open("GET","livesearch.php?q="+food,true);
  xmlhttp.send();
}

// Live loads a php page in the element with the 'livesearch' id and clears the
// search bar with the 'search-box' id. If the page to load is one of the all<food>
/// pages, highlights the correct button.
function load(str) {
  document.getElementById("search-box").value = "";
  document.getElementById("search-hints").value = "";
  document.getElementById("search-hints").style.border = "0px";
  $("#livesearch").load(str+'.php');
  // Ignored by most requests
  if (str == "allFruits") {
    if (!document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    if (document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    if (document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
  } else if (str == "allVeggies") {
    if (document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    if (!document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    if (document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
  } else if (str == "allGrains") {
    if (document.getElementById("fruit-btn").classList.contains("btn-highlight")){
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    if (document.getElementById("veggie-btn").classList.contains("btn-highlight")){
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    if (!document.getElementById("grain-btn").classList.contains("btn-highlight")){
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
  }
}

// Live loads a php page in the element with the 'livesearch' id and replaces the
// search bar text with id 'search-box' to the passed string. Removes hint suggestions.
function foodLoad(food,type) {
  searchScroll(food);
  $("#livesearch").load("food.php?f=" + food + "&t=" + type);
  document.getElementById("search-box").value=food;
  document.getElementById("search-hints").innerHTML="";
  document.getElementById("search-hints").style.border="0px";
}

// Dinamically resizes all<food> buttons to proper size
function resizeBtn(str) {
  if(str.length>1){
    load(str);

    if(document.getElementById("livesearch").innerHTML != "") {
      document.getElementById("large-btn").classList.toggle("hidden");
      document.getElementById("small-btn").classList.toggle("hidden");
    } else {
      if (document.getElementById("large-btn").classList.contains("hidden")) {
        document.getElementById("large-btn").classList.toggle("hidden");
      }
      if (!document.getElementById("small-btn").classList.contains("hidden")) {
        document.getElementById("small-btn").classList.toggle("hidden");
      }
    }
  }
}

// Loads a food page with header and footer. AKA a stand alone page
function pageLoad(food,type) {
  location.href = "food.php?l=&f=" + food + "&t=" + type;
}

// Autoscrolls when using livesearch bar
function searchScroll(str) {
  if (str.length <=1) {
    scrollTo(0,0);
  } else {
    document.getElementById("ajax-search").scrollIntoView(true);
  }
}

// Resets the category buttons upon searching
function resetBtn() {
  if (document.getElementById("large-btn").classList.contains("hidden")) {
    document.getElementById("large-btn").classList.toggle("hidden");
    document.getElementById("small-btn").classList.toggle("hidden");
    if(document.getElementById("fruit-btn").classList.contains("btn-highlight")) {
      document.getElementById("fruit-btn").classList.toggle("btn-highlight");
    }
    if(document.getElementById("veggie-btn").classList.contains("btn-highlight")) {
      document.getElementById("veggie-btn").classList.toggle("btn-highlight");
    }
    if(document.getElementById("grain-btn").classList.contains("btn-highlight")) {
      document.getElementById("grain-btn").classList.toggle("btn-highlight");
    }
  }
}

// Goes back to the all<food> page from a stand alone food page
function goBack(str) {
  if (str == "fruit"){
    location.href ="index.php?f=f" ;
  } else if (str == "veggie") {
    location.href ="index.php?f=v";
  } else if (str == "grain") {
    location.href ="index.php?f=g";
  }
}
