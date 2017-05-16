<?php include 'header.php'; ?>
<body class="bg-primary" >
  <div class="container">
      <!--Navigation-->
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
        <a class="text-black" href="about.php">About Us</a>
        <a class="text-black" href="info.php">Info</a>
        <a class="text-black" href="affiliates.php">Partners</a>
        <a class="text-black" href="contact.php">Contact Us</a>
      </div>
    </div>
  </div>
</div>
<!--Contains info text-->
<div class="container">
  <div class="text-center">
    <h4>Why food waste matters</h4>
  </div>
  <div>
    <div class="aboutText">
      <p>47% of wasted food comes from consumers, most of it as avoidable food waste. Avoidable food waste is food that could have been eaten but was thrown away or composted instead. There are three main reasons why food waste is a problem:</p>
      <div class="aboutList">
        <!--Description list for reasons why food waste is important-->
        <dl>
          <dt>Money</dt>
            <dd>Food waste costs Canada $21 Billion a year. Of that, 50% is avoidable waste.
            </dd>
          <dt>Environment</dt>
            <dd>Agriculture uses 80% of the world’s water, 40% of the world’s land, and 10% of the world’s energy. Yet, a third of all food is wasted.
            </dd>
          <dt>Ethics</dt>
            <dd>It is immoral that so many people struggle to find food every day, yet 222 million tonnes of edible food per year goes to waste in developed countries. Even locally, 1 of 8 Canadian families struggle to put food on the table.
          </dd>
        </dl>
      </div>
    </div>
  </div>
  <div class="text-center">
    <h4>How are we trying to help?</h4>
  </div>
  <div class="aboutText">
    <p>Most overripe fruits can still be used in a variety of recipes, but are thrown out because they don’t look good enough. Similarly, wilted produce can often be revived instead of being thrown out.</p>
    <p>Our goal is to provide a simple platform for medium to large sized families, where they can find options for their wilted or overripe produce instead of defaulting to the compost bin.</p>
  </div>
</div>
</body>

<?php include 'footer.php'; ?>
