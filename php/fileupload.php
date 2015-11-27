<?php		
       session_start();
	    $fileurl = "../upload/".@$_SESSION['teamid'];
        if(!file_exists($fileurl)){
			mkdir($fileurl);			
			}
			$fileurl .="/".@$_FILES["file_data"]["name"];
		move_uploaded_file(@$_FILES["file_data"]["tmp_name"],$fileurl);
		
		$mysqli = new mysqli("localhost","root","123","phpmyadmin");
		$sql = "INSERT INTO test(test_con,test_team_id) VALUES('".$fileurl."',".@$_SESSION['teamid'].")";
		$result = $mysqli->query($sql);		
				$arr1 = "{}";			
				echo json_encode($arr1);
		
		$mysqli->close();
		
?>