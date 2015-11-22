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
  <table class="table">
  		<thead>
        <tr>
        	<th>  #  </th>
            <th>Nom d'equipe</th>
            <th>Chef d'equipe</th>
            <th>Description</th>
         </tr>
        </thead>
        
        <?php 
			$mysqli = new mysqli("localhost","root","123","phpmyadmin");
			$sql = "SELECT equipe.equipe_id,equipe.equipe_nom,user.user_name,equipe.equipe_discription FROM equipe INNER JOIN user ON equipe.equipe_chef_id=user.user_id " ;
			$result = $mysqli->query($sql);
			if($result){
				if($result->num_rows>0){
					
					while($row = $result->fetch_array()){
						echo "<tbody>";
							echo "<tr>";
								echo "<th>";
									echo $row[0];
								echo "</th>";
								echo "<th>";
									echo $row[1];
								echo "</th>";
								echo "<th>";
									echo $row[2];
								echo "</th>";
								echo "<th>";
									echo $row[3];
								echo "</th>";
							echo "</tr>";
						echo "</tbody>";
					}
					
	
	}

}
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
