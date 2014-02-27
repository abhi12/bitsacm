function fetch(){
	var lang = ;
	$.ajax({                                      
		url: 'words.php',                         
		data: ({ lang:lang }),
		method:'POST',
		dataType: 'json',                      
		success: function(data)          
		{ 
			var abc = '<center><font size=5>';
			var def = '</font><br /><br /><br /></center>';
			for(var i=0;i<data[0].length;i++) {
				var word1 = data[0][i];
				$('#col_1').append(abc + word1 + def);
			}
			for(var i=0;i<data[1].length;i++) {
				var word2 = data[1][i];
				$('#col_3').append(abc + word2 + def);
			}			
		}
	});

}