

function project_fetch(){
	// function project_load(){
	
		// var page=$(this).attr('id');

		var page1 = 'p';
		var page2 = 'i';
		var guddu;

		$('#accordion').collapse({
			  toggle: true,
			  parent : '#accordion'
			});

		$.ajax({
			url: 'jsonEncode4.php',
			data: ({ page:page2 }),
			method: "GET",
			dataType: "json",
			success: function(data1) {
			 
			 	
			 	$.ajax({                                      
					url: 'jsonEncode4.php',                         
					data: ({ page : page1 }),
					method: "GET",
					dataType: "json",                      
					success: function(data)          
					{
						
						
						var part1 = '<div class="panel panel-default" ><div class="panel-heading panel_head"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href=#';
						var cat1 = ' >';
						var part2 = '</a></h4></div><div id=';
						var cat2 = ' class="panel-collapse collapse panel-body">';
						var cat3 = '<div class="panel-body pb" id="category1_projects">';
						var part3 = "</div></div></div>";
						var i = 0;
						for(var category in data)
						 {

							$('#accordion').append(part1 + category + cat1 + data1[category] + part2 + category + cat2 );

							for(var key in data[category])
							{ 
								
								var title = key;
								var details = data[category][key].details;
								var lead = data[category][key].lead;
								var members = data[category][key].members;

								$('#'+category).append("<br /><b>Title :  " + title + "</b><br /><b>Team Leader : " + lead + "</b><br /><br /> <b> Project Description : </b><br />"+details + "<hr />" );
							}
							$('#accordion').append(part3);
							if (i == 0) {
								$('#'+category).addClass('in');
							
							};
							i++;





						}
						
				     }
					
				});
			 
			
		
		
		}
		});
	

	
 }

