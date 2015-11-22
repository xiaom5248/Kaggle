<?php
$email = $password =  $result = $userid = $username = $usertype = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $email = test_input(@$_POST["email"]);
  $password = test_input(@$_POST["password"]);
   $username = test_input(@$_POST["name"]);
    $usertype = test_input(@$_POST["type"]);
}

$mysqli = new mysqli("localhost","root","123","phpmyadmin");
$sql = "SELECT user_id FROM user WHERE user_logname ='".$email."'" ;
$result = $mysqli->query($sql);
if($result){	 
	if($result->num_rows>0){    //if user name existe        						
					echo "false";									
	}
	elseif($result->num_rows==0){ //if user name not existe 
				 $sql = "INSERT INTO user(user_name,user_motdepasse,user_type,user_logname) VALUES('".$username."','".$password."','".$usertype."','".$email."')";
				$result = $mysqli->query($sql);				
				echo "true";
			
	}
}

$mysqli->close();
?>