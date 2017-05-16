<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("food.xml");

$foodLinks=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$foodItem=$_GET["q"];

//variable to return
$result = "false";

//lookup all links from the xml file if length of q > 0
if (strlen($foodItem)>0) {
  for($i=0; $i<($foodLinks->length); $i++) {
    $name=$foodLinks->item($i)->getElementsByTagName("name");
    if ($name->item(0)->nodeType==1) {
      //find a link matching the search text
      if (strcasecmp($name->item(0)->childNodes->item(0)->nodeValue,$foodItem)==0) {
        $result = "true";
        // $result = $result = $name->item(0)->childNodes->item(0)->nodeValue;
        break;
      }
      // $result = $name->item(0)->childNodes->item(0)->nodeValue;
    }
  }
}

//output the response
echo $result;
?>
