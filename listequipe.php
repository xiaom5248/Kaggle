<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">KAGGLE ESIGELEC</h1>
    </div>
  </div>
  
</div>
<div class="container">  
  <hr>
  <div class="row">
    <div class="text-center col-md-12">
     	<div class="panel panel-default">
  <!-- Default panel contents -->
  			<div class="panel-heading">Liste d'equipe</div>

  <!-- table -->
  <table class="table table-hover">
  		<thead>
        <tr>
        	<th>  #  </th>
            <th>Nom d'equipe</th>
            <th>Chef d'equipe</th>
            <th>Description</th>
            <th>Date de creation</th>
         </tr>
        </thead>
        
        <?php 
			$mysqli = new mysqli("localhost","root","123","phpmyadmin");
			$sql = "SELECT team.team_id,team.team_name,user.user_name,team.team_discription,team.team_time FROM team INNER JOIN user ON team.team_chef_id=user.user_id " ;
			$result = $mysqli->query($sql);
			if($result){
				if($result->num_rows>0){
					
					while($row = $result->fetch_array()){
						echo "<tbody>";
							echo "<tr>";
								echo "<th>";
									echo $row["team_id"];
								echo "</th>";
								echo "<th>";
									echo $row["team_name"];
								echo "</th>";
								echo "<th>";
									echo $row["user_name"];
								echo "</th>";
								echo "<th>";
									echo $row["team_discription"];
								echo "</th>";
								echo "<th>";
									echo $row["team_time"];
								echo "</th>";
							echo "</tr>";
						echo "</tbody>";
					}
					
	
	}

}
$mysqli->close();
		?>
  </table>
</div>
    </div>
  </div>
  
  <hr>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer </h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  <hr>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
