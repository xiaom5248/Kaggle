<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

  
<div class="container-fluid">
  <div class="row" id="header">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">KAGGLE ESIGELEC</h1>
    </div>
  </div>
  <hr>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4 text-center col-lg-4 col-lg-offset-2">      
      <img  src="img/champion.jpg" alt= "logo" class="img-responsive">      
      <input type="button"  class="btn btn-info btn-lg btn-block" value="Liste d'equipe" onclick="window.location.href='http://localhost/listequipe.php'"></input>
      
    </div>
    <div class="text-center col-sm-4 col-lg-offset-1">
    	<div class="row">
        <ul id="myTabs" class="nav nav-tabs">
        	<li role="presentation" class="active"><a href="#Connection">Connection</a></li>
             <li role="presentation"><a href="#Inscription">Inscription</a></li>
       			         
        </ul>
        </div>
        <div class="row">
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="Connection">
        
         <div class="panel panel-info"> 
        	<div class="panel-heading">
              <h3> Connection </h3>
            </div>
            
            <form action="php/login.php" method="post">
            <div class="panel-body">
            	<div class="container-fluid">
                	<div class="row">
                		<div class=" text-center col-lg-4 ">
                        	<h5> Identifiant </h5>
                    	</div>
                        <div class=" text-center col-lg-7">
                        	<input type="email" class="form-control"  placeholder="Email" name="email_login" required >
                    	</div>
                    </div>
                    <br/>
                    <div class="row">
                		<div class=" text-center col-lg-4 ">
                        	<h5> Mot de passe </h5>
                    	</div>
                        <div class=" text-center col-lg-7">
                        	<input type="password" class="form-control "  placeholder="Password" name="password_login" required>
                    	</div>
                    </div>
                    
                    <hr>
                    <div class="row">
                    	<div class=" text-center">
                   			<a> Mot de passe oublié?</a>
                    	</div>
                        
                    </div>
                    <br/>
                    <div class="row">
                    	<div class=" text-center">
                   			 <input type="submit" class="btn btn-info " value="Connecter"></button>
                    	</div>
                        
                    </div>
                </div>
            </div>
        	</form>
        </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="Inscription">   
         <div class="panel panel-info">          
        	<div class="panel-heading">
              <h3> Inscription </h3>
            </div>         
            <form action="php/inscription.php" method = "post">
            <div class="panel-body">
            	<div class="container-fluid">
                	<div class="row">
                		<div class=" text-center col-lg-4 ">
                        	<h5> Identifiant </h5>
                    	</div>
                        <div class=" text-center col-lg-7">
                        	<input type="email" class="form-control" id="email_insc" placeholder="Email" name="email_ins">
                    	</div>
                    </div>
                    
                    <br/>
                    <div class="row">
                		<div class=" text-center col-lg-4 ">
                        	<h5> Mot de passe </h5>
                    	</div>
                        <div class=" text-center col-lg-7">
                        	<input type="password" class="form-control" id="passwords1_insc" placeholder="Password" name="passwords1_ins">
                    	</div>
                    </div>
                     <br/>
                    <div class="row">
                		<div class=" text-center col-lg-4 ">
                        	<h5> Verifier </h5>
                    	</div>
                        <div class=" text-center col-lg-7">
                        	<input type="password" class="form-control" id="passwords2_insc" placeholder="Password">
                    	</div>
                    </div>
                     <br/>
                    <div class="row">
                		<div class=" text-center col-lg-4 ">
                        	<h5> Type </h5>
                    	</div>
                        <div class="text-left col-lg-7">
                        	<div class="dropdown">
 							 <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
   								User Type
   								 <span class="caret"></span>
 							 </button>
 							 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    							<li><a href="#">Etudiant</a></li>
    							<li><a href="#">Chef d'equipe</a></li>
  							</ul>
							</div>
                    	</div>
                    </div>
                    <hr>
                    <br/>
                    <div class="row">
                    	<div class=" text-center">
                   			 <input type="submit" class="btn btn-info" value="Valider"></button>
                    	</div>
                        
                    </div>
                </div>
            </div>  
            </form>     
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
  <hr>
  <div class="row" id = "footer">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>Footer </h4>
      <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="http://yourwebsite.com/" >My Website</a></p>
    </div>
  </div>
  <hr>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
</body>
</html>
