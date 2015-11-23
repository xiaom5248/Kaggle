<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $command = @$_POST["command"];
}
////////////////////////////////////////
//  make sure if it is legal login
////////////////////////////////////////
if($command == 0){	
	if( @$_SESSION["admin"]  && @isset($_SESSION["code"])){  // legal login 
		echo true;
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

?>