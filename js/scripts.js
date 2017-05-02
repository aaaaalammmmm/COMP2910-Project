// Displays hints, clickable and navigatable, below the search bar with id 'search-box'
// The hints are displayed in a div tag with id 'search-hints'
// Calls the livesearch.php page to get the hint text to display
function showResult(str) {
  if (str.length==0) {
    document.getElementById("search-hints").innerHTML="";
    document.getElementById("search-hints").style.border="0px";
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
// search bar with the 'search-box' id
function load(str) {
  document.getElementById("search-box").value = "";
  $("#livesearch").load(str+'.php');
}

// Live loads a php page in the element with the 'livesearch' id and leaves the
// search bar with id 'search-box' unchanged
function foodLoad(str) {
  $("#livesearch").load(str+'.php');
}
