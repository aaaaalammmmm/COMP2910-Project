<?php include 'header.php'; ?>
<body class="bg-primary" >
  <div class="container">
    <div class="container">
      <div class="col-xs-4">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">
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
              <li><a class="text-black" href="index.php">Home</a></li>
            </ul>
          </div>
        </div>
      </nav>

    </div>
    <div class="col-xs-8">
      <a href="index.php">
        <img src="Images/UseItUpBanner v1.0.png"/>
      </a>
    </div>

    <div class="container col-xs-12">
      <br>
      <!-- Main Div tag for the search bar and hints -->
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
    <div class="text-center" >
      <div id="large-btn" class="btn-toolbar-home">
        <a href="javascript:resizeBtn('allFruits')">
          <button class="btn btn-block">Fruits</button>
        </a>
        <a href="javascript:resizeBtn('allVeggies')">
          <button class="btn btn-block">Veggies</button>
        </a>
        <a href="javascript:resizeBtn('allGrains')">
          <button class="btn btn-block">Grains</button>
        </a>
      </div>
      <div id="small-btn" class="btn-toolbar-other btn-group hidden">
        <a href="javascript:load('allFruits')">
          <button id="fruit-btn" class="btn">Fruits</button>
        </a>
        <a href="javascript:load('allVeggies')">
          <button id="veggie-btn" class="btn ">Veggies</button>
        </a>
        <a href="javascript:load('allGrains')">
          <button id="grain-btn" class="btn ">Grains</button>
        </a>
      </div>
    </div>
  </div>
</body>

<?php include 'footer.php'; ?>
