<?php
$to = "useitupt36@gmail.com";
$subject = "Use It Up Feedback";
$headers = "From: " . $_POST['Name'] . " <" . $_POST['Email'] . ">";
$msg = $_POST['Comment'];

mail($to, $subject, $msg, $headers);

?>