// JavaScript Document

var commandcode ,username,json,index_id ;
$(document).ready(function() {
	commandcode = 0;
    $.ajax({
						url: "php/jointeam.php",
						type: "POST",
						data: {
							command: commandcode
						},						
						success: function(result){
							if(result == true){
								admin();
								table();
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
						url: "php/jointeam.php",
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
	
function table(){
	
	commandcode = 2;
	$.ajax({
						url: "php/jointeam.php",
						type: "POST",
						data: {
							command: commandcode						
						},
						//dataType: "json",
						error: function(a){
							alert(a);
						},
						success: function(result){		
							var jsonarry = JSON.parse(result);						
							$(jsonarry).each(function(index){
								$("#table_body").append("<tr><th id='"+index+"'>"+this.team_id+"</th>"+
								"<th>"+this.team_name+"</th>+<th>"+this.user_name+"</th>"+
								"<th>"+this.team_discription+"</th>"+"<th>"+this.team_time+"</th>"+
								"<th id='check_"+index+"'><button class = 'btn btn-success' data-toggle='modal' data-target='#myModal' onclick = 'makesure(this)'>S'inscrire</button></th></tr>"							
								);
								
							});
							
							
							
						} 
					});	
									
								
								
	}
	function makesure(obj){	
	 	 index_id = $(obj).parent().parent().children().first().text();
		$("#modal_body").html("Vous êtes sûr que vous voulez être un membre d'équipe  " + index_id +" ?");
	}
	
	$("#modal_button_sure").on("click",function(){
		commandcode = 3;
		$.ajax({
						url: "php/jointeam.php",
						type: "POST",
						data: {
							command: commandcode,
							team_id: index_id,		
						},
						//dataType: "json",
						error: function(a){
							alert(a);
						},
						success: function(result){	
							$('#myModal').modal('toggle');
							$('#myModal1').modal('toggle');
							
							 
						}
							});
							
							
							
						
					});	
			