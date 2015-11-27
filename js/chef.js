// JavaScript Document

// ////////////////////////////////////////
//       menu switch
//////////////////////////////////////////
$('#myTabs a[href="#compterendu"]').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

$('#myTabs a[href="#reunions"]').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

$('#myTabs a[href="#demande"]').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

$("#regarder").on('click',function(){  
	 window.location.href="../fileview.html";
});


var commandcode ,username,teamid,index_id;
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
								preview();							
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
	var count = 0;
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
							var jsonarry1 = JSON.parse(result);
							$(jsonarry1).each(function(app_index){								
								$("#table_body").append("<tr><th id='"+app_index+"'>"+this.applicationid+"</th>"+
								"<th>"+this.applicationteamid+"</th>+<th>"+this.username+"</th>"+
								"<th>"+this.app_userid+"</th>"+							
								"<th><button class = 'btn btn-success' data-toggle='modal' data-target='#myModal' onclick = 'app_accept(this)'>Accepter</button>"+
								"&nbsp;&nbsp;&nbsp;&nbsp;<button class = 'btn btn-danger' data-toggle='modal' data-target='#myModal' onclick = 'app_refuse(this)'>Refuser</button></th></tr>"														
								);								
								count++;
								});			
								if(count != 0)	{
									$("#chef_application_span").html(count);
									
									}			
							
							
						} 
					});	
	}
	
	
function app_accept(obj){
	 index_id = $(obj).parent().parent().children().first().text();	  
	 var applicationuserid = $(obj).parent().parent().children().first().next().next().next().text();
	 commandcode = 3;
					 $.ajax({
						url: "php/chef.php",
						type: "POST",
						data: {
							command: commandcode,
							applicationid:index_id,
							applicationuserid: applicationuserid
						},
						//dataType: "json",
						error: function(a){
							alert(a);
						},
						success: function(result){
							if(result){
								$(obj).parent().parent().remove();
								var number = parseInt($("#chef_application_span").text()) -1;
										$("#chef_application_span").html(number);
								}	
								else{
								alert("Error BDD 333");
								}								
						} 
					});	
	}

function app_refuse(obj){ 
	commandcode = 4;
	index_id = $(obj).parent().parent().children().first().text();
	 $.ajax({
						url: "php/chef.php",
						type: "POST",
						data: {
							command: commandcode,
							applicationid:index_id					
						},
						//dataType: "json",
						error: function(a){
							alert(a);
						},
						success: function(result){
							if(result){
								$(obj).parent().parent().remove();
								var number = parseInt($("#chef_application_span").text()) -1;
										$("#chef_application_span").html(number);
								}	
								else{
								alert("Error BDD 333");
								}								
						} 
					});	
	}
	
	
	
	function preview(){
		commandcode = 5;
		var htmlcode = "",configcode= [];
		 $.ajax({
						url: "php/chef.php",
						type: "POST",
						data: {
							command: commandcode			
						},
						error: function(a){
							alert(a);
						},
						success: function(result){
							if(result != false){									
								var jsonarry2 = JSON.parse(result);						
								$(jsonarry2).each(function(index){
									var title = this.testcon.split("/");										
									htmlcode += "<img src='"+this.testcon + "' class='file-preview-image' alt='Desert' title='"+title[3]+"'>"+ "*$$*";
									configcode[index]= {"caption": title[3], "width":'120px', "url": '../php/filedelete.php', "key":  this.testcon , "extra": {"id": this.testid}};															
								});		
								
									htmlcode = htmlcode.substring(0,htmlcode.length-4);								
									$('#file-fr').fileinput({
									language: 'fr',
       								uploadUrl: 'php/fileupload.php',
        							allowedFileExtensions : ['jpg', 'png','gif','pdf','docx','txt'],
									overwriteInitial: false,									
									initialPreview: htmlcode,									
									initialPreviewConfig: configcode,										
   		 							});		
								}
							else{
									$('#file-fr').fileinput({
									language: 'fr',
       								uploadUrl: 'php/fileupload.php',
        							allowedFileExtensions : ['jpg', 'png','gif','pdf','docx']
   		 								});	
									}
						}
					    });	
		
		
		
		
		
		}