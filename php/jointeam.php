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
		if(@$_SESSION["type"] == "1"){
			echo true;          // legal login 
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
if($command == 1){    //set user name
		
	$username = $_SESSION["username"];
	$arr = ["username"=>$username];
	
	echo json_encode($arr);
}



if($command == 2 ){   //set table
			
			$retuen_arr = array();
			$mysqli = new mysqli("localhost","root","pass","kaggle");
			$sql = "SELECT team.team_id,team.team_name,user.user_name,team.team_discription,team.team_time FROM team INNER JOIN user ON team.team_chef_id=user.user_id " ;
			$result = $mysqli->query($sql);
		if($result){
				if($result->num_rows>0){					
					while($row = $result->fetch_array()){
						$arr1['team_id'] = $row['team_id'];
						$arr1['team_name'] = $row['team_name'];
						$arr1['user_name'] = $row['user_name'];
						$arr1['team_discription'] = $row['team_discription'];
						$arr1['team_time'] = $row['team_time'];
						array_push($retuen_arr,$arr1);
					}
				}
				echo json_encode($retuen_arr);
	}
	
	$mysqli->close();
}
if($command == 3){   // ask to join a group	
	$mysqli = new mysqli("localhost","root","pass","kaggle");
	$sql = "INSERT INTO application(application_user_id,application_team_id) VALUES(".@$_SESSION['userid'].",".@$_POST["team_id"].")" ;
	$result = $mysqli->query($sql);
	if($result){
		echo true;
		}
	
	}
?>