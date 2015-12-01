<?php

$path = @$_POST['key'];
unlink($path);
		$mysqli = new mysqli("localhost","root","pass","kaggle");
		$sql = "DELETE FROM test WHERE test_con ='".$path."'";
		$result = $mysqli->query($sql);	
			$mysqli->close();
				$arr1 = "{}";			
				echo json_encode($arr1);

?>