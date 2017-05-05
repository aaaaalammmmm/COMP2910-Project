// Displays hints, clickable and navigatable, below the search bar with id 'search-box'
// The hints are displayed in a div tag with id 'search-hints'
// Calls the livesearch.php page to get the hint text to display
function showResult(str) {
  if (str.length==0) {
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
    resizeBtn("");
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
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}

// Live loads a php page in the element with the 'livesearch' id and clears the
// search bar with the 'search-box' id. If the page to load is one of the all<food>
/// pages, highlights the correct button.
function load(str) {
  document.getElementById("search-box").value = "";
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
function foodLoad(str) {
  $("#livesearch").load(str+'.php');
  document.getElementById("search-box").value=str;
  document.getElementById("search-hints").innerHTML="";
  document.getElementById("search-hints").style.border="0px";
}

// Dinamically resizes all<food> buttons to proper size
function resizeBtn(str) {
  if(str.length>0){
    load(str);
  }
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
