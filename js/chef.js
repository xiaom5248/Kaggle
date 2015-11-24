// JavaScript Document

// ////////////////////////////////////////
//       menu switch
//////////////////////////////////////////
$('#myTabs a[href="#compterendu"]').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('#myTabs a[href="#reunions"]').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$('#myTabs a[href="#equipiers"]').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});



var commandcode ,username,json,teamid;
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
							var jsonarry = JSON.parse(result);
							$(jsonarry).each(function(){
								username = this.username;
								teamid = this.teamid;
								});
							
							$("#username_span").before(username);
							if(teamid != null || teamid!=""){
								application();
								}
						} 
					});	
					
	
	}
	
function application(){
	commandcode =2;
	var applicationid,applicationteamid,count = 0;
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
							var jsonarry = JSON.parse(result);
							$(jsonarry).each(function(){
								applicationid = this.applicationid;
								applicationteamid = this.applicationteamid;  // applier's id
								count++;
								});							
							$("#chef_application_span").html(count);
							
						} 
					});	
	}