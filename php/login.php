<?php
$email = $password =  $result  =$username =$limit= $userequipe=$userid="";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $email = test_input(@$_POST["logname"]);
  $password = test_input(@$_POST["logpass"]);
  $password = sha1($password);
}

$mysqli = new mysqli("localhost","root","123","phpmyadmin");
$sql = "SELECT * FROM user WHERE user_logname ='".$email."' AND user_motdepasse = '".$password."'" ;
$result = $mysqli->query($sql);
if($result){	
	if($result->num_rows>0){    //username and password correct         
		while($row = $result->fetch_array()){
				session_start();
				$_SESSION["admin"] = true;
				$_SESSION["code"] = mt_rand(0,100000);
				$_SESSION["username"] =  $row["user_name"];
				
				$username = $row["user_name"];
				$limit = $row["user_type"];
				$userequipe = $row["user_equipe_id"];
				$userid = $row["user_id"];
				$sql ="UPDATE user set user_time=current_timestamp() WHERE user_id=".$userid;
				$mysqli->query($sql);
				if($limit == "1"){
					echo "equipier.html";
				}
				else{
					echo "chef.html";
				}
		}
													
	}
	elseif($result->num_rows==0){ //username or password incorrect
						
			echo "false";
	}
}
$mysqli->close();
?>