// JavaScript Document


// ////////////////////////////////////////
//       menu switch
//////////////////////////////////////////
$('#myTabs a[href="#Connection"]').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myTabs a[href="#Inscription"]').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
// ////////////////////////////////////////
//       button connection clicked
//////////////////////////////////////////
var email,password="";
$("#connecter").on('click',function(){   
	email = $('#email_login').val();
	password = $('#password_login').val();
	if(email!="" && password!=""&&email.indexOf("@")>=1 && email.indexOf(".")>=3) {
		$.ajax({
						url: "php/login.php",
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
							location.href ="listequipe.php";
							}
							
						}
					});	
	}
	else{
		$('#email_div').addClass("has-error");
		$('#password_div').addClass("has-error");
		$('#error_login').empty();
		$('#error_login').append("<br/><div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Désolé!</strong> E-mail ou mot de passe est incorrect</div>");
	}
	
});


// ////////////////////////////////////////
//       button inscription clicked
//////////////////////////////////////////

var email_ins,password1_ins,password2_ins,type_ins,name_ins ="";
		email_ins = $('#email_ins').val();
		password1_ins = $('#password1_ins').val();
		password2_ins = $('#password2_ins').val();		
		name_ins = $('#name_ins').val();
		type_ins = $('#type_ins').find("option:selected").text();
		if(type_ins == "Chef d'equipe"){
			type_ins = "2";
		}
		else{
			type_ins = "1";
		}
	$("inscription").on('click',function(){
			$.ajax({
						url: "php/inscription.php",
						type: "POST",
						data: {
							email: email_ins,
							password: password1_ins,
							type: type_ins,
							name: name_ins
						},
						dataType: "text",
						success: function(result){
							if(result != "true"){  //if user name is not available
							//$('#email_div').addClass("has-error");
							//$('#password_div').addClass("has-error");
							//$('#error_login').empty();
							$('#error_ins').append("<br/><div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Désolé!</strong> Cet adresse E-mail semble être associée à un autre compte, veuillez saisir l'autre adress</div>");
							}
							else{      //  if user name is  available
							location.href ="listequipe.php";
							}
							
						}
					});	
		
	});