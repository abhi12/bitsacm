$(document).ready(function(){
	$('.workshop_content').hover(function(){
		$('.workshop_content').not(this).fadeTo(250,0.3);
		},function(){ $('.workshop_content').not(this).fadeTo(100,1);
	});
	
	$('.workshop_thumb').click(function(){
		 //var x=$(this).parent().offset().top;
		 var x = $(window).scrollTop();
		 //$(this).data("click",1);
		$(this).parent().children().filter('.workshop_lightbox').css("display","block").css("top",x).animate({opacity:'1'},500);
		$('#underlay').css("display","block");
		}); 	
		
	$('.workshop_lightbox_close').click(function(){
		$('.workshop_lightbox').css("display","none").css("opacity","0");
		$('#underlay').css("display","none");
		//$(this).parent().parent().children().filter('.workshop_thumb').data("click",0);
		});
/* 	
	$('document').click(function(e){
		if(('.workshop_thumb').data("click")==1){
			var container = $('.workshop_lightbox');
			if ((!container.is(e.target) )&& (container.has(e.target).length === 0))
				{
					$('.workshop_lightbox').css("display","none");
					$('#underlay').css("display","none");
				}
			('.workshop_thumb').data("click",0);
			}
		}); */ 
		
		$(document).keyup(function(e) { 
        if (e.keyCode == 27){
			$('.workshop_lightbox').css("display","none").css("opacity","0");
			$('#underlay').css("display","none");
			}
		});
});