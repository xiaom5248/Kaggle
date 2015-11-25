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
if($command == 1){   // set user name
	$retuer_arr = array();
	$arr["username"] = $_SESSION["username"];
	$arr["teamid"] = $_SESSION['teamid'];
	array_push($retuer_arr,$arr);
	echo json_encode($retuer_arr);
}
if($command == 2){  //check for new applications
			$return_arr1 = array();
			$mysqli = new mysqli("localhost","root","123","phpmyadmin");
			$sql = "SELECT application_id FROM application WHERE application_team_id =".$_SESSION['teamid'];
			$result = $mysqli->query($sql);
			if($result){  // if there are new applications
			$sql = "SELECT application_id, application_user_id,application_team_id,user_name FROM application INNER JOIN user ON application_user_id = user_id WHERE application_team_id =".$_SESSION['teamid'];
			$result = $mysqli->query($sql);
				if($result->num_rows>0){					
					while($row = $result->fetch_array()){
						$arr1['applicationid'] = $row['application_id'];
						$arr1['applicationteamid'] = $row['application_team_id'];
						$arr1['username'] = $row['user_name'];
						$arr1['app_userid'] = $row['application_user_id'];
						array_push($return_arr1,$arr1);
					}
				}
				echo json_encode($return_arr1);
			}
			$mysqli->close();
			
	
}
if($command == 3){
	$applicationid = @$_POST['applicationid'];
	$applicationuserid = @$_POST['applicationuserid'];
	$mysqli = new mysqli("localhost","root","123","phpmyadmin");
		$sql = "UPDATE user SET user_equipe_id =".@$_SESSION['teamid']." WHERE user_id =".$applicationuserid;
		$result = $mysqli->query($sql);
	    if($result){
			$sql = "DELETE FROM application WHERE application_id =".$applicationid;
			$result = $mysqli->query($sql);
				if($result){
				echo true;
				}
				else{
				echo false;
				}
			}
	$mysqli->close();
	}
if($command == 4){
		$applicationid = @$_POST['applicationid'];
		$mysqli = new mysqli("localhost","root","123","phpmyadmin");
		$sql = "DELETE FROM application WHERE application_id =".$applicationid;
		$result = $mysqli->query($sql);
		if($result){
			echo true;
			}
			else{
			echo false;
				}
				$mysqli->close();
	}
?>