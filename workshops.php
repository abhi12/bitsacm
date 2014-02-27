<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Home - BITS-ACM</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<link rel="stylesheet" type="text/css" href="css/gen.css" />
	<script type="text/javascript" src="js/can_s.js"></script>
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/navbar_style.css" rel="stylesheet">
	<link href="css/workshop_style2.css" rel="stylesheet" type="text/css" />	   
    <script src="js/navbar_script.js" type="text/javascript"></script>
	
</head>
<body  style = "background : url(images/background.jpg); ">
<?php include 'header.php' ?>

<div class = "container form-inline">

<div class="wrapper_workshop">
	<div id="underlay">
		</div>
	<div class="workshop_container">
		
		<div class="workshop_content">
			<h2 class="workshop_heading" id="workshop1_head"></h2>
			<div class="workshop_lightbox">
				<img src="images/close6.png" class="workshop_lightbox_close">
				<img src="images/air-guitar.jpg" class="workshop_lightbox_img" id="workshop1_poster">
			</div>
			<div class="workshop_thumb">
				<img src="images/air-guitar.jpg"  id="workshop1_thumb">
			</div>
			<div class="workshop_txt">
				
				<br><br><br>
				<p id="workshop1_desc">
				Electronic Air Guitar Workshop
				</p>
			</div>
		</div>
		
		
		<div class="workshop_content">
			<div class="workshop_lightbox">
				<img src="images/close6.png" class="workshop_lightbox_close">
				<img src="images/web_development.png" class="workshop_lightbox_img"  id="workshop2_poster">
			</div> 
			<h2 class="workshop_heading" id="workshop2_head"></h2>
			<div class="workshop_txt">
				
				<br><br><br>
				<p id="workshop2_desc">
				Dive into Web Development Workshop
				</p>
			</div>
			<div class="workshop_thumb">
				<img src="images/web_development.png" id="workshop2_thumb">
			</div>
		</div>
	</div>
		
</div>
</div>
<?php include 'footer.php' ?>
<script type="text/javascript" src="js/workshop_script.js"></script>
<script type="text/javascript" src="js/workshop_fetch.js"></script>
</body>
</html>