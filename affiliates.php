<?php include 'header.php'; ?>
  <div class="container">
    <!--Navigation-->
    <div class="row top-button">
      <div class="col-xs-12">
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
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a class="text-black" href="about.php">About Us</a></li>
                <li><a class="text-black" href="info.php">Info</a></li>
                <li><a class="text-black" href="affiliates.php">Partners</a></li>
                <li><a class="text-black" href="contact.php">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <!--Header code-->
      <div>
        <a href="index.php" >
          <img  class="center-block" src="Images/UseItUpBanner v2.0.png"/>
        </a>
      </div>
    </div>
    <h1 class="text-center">Our Partners</h1>

    <div class="row text-center">
      <div class="col-md-3 padding-md"><img src="Images/PlentyOfThymeLogo.png" class="padding-md affiliate-size" alt="Plenty of Thyme Logo"/>
        <p><br/>Plenty of Thyme is a web based grocery application that will keep track of the items in your fridge as well as their expiry dates.

          Under the weekly view, a bi-weekly calendar will display the items expiring in the next two weeks, which acts as a convenient reminder. You are able to input the grocery item, its price, and its given expiry date-- if a date is not given you are able to refer to our ‘food guide’ chart. You will have the option of deleting items manually or default it to delete itself once it has hit the expiry date. The application will take this information in for a period of time and provide a statistic of how much food and money you have wasted.</p>
      </div>
      <div class="col-md-3 padding-md">
        <a href="http://foodfall.ca">
          <img src="Images/food-fall-logo.png" class="affiliate-size" alt="Food Fall Logo"/>
        </a>
        <p><br/>Food Fall is a JavaScript based game educating users on the effects of food waste - and to have fun too!</p>
      </div>
      <div class="col-md-3 padding-md">
        <a href="https://greendeals.me/">
          <img src="Images/GreenDealsLogo.png" class="affiliate-size" alt ="Green Deals Logo"/>
        </a>
        <p><br/>Green Deals is a new platform that allows grocers to easily sell food products that
          are expiring soon. Green Deals endeavours to reduce food waste by ensuring that
          all food carried by grocery stores is sold to consumers by the best before date. This
          will reduce food waste at the ground level and provide great deals to consumers.</p>
      </div>
      <div class="col-md-3 padding-md">
        <a href="http://refrigedate.me/#/">
          <img src="Images/RefrigedateLogo.png" class="affiliate-size" alt="Refridge Date Logo"/>
        </a>
        <p><br/>Refrigedate is a handy web app that is targeted mainly at families, those with roommates, or anyone that shares a fridge. Refrigedate keeps track of everyones leftovers that are in the fridge and shows what everything is, when it's from, and who it belongs to. By allowing multiple users to easily add, remove, and keep track of whats in their fridge they can make sure that no food goes bad and ultimately goes to waste.</p>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>