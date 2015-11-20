<?php 
$email = $passwords1 = $passwords2 = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $email = test_input($_POST["email_ins"]);
  $passwords1 = test_input($_POST["passwords1_ins"]);
  $passwords2 = test_input($_POST["passwords2_ins"]);
}

 
 ?>