<?php
	session_start();
	if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
		die("Please login");
	}
	else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-16"/>
    <title>Whirl Word - <?php echo $_SESSION['element'];?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/base.css" />
	
	<!--<script type="text/javascript" src="js/fetch.js"></script>-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	function fetch(){
	var lang = "<?php echo $_SESSION['lang'];?>";
		$.ajax({                                      
			url: 'words.php',                         
			data: ({ lang:lang }),
			method:'POST',
			dataType: 'json',                      
			success: function(data)          
			{ 
				var abc = '<center><font size=5>';
				var def = '</font><br /><br /></center>';
				for(var i=0;i<data[0].length;i++) {
					var word1 = data[0][i];
					$('#col_1').append(abc + word1 + def);
				}
				for(var i=0;i<data[1].length;i++) {
					var word2 = data[1][i];
					$('#col_3').append(abc + word2 + def);
				}
				$('#eng_ans').html(data[2]);
				if(data[3]==1) {
					$('#eng_ans').attr('disabled',true); 
				}
			}
		});
	}
	
	
	</script>
    <script src="//www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
    
  </head>
	<body style="font-family: Arial;" onload="fetch()">
	<div class="header">
		<img src="images/poetrylogo.png" height="70px" width="120px" style="padding-top:20px;"/>

		<p> & </p>
		<img src="images/acm.png" style="padding-top:10px;" />
		<p>present</p>
		 <img src="images/whirllogo.png"/>
		<img src="images/oasis-logo.png" style="padding-top:10px;" />
		
		<a href="logout.php" style="position:absolute;right:5px;top:5px;"><button id="logout" style="clear:both;height:50px;width:100px;font-size:100%;">Logout</button></a>
	</div>
		<hr>
	<div class="body" style="margin:0 auto;">	
		<table width="100%" cellspacing="2px" cellpadding="1px" border="0" class="main_table">
			<tr>
			<td width="25%" id="tab_left"  ><div class="column1">Words to Use</div></td>
			<td 		    id="tab_middle"><div class="column2">Write Here</div></td>
			<td width="25%" id="tab_right" ><div class="column3">Words not to be Used</div></td>
			</tr>


			<tr>
			<td id="col_1"></td>
			<td id="col_2">
				<div id="content">
					<form action="save.php" method="post">
					<center><textarea cols="100" rows="30" id="eng_ans" name="ans" >xzjcjxzbcxzbchj</textarea></center>
					<center><input type="radio" name="submit" value="1" title="After submitting you cannot edit further">Submit your text<input type="radio" name="submit" value="0" title="Save">Save your text<br/><input type="submit" value="Proceed" /></center>
					</form>
				</div>
			</td>
			<td id="col_3"></td>
			</tr>
		</table>
	</div>
	<div id="footer" style="margin-top:10px;"><b><center>Contact us: <br/> E-mail: poetryclub.bits@gmail.com, Phone: Tanayveer: +91-7891968834<br/>
		For technical query, contact Abhinav +91-8741950885</center></b>
	</div>
	</body>
</html>
<?php
}
?>