<!DOCTYPE html>
<html>
<head>
  <title>Use-It-Up</title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="styles/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
</head>
<body class="bg-primary" >
<div class="container">
  <div class="row top-button">
    <div class="container-fluid">
      <nav class="navbar navbar-default" role="navigation">
        <div>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed pull-left border-0"
                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="visible-xs-block">
              <a href="index.php" >
                <img  class="pull-right test food-size" src="Images/UseItUpBanner v2.0.png"/>
              </a>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a class="text-black" href="about.php">About Us</a></li>
              <li><a class="text-black" href="info.php">Info</a></li>
              <li><a class="text-black" href="affiliates.php">Partners</a></li>
              <li><a class="text-black" href="contact.php">Contact Us</a></li>
            </ul>
            <div>
              <div class="hidden-xs">
                <a href="index.php" >
                  <img  class="center-block pull-right food-size" src="Images/UseItUpBanner v2.0.png"/>
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <h1 class="text-center">Our Partners</h1>
  <div class="row text-center">
    <div class="col-md-4 padding-md"><img src="Images/PlentyOfThymeLogo.png" class="padding-md affiliate-size" alt="Plenty of Thyme Logo"/>
      <p><br/>Plenty of Thyme is a web based grocery application that will keep track of the items in your fridge and their expiry dates. You can input a grocery item, its price, and it's given expiry date. The application will provide a statistic of how much food and money you have wasted to help reduce food waste.</p></div>
    <div class="col-md-4 padding-md">
      <a href="http://foodfall.ca">
        <img src="Images/food-fall-logo.png" class="affiliate-size" alt="Food Fall Logo"/>
      </a>
      <p><br/>Food Fall is a JavaScript based game educating users on the effects of food waste in a fun and interactive environment. See how much produce you can catch without losing, and learn about how to mitigate food waste while having fun.</p>
    </div>
    <div class="col-md-4 padding-md">
      <a href="https://greendeals.me/">
        <img src="Images/GreenDealsLogo.png" class="affiliate-size" alt ="Green Deals Logo"/>
      </a>
      <p><br/>Green Deals is a platform that allows grocers to easily sell food products that are expiring soon. Green Deals endeavours to reduce food waste by ensuring that all food carried by grocery stores is sold to consumers by the best before date. This will reduce food waste at the ground level and provide great deals to consumers.
      </p>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>