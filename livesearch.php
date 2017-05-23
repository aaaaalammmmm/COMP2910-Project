<?php
function clean($string) {
  return preg_replace('/[^A-Za-z0-9\- ]/', '', $string); // Removes special chars.
}
$xmlDoc=new DOMDocument();
$xmlDoc->load("food.xml");

$foodLinks=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];
$search = clean($q);
$reg_ex = "/^" . $search . "/i";
$hint="";
if ($search == $q) {
  //lookup all links from the xml file if length of q > 0
  if (strlen($q)>0) {
    for($i=0; $i<($foodLinks->length); $i++) {
      $name=$foodLinks->item($i)->getElementsByTagName('name');
      $function=$foodLinks->item($i)->getElementsByTagName('url');
      if ($name->item(0)->nodeType==1) {
        //find a link matching the search text
        if (preg_match($reg_ex,$name->item(0)->childNodes->item(0)->nodeValue)) {
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
}
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
