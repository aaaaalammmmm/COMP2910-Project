<!DOCTYPE html>
<html>
<head>
  <title>Use-It-Up</title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link href="styles/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <!--The bottom two script tags are for the firebase database to function on our app-->
  <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase-database.js"></script>
  <script>
  //Configurations for the firebase initialization
  var config = {
    apiKey: "AIzaSyCS3TPF_o_6n52S9wevo7sz6k3h3V4FMS8",
    authDomain: "comp2910-b5e23.firebaseapp.com",
    databaseURL: "https://comp2910-b5e23.firebaseio.com",
    projectId: "comp2910-b5e23",
    storageBucket: "comp2910-b5e23.appspot.com",
    messagingSenderId: "230859715437"
  };
  //Initialize firebase application
  firebase.initializeApp(config);

  //Getting an instance of the database
  var database = firebase.database();
  //Enable logging
  firebase.database.enableLogging(true);

  //Set to rootRef to the food node
  var rootRef = database.ref("food");
  </script>
  <!-- The following script tags are for the ajax history for our back button -->
  <script type="text/javascript" src="js/json2005.js"></script>
  <script type="text/javascript" src="js/rsh.compressed.js"></script>

  <script type="text/javascript">
  window.dhtmlHistory.create({
    toJSON: function(o) {
      return JSON.stringify(o);
    }
    , fromJSON: function(s) {
      return JSON.parse(s);
    }
  });

  // Creates a listener for page load functions
  var yourListener = function(newLocation, historyData) {
    // Checks all <food> page values and loads corresponding page
    if (historyData == "allFruits" || historyData == "allVeggies" || historyData == "allGrains") {
      resizeBtn(historyData);
      // Checks null value and loads main page
    } else if (historyData == null) {
      showResult("");
      // If not one of these, loads appropriate food page
    } else {
      searchScroll(historyData.value1);
      $("#livesearch").load("food.php?f=" + historyData.value1 + "&t=" + historyData.value2);
    }
  }

  window.onload = function() {
    dhtmlHistory.initialize();
    dhtmlHistory.addListener(yourListener);
  };
  </script>
</head>
<body class="bg-primary" id="main">
  <div class="container">
    <div class="text-center center-block">
      <a href="index.php">
        <img src="Images/UseItUpBanner v2.0.png"/>
      </a>
    </div>
    <div>
      <div class="hamburger">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      </div>

    </div>
    <div>
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="text-black" href="index.php">Home</a>
        <a class="text-black" href="about.php">About Us</a>
        <a class="text-black" href="info.php">Info</a>
        <a class="text-black" href="affiliates.php">Partners</a>
        <a class="text-black" href="contactus.php">Contact Us</a>
      </div>
    </div>
    <div>
    </div>
