<?php
$email = $password =  $result  = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $email = test_input(@$_POST["logname"]);
  $password = test_input(@$_POST["logpass"]);
}

$mysqli = new mysqli("localhost","root","123","phpmyadmin");
$sql = "SELECT * FROM user WHERE user_logname ='".$email."' AND user_motdepasse = '".$password."'" ;
$result = $mysqli->query($sql);
if($result){	
	if($result->num_rows>0){    //username and password correct         
		//while($row = $result->fetch_array())
				echo "true";										
	}
	elseif($result->num_rows==0){ //username or password incorrect
						
			echo "false";
	}
}
$mysqli->close();
?>