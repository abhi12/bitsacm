<?php 
	session_start();
	//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c)
		die("connection failes, error 102 contact administrator");
	
	$message = '';
	
	function redirect_to( $location = NULL ) {
			if ($location != NULL) {
				header("Location: {$location}");
				exit;
			}
	}
?> 

<?php
	if($_SESSION['element'] != 's' ) {
		if($_SESSION['lang'] == 'e')
			redirect_to('./poem_e.php');
		else if($_SESSION['lang'] == 'h')
			redirect_to('./poem_h.php');
		else
			redirect_to('./index.php?q=3');
		die("Element already selected.");
	}
	else {
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Elements</title>
	<link rel="stylesheet" type="text/css" href="css/elements_style.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
	$(document).ready(function(){
		$('.element1').mouseover(function(){
		$('#elName').html('EARTH').css('left','46%').css('color','#40FF00');
		
		});
		$('.element2').mouseover(function(){
			$('#elName').html('FIRE').css('left','47%').css('color','orange');
		});
		
		$('.element3').mouseover(function(){
			$('#elName').html('AIR').css('left','48%').css('color','white');
		});
		
		$('.element4').mouseover(function(){
			$('#elName').html('WATER').css('left','46%').css('color','blue');
		});
		
		$('.element5').mouseover(function(){
			$('#elName').html('ETHER').css('left','46%').css('color','purple');
		});
		
		$('.element_thumb').mouseleave(function(){
			$('#elName').html('');
		});
		
		$('.element_thumb').click(function(){
				if(confirm("Are you sure ?")){
					var cl = $(this).attr('class');
					if(cl == element1) {
						window.location.href = "setElement.php?element=1";
					}
					else if(cl == element2) {
						window.location.href = "setElement.php?element=2";
					}
					else if(cl == element3) {
						window.location.href = "setElement.php?element=3";
					}
					else if(cl == element4) {
						window.location.href = "setElement.php?element=4";
					}
					else if(cl == element5) {
						window.location.href = "setElement.php?element5";
					}
				}
		
			return false;
		});
    });
	
	</script>
	<SCRIPT type="text/javascript">
		window.history.forward();
		function noBack() { window.history.forward(); }
	</SCRIPT>
</head>

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
<div class="elements_wrapper">
	<div class="header">
		<img src="images/poetrylogo.png" height="70px" width="120px" style="padding-top:20px;"/>

		<p> & </p>
		<img src="images/acm.png" style="padding-top:10px;" />
		<p>present</p>
		 <img src="images/whirllogo.png"/>
		<img src="images/oasis-logo.png" style="padding-top:10px;margin-right:0;" />
	</div>
	<hr />
	<h5 style="position:absolute;top:105px;left:40%;font-family:'Algerian';font-size:150%;">Choose Element:</h5>
<div class="page_content">

	<div>
		<!--<img src="images/pentagon1.jpg" height="300" width="300">-->
		<center><a href="setElement.php?element=1"><img src="images/earth.png" class="element_thumb element1"></a></center>
		<a href="setElement.php?element=2"><img src="images/fire.png" class="element_thumb element2"></a>
		<a href="setElement.php?element=3"><img src="images/air.png" class="element_thumb element3"></a>
		<a href="setElement.php?element=4"><img src="images/water.png" class="element_thumb element4"></a>
		<a href="setElement.php?element=5"><img src="images/ether.png" class="element_thumb element5"></a>
		<div id="elName"></div>
	</div>
	
</div>
<div class="footer" style="font-family:'Myriad Pro';"><p>Contact us:</p> 
<p>E-mail: poetryclub.bits@gmail.com, Phone: Tanayveer: +91-7891968834.	For technical query, contact Abhinav +91-8741950885</p>
	</div>
</div>
</body>
</html>
<?php
}
?>