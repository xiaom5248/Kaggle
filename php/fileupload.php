<?php		
        
        
		$filedata = @$_FILES['file_data']['tmp_name'];
		 move_uploaded_file(@$_FILES["file_data"]["tmp_name"],"../upload/". @$_FILES["file_data"]["name"]);
		
		$mysqli = new mysqli("localhost","root","123","phpmyadmin");
		$sql = "INSERT INTO test(test_con) VALUES('".$filedata."')";
		$result = $mysqli->query($sql);
		
				$arr1 = "{}";			
				echo json_encode($arr1);
		
		$mysqli->close();
		
?>