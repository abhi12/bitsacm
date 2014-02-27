<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Home - BITS-ACM</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Association for computing machinery, Student chapter, BITS Pilani">
	<meta name="keywords" content="Bits pilani, apogee, Association for computing machinery, student chapter, pilani, BITS-ACM, ACM, BITS ACM">
	<meta name="author" content="BITSACM - Web Team">

	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<link rel="stylesheet" type="text/css" href="css/gen.css" />
	<script type="text/javascript" src="js/can_m.js"></script>
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap_calendar.css" rel="stylesheet">
	<link href="css/navbar_style.css" rel="stylesheet">

	   
<link href="css/workshop_style2.css" rel="stylesheet" type="text/css" />
	    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
	    
	    <script src="js/bootstrap.js"></script>
	    
	   
	<script src="js/bootstrap_calendar.js"></script>
	    <!--<script src="js/script1.js"></script>-->
	
	   
    <script src="js/navbar_script.js"></script>
	 
	 <script type="text/javascript">

	$(document).ready(function(){
		
		
		
		 theMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
              theDays = ["S", "M", "T", "W", "T", "F", "S"];

              $('.calendar_test').calendar({
                months: theMonths,
                days: theDays,
                req_ajax: {
                  type: 'get',
                  url: 'json.php'
                }
              });
		$("#item4, #item5").hover(function(){
			$('img', this).addClass('rotating1');
		}, function(){ $('img', this).removeClass('rotating1');

		});

		$('#accordion').collapse({
			  toggle: false
			});


	});
	</script>
</head>

<body  style = "background : url(images/background.jpg); ">

<?php include 'header.php' ?>
<div class = "container form-inline">
<div class="posters">
<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/icl14.jpg" alt="International Coding League" title="International Coding League" id="wows1_0"/></li>
<li><img src="data1/images/sms14.jpg" alt="Stock Market Simulation (SMS)" title="Stock Market Simulation (SMS)" id="wows1_1"/></li>
<li><img src="data1/images/checkmate.jpg" alt="Checkmate" title="Checkmate" id="wows1_2"/></li>
<li><img src="data1/images/itse13.jpg" alt="Its Elementary" title="Its Elementary" id="wows1_3"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="International Coding League"><img src="data1/tooltips/icl14.jpg" alt="International Coding League"/>1</a>
<a href="#" title="Stock Market Simulation (SMS)"><img src="data1/tooltips/sms14.jpg" alt="Stock Market Simulation (SMS)"/>2</a>
<a href="#" title="Checkmate"><img src="data1/tooltips/checkmate.jpg" alt="Checkmate"/>3</a>
<a href="#" title="Its Elementary"><img src="data1/tooltips/itse13.jpg" alt="Its Elementary"/>4</a>
</div></div>
<span class="wsl"><a href="http://wowslider.com">HTML Code for Slideshow</a> by WOWSlider.com v4.7</span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
</div>
<br/><br/> 
<div class="row">
	<div class="col-md-8">
	<center><h3>About Us</h3></center>
		<p>
		We are the Association for Computing Machinery (ACM), Student Chapter, Birla Institute of Technology and Science, Pilani or in short, BITSacm. The student chapter in BITS Pilani was established in 2008, but in two years, we have grown into the largest student chapter in the world with over 800 Chapter Members and 50 Council members. Both groups consist of students from all subjects and of all years – freshmen to seniors. This year, along with the entry of 30 new Council Members, we are projecting an increase of about 300 Chapter Members after the new recruitment session, to be held shortly. We aim to instill the spirit of technology and computing among the students of BITS, through the various fields modern Information Technology has developed in.
		</p>
	</div>
	
	<div class="col-md-4">
	
	<div class="calendar_test"></div>
	</div>	
</div>


</div>
<?php include 'footer.php' ?>
</body>
</html>