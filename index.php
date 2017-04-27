<?php include 'header.php'; ?>
<body class="bg-primary" >
  <div class="container">
    <h1 class="text-center">Use-It-Up</h1>
    <div class="text-center">SearchBar Placeholder</div>
    <form class="text-center" onsubmit="return false;">
      <input type="text" class="inputBox text-center" size="30" placeholder="Search Foods..." onkeyup="showResult(this.value)">
    </form>
    <div class="text-center">
      <br/>
      <img src="" alt="image" />
    </div>
    <div id="livesearch"></div>
    <div class="text-center">
      <div class="row">
        <div class="col-sm-4">
          <a href="allFruits.php">
            <img src="/Images/FruitMedley.jpg" alt="Fruit Medley"/>
          </a>
        </div>
        <div class="col-sm-4">
          <img src="/Images/VeggieMedley.jpg" alt="Veggie Medley"/>
        </div>
        <div class="col-sm-4">
          <img src="/Images/BreadMedley.jpg" alt="Bread Medley"/>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include 'footer.php'; ?>
