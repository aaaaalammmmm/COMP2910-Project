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
<!--Contains about text-->
<div class="container">
  <div class="text-center">
    <h4>About Us</h4>
  </div>
  <div>
    <div class="aboutText">
      <p>Our team is comprised of five second year students at the British Columbia Institute of Technology, all currently in the Computer Systems Technology diploma. We are highly dedicated and motivated students, as well as close friends.</p>
      <p>When posed with the reduce food waste challenge, we recognized that sociological change of this magnitude should begin by promoting education and awareness. As a team, we decided the best way to tackle this issue was to focus on how a consumer can utilize all of the food they buy, even if it is past its optimal consume stage. Our main inspiration was the banana. In a survey, 41% of canadian citizens said they frequently throw out overripe bananas.</p>
      <p>This led us to create Use It Up, a simple and elegant web application that contains storage tips, revival tips, and recipes for produce in specific stages of ripeness or freshness. Our goal is to minimize the amount of wasted produce by showing consumers what they can create with it. Time permitting, we will also include bulk food preparation, such as drying, pickling, and compost.</p>
    </div>
  </div>
</div>
</body>

<?php include 'footer.php'; ?>
