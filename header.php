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

  //Check and print the root key of the database on browser console
  console.log(database.ref().key);

  //Set to rootRef to the food node
  var rootRef = database.ref("food");
  </script>
</head>
<body class="bg-primary">

