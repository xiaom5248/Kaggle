// JavaScript Document

var commandcode;
$(document).ready(function() {
	var username,json;
	commandcode = 0;
    $.ajax({
						url: "php/creatteam.php",
						type: "POST",
						data: {
							command: commandcode
						},						
						success: function(result){
							if(result == true){
								admin();
							}
							else{
								location.href = result;								
							}
						}
					});	
					
});




function admin(){
	commandcode = 1; 
	$.ajax({
						url: "php/creatteam.php",
						type: "POST",
						data: {
							command: commandcode						
						},
						//dataType: "json",
						error: function(a){
							alert(a);
						},
						success: function(result){							
							json = JSON.parse(result);
							username = json.username;
							$("#username_span").before(username);
						} 
					});	
					
	
	}
	
//////////////////////////////////////////////////
//		Button Valider clicked
//////////////////////////////////////////////////

$("#ok").on('click',function(){
	var name_team="",discription_team="";
	name_team = $('#name_team').val();
	discription_team = $('#discription_team').val();
	if(name_team == ""){    //if not fill in the name of the team
		$('#name_team').addClass("has-error");
		$('#error_div').empty();
		$('#error_div').append("<br/><div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Désolé!</strong> Nom d'equipe ne peut pas etre null</div>");
	
	}
	else if(discription_team == ""){  // if not fill in the discription of the team
		$('#discription_team').addClass("has-error");
		$('#error_div').empty();
		$('#error_div').append("<br/><div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Désolé!</strong> Description d'equipe ne peut pas etre null</div>");	
		}
	else {             //if all filled in
		commandcode = 2;
		$.ajax({
						url: "php/creatteam.php",
						type: "POST",
						data: {
							command: commandcode,
							name_team: name_team,
							discription_team: discription_team						
						},
						//dataType: "json",
						error: function(a){
							alert(a);
						},
						success: function(result){							
							if(result){
								$('#error_div').append("<br/><div class='alert alert-success alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Félicitations!</strong> Votre équipe a bien été créé</div>");	
								}
							else {
								$('#error_div').append("<br/><div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Désolé!</strong> Chaque chef ne peut créer q'une seule equipe</div>");	
							}
		
						} 
					});	
		}
});