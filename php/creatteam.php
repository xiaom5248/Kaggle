<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $command = @$_POST["command"];
}
////////////////////////////////////////
//  make sure if it is legal login
////////////////////////////////////////
if($command == 0){	
	if( @$_SESSION["admin"]  && @isset($_SESSION["code"])){  
		if(@$_SESSION["type"] == "2"){
			echo true;             // legal login 
		}
		else{
			echo "../exit.php";
			}
		
	}
	else{    // ilegal login 
		echo "../exit.php";
		
	}
	

}


////////////////////////////////////////
//  	legal login
////////////////////////////////////////
if($command == 1){
	$username = $_SESSION["username"];
	$arr = ["username"=>$username];
	echo json_encode($arr);
}

////////////////////////////////////////
//  	creat a team
////////////////////////////////////////
if($command == 2){
  $name_team = test_input(@$_POST["name_team"]);
  $discription_team = test_input(@$_POST["discription_team"]);
  $userid = @$_SESSION["userid"];
  $teamid = @$_SESSION["teamid"];
 
     $mysqli = new mysqli("localhost","root","123","phpmyadmin");
	 
	  if($teamid == null){			// one chef only have one team
	  	 $sql = "INSERT INTO team(team_name,team_discription,team_chef_id) VALUES('".$name_team."','".$discription_team."',".$userid.")";
		 $result = $mysqli->query($sql);
		 $sql = "SELECT team_id FROM team WHERE team_chef_id =".$userid;		 
		 $result = $mysqli->query($sql);
		 while($row = $result->fetch_array()){
			 	$teamid = $row["team_id"];
			 }
		 @$_SESSION["teamid"] = $teamid;
		 $sql = "UPDATE user SET user_equipe_id = ".$teamid." WHERE user_id =".$userid;
		 $result = $mysqli->query($sql);
		if($result){
			echo true;
			}
	  }
	 else echo false;
	
	
$mysqli->close();
	}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>