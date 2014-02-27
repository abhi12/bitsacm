$(document).ready(function(){
	$("#navbar_list1_item1").hover(function(){
		$('img', this).attr("src","images/homeicon2.png");
	}, function(){ $('img', this).attr("src","images/homeicon.png");
	});	
	$("#navbar_list1_item2").hover(function(){
		$('img', this).attr("src","images/eventsicon-single2.png");
	}, function(){ $('img', this).attr("src","images/eventsicon-single.png");
	});
	
	$("#navbar_list1_item3").hover(function(){
		$('img', this).attr("src","images/projectsicon2.png");
	}, function(){ $('img', this).attr("src","images/projectsicon.png");
	});
	$("#navbar_list1_item4").hover(function(){
		$('img', this).attr("src","images/workshop-gear2.png");
	}, function(){ $('img', this).attr("src","images/workshop-gear.png");
	});
	 
	$('#navbar_list1_item5').hover(function(){
		$('#contact_icon_0').attr("src","images/contct_0.png");
		$('#contact_icon_1').attr("src","images/contct_1.png");
		$('#contact_icon_2').attr("src","images/contct_2.png");
		$('#contact_icon_3').attr("src","images/contct_3.png");
		// $('img',this).not("#contact_icon_0").fadeOut(0,function ring(){
		// 	$('#contact_icon_1').fadeIn(400,function(){
		// 		$('#contact_icon_2').fadeIn(400,function(){
		// 			$('#contact_icon_3').fadeIn(400);
		// 		});
		// 	});
	
	},function(){$('img',this).not("#contact_icon_0").stop();
				$('#contact_icon_0').attr("src","images/contact_0.png");
				$('#contact_icon_1').attr("src","images/contact_1.png");
				$('#contact_icon_2').attr("src","images/contact_2.png");
				$('#contact_icon_3').attr("src","images/contact_3.png");
				$('img',this).not("#contact_icon_0").css("opacity","1");
	}); 
	
});