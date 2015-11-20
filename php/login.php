<?php
$email = $password =  $result = $userid = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $email = test_input($_POST["email_login"]);
  $password = test_input($_POST["password_login"]);
}

$mysqli = new mysqli("localhost","root","123","phpmyadmin");
$sql = "SELECT * FROM user WHERE user_logname ='".$email."' AND user_motdepasse = '".$password."'" ;
$result = $mysqli->query($sql);
if($result){
	if($result->num_rows>0){
		while($row = $result->fetch_array()){
			echo "id=".$row[0]."<br>";
			echo "username=".$row[1]."<br>";
			echo "password=".$row[2]."<br>";
			echo "type=".$row[3]."<br>";
			echo "equipe=".$row[4]."<br>";
			echo "logname=".$row[5]."<br>";
		}
	
	}

}
$mysqli->close();
?>