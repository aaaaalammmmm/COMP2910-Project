<?php include 'header.php'; ?>
<body class="bg-primary" >
  <div class="container">
      <div>
          <div>
              <a href="index.php" >
                  <img  class="center-block" src="Images/UseItUpBanner v2.0.png"/>
              </a>
          </div>
      </div>
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
                      <li><a class="text-black" href="index.php">Long text string thing</a></li>
                  </ul>
              </div>
        </div>
      </nav>
    </div>
  </div>
  <div>
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
    <div class="btn-toolbar-home">
      <a href="javascript:load('allFruits')">
        <button class="btn btn-block">Fruits</button>
      </a>
      <a href="javascript:load('allVeggies')">
        <button class="btn btn-block">Veggies</button>
      </a>
      <a href="javascript:load('allGrains')">
        <button class="btn btn-block">Grains</button>
      </a>
    </div>
    <div class="btn-toolbar-other hidden btn-group">
      <a href="javascript:load('allFruits')">
        <button class="btn">Fruits</button>
      </a>
      <a href="javascript:load('allVeggies')">
        <button class="btn ">Veggies</button>
      </a>
      <a href="javascript:load('allGrains')">
        <button class="btn ">Grains</button>
      </a>
    </div>
  </div>
</div>
</body>

<?php include 'footer.php'; ?>
