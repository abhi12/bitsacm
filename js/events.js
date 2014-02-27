var names = new Array();
var desc = new Array();
var thumb = new Array();
var poster = new Array();
var date = new Array();



$(document).ready(function() {
	//parseJson(myJSONdata);
	var page = 'e';
	$.ajax({
		url: 'jsonEncode.php', 
		data: ({ page:page }),
		method:'GET',
		dataType:'json',
		success: function(data)
		{
			//alert(data);
			parseJson(data);
		}
	});
});

function parseJson(data) {
	var c = 0;
	
	for (c=0;c<data.length;c++) {
		
			desc[c] = data[c].details;
			names[c] = data[c].title;
			thumb[c] = data[c].thumbnail;
			poster[c] = data[c].poster;
			date[c] = data[c].date;
		//alert(desc[c]);
		
		// create the new element
		d = document.createElement('div');
		var newId = 'event'+c;
		$(d).addClass("eventSingle")
			.attr('id',newId)
			.appendTo($("#eventsList")) //main div
			.click(function(){
				bringForward(this);
			})
		
		// The title div added to main container
		d_title = document.createElement('div');
		var newId = 'title'+c;
		$(d_title).attr('id',newId)
				  .addClass("thumbTitle")
				  .html(names[c])
				  .appendTo(d)
		
		// The thumbnail pic added to thumb div
		d_thumbPic = document.createElement('img');
		$(d_thumbPic).addClass("thumbPics")
					 .attr('src', thumb[c])
					 .appendTo(d);
		
		}
	};



 function bringForward(obj) {
	//$(".eventSingle").unbind("click", bringForward);
	
	//$(obj).siblings().css("opacity", "0.4");
	$(obj).css("opacity", "1Fopac");
	//alert("hello");
	var objId = $(obj).attr('id');
	var index = objId.substring(objId.length-1);
	$("#eventDesc").html(desc[index]);
	$("#eventDate").html("Scheduled on : " + date[index]);
	$("#eventTitle").html(names[index]);
	$("#posterImg").attr('src', poster[index]);
	$("#posterContainer").css('display', 'block');
	$("#textContainer").css('display', 'block');
	//alert(index);
	
	$(obj).css("-webkit-filter", 'blur(0px)')
					 .css('-moz-filter', 'blur(0px)')
					 .css('-o-filter', 'blur(0px)')
					 .css('-ms-filter', 'blur(0px)');
	
	$(obj).siblings().css("-webkit-filter", 'blur(5px)')
					 .css('-moz-filter', 'blur(5px)')
					 .css('-o-filter', 'blur(5px)')
					 .css('-ms-filter', 'blur(5px)');
	$(obj).siblings().attr("disabled", true);
	$(obj).attr("disabled", true);
					 
	$("#allBlack").css('display', 'block');
	$("#textContainer").css('display','block');
	$("#textContainer").animate( { opacity:'1',
								   right: '22%',
								   top: '20%'
							   });
	$("#posterContainer").css('display','block');
	$("#posterContainer").animate( { opacity:'1',
								   left: '7%',
								   top: '20%'
							   });
							   
	$(obj).animate( { webkitTransform:'scale(5, 5)', 
					  transform:'scale(5, 5)', 
					  msTransform:'scale(5, 5)', 
					  left:'10%',
					  top:'10%' 
				  } ); 
}

$(document).ready(function() {
	$("#closeText").click(function () {
		//$(".eventSingle").bind("click", bringForward);
		//$("#closeText").bind("click", goback());
		$(".eventSingle").css("opacity", "0.8");
		$("#allBlack").css('display', 'none');
		$(".eventSingle").css("-webkit-filter", 'blur(0px)')
					 .css('-moz-filter', 'blur(0px)')
					 .css('-o-filter', 'blur(0px)')
					 .css('-ms-filter', 'blur(0px)');
		
		$("#textContainer").animate( { opacity:'0',
									   right:'0'
		} ).css('display','none');
		$("#posterContainer").animate( { opacity:'0',
									   left:'0px'
		} ).css('display','none');
	});

});
$(document).ready(function() {
	$(".eventSingle").mouseover(function() {
		$(this).css("opacity", "1");
		$(this).siblings().css("opacity", "0.8");
	});
});