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

$("#regarder").on('click',function(){  
	 window.open("../fileview.html");
});



var commandcode ,username,json ;
$(document).ready(function() {
	commandcode = 0;
    $.ajax({
						url: "php/equipier.php",
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
						url: "php/equipier.php",
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