<!DOCTYPE html>
<html>
<head>
  <title>Use-It-Up</title>
  <meta charset="utf-8">
  <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="styles/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  <!--Connects to Firebase Databse-->
  <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
  <script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCS3TPF_o_6n52S9wevo7sz6k3h3V4FMS8",
    authDomain: "comp2910-b5e23.firebaseapp.com",
    databaseURL: "https://comp2910-b5e23.firebaseio.com",
    projectId: "comp2910-b5e23",
    storageBucket: "comp2910-b5e23.appspot.com",
    messagingSenderId: "230859715437"
  };
  firebase.initializeApp(config);
  </script>
</head>
