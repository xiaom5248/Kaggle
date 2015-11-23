// JavaScript Document
var commandcode ,username,json ;
$(document).ready(function() {
	commandcode = 0;
    $.ajax({
						url: "php/chef.php",
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
						url: "php/chef.php",
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