<?php include 'header.php'; ?>
<body class="bg-primary" >
  <div class="container">
    <h1 class="text-center">Title Place holder</h1>
    <div class="text-center">SearchBar Placeholder</div>
    <form class="text-center" onsubmit="return false;">
      <input type="text" class="inputBox text-center" size="30" placeholder="Search Foods..." onkeyup="showResult(this.value)">
    </form>
    <div class="text-center">
      <br/>
      <img src="" alt="image" />
    </div>
    <div id="livesearch"></div>
  </div>
</body>

<?php include 'footer.php'; ?>
