<?php include 'header.php'; ?>
<body class="bg-primary" >
  <div class="container">
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed pull-left"
        data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
        </ul>
      </div>
    </div>
  </nav>
</div>
  <div class="container col-xs-12">
    <!-- Main Div tag for the search bar and hints -->
    <div class="col-xs-10 col-xs-offset-1" >
      <h1 class="text-center">Use-It-Up</h1>
      <form class="text-center" onsubmit="return false">
        <input id="search-box" type="text" class="inputBox text-center" size="30" placeholder="Search Foods..." onkeyup="showResult(this.value); foodLoad(this.value)">
        <div id="search-hints"></div>
      </form>
    </div>
    <!-- The div tag for livesearch page loads -->
    <div id="livesearch" class="col-xs-12 padding-lg">
    </div>
    <br />
    <!-- Redirection "buttons" for the main categories of pages -->
    <div class="text-center col-xs-12">
      <div class="row">
        <div class="col-xs-4">
          <a href="javascript:load('allFruits')">
            <img src="/Images/FruitMedley.jpg" alt="All Fruits" /><p>All Fruits</p>
          </a>
        </div>
        <div class="col-xs-4">
          <a href="javascript:load('allVeggies')">
            <img src="/Images/VeggieMedley.jpg" alt="All Veggies"/><p>All Veggies</p>
          </a>
        </div>
        <div class="col-xs-4">
          <a href="javascript:load('allGrains')">
            <img src="/Images/BreadMedley.jpg" alt="All Grains"/><p>All Grains</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include 'footer.php'; ?>
