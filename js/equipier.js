// JavaScript Document
$(document).ready(function(e) {
    $.ajax({
						url: "php/equipier.php",
						type: "POST",
						data: {
							logname: email,
							logpass: password
						},
						dataType: "text",
						success: function(result){
							if(result != "true"){ //if username or password not correcte
							$('#email_div').addClass("has-error");
							$('#password_div').addClass("has-error");
							$('#error_login').empty();
							$('#error_login').append("<br/><div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Désolé!</strong> Votre identifiant ou mot de passe incorrect</div>");
							}
							else{  //if username or password correcte
							location.href ="equipier.html";
							}
							
						}
					});	
});