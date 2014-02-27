$(document).ready(
	function workshop_fetch(){

	var page='w';

	$.ajax({                                      
		url: 'jsonEncode.php',                         
		data: ({ page:page }),
		method:'GET',
		dataType: 'json',                      
		success: function(data)          
		{
			//alert(data["Alpha"].title);
			var workshop1=data["Air Guitar Workshop"];
							$('#workshop1_head').html(workshop1.title);
							$('#workshop1_desc').html(workshop1.details);
							$('#workshop1_thumb').attr("src",workshop1.image_thumbnail);
							$('#workshop1_poster').attr("src",workshop1.image_poster);
							
			var workshop2=data["Beta"];
							$('#workshop2_head').html(workshop2.title);
							$('#workshop2_desc').html(workshop2.details);
							$('#workshop2_thumb').attr("src",workshop2.image_thumbnail);
							$('#workshop2_poster').attr("src",workshop2.image_poster);
							
		 }
		
	});
});