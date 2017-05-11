<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("food.xml");

$foodLinks=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q > 0
$hint="";
if (strlen($q)>0) {
  for($i=0; $i<($foodLinks->length); $i++) {
    $name=$foodLinks->item($i)->getElementsByTagName('name');
    $function=$foodLinks->item($i)->getElementsByTagName('url');
    if ($name->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($name->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" .
          $function->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $name->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" .
          $function->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $name->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}
//$type = 
// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="" || $hint==" ") {
  $response="no suggestion";
} else{
  $response=$hint;
}
//output the response
echo $response;
?>
