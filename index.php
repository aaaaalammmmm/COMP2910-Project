<?php include 'header.php'; ?>
<?php
//This php block will be to test connections with the Azure SQL Database

//These are the lines of code to connect to our database with the credentials
$connectionInfo = array("UID" => "comp2910@comp2910", "pwd" => "Isitcl3ar", "Database" => "comp2910", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = getenv('SQLAZURECONNSTR_serverName');
$conn = sqlsrv_connect($serverName, $connectionInfo);

//Error handling, if connection fails.
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//This stores the server info of $conn
$server_info = sqlsrv_server_info( $conn);
if( $server_info ) {
	//Print out the the values of each key
    foreach( $server_info as $key => $value) {
       echo $key.": ".$value."<br />";
    }
} else {
      die( print_r( sqlsrv_errors(), true));
}

sqlsrv_close($conn);
?>
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
