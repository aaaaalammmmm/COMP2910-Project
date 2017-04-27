<?php include 'header.php'; ?>
<body class="bg-primary" >
  <div class="container">
    <h1 class="text-center">All Fruits</h1>
    <a href="index.php">Home</a>
    <div class="text-center">SearchBar Placeholder</div>
    <form class="text-center" onsubmit="return false;">
      <input type="text" class="inputBox text-center" size="30" placeholder="Search Foods..." onkeyup="showResult(this.value)">
    </form>
    <div class="text-center">
      <br/>
    </div>
    <div id="livesearch"></div>
    <div class="text-center">
      <a href="apple.php">
        <img src="" alt="Apple"/>
      </a>
    </div>
    <div class="text-center">
      <a href="banana.php">
        <img src="" alt="Banana"/>
      </a>
    </div>
    <div class="text-center">
      <a href="orange.php">
        <img src="" alt="Orange"/>
      </a>
    </div>
  </div>
</body>

<?php include 'footer.php'; ?>
