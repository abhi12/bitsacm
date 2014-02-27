<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Projects - BITS-ACM</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/gen.css" />
	<script type="text/javascript" src="js/can_s.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  
  <link href="css/navbar_style.css" rel="stylesheet">

     
  
  
      
  <script src="js/bootstrap.js"></script>
      
     
  
     
  
     
    <script src="js/navbar_script.js"></script>
  
   <script src="js/fetch.js"></script>
     
    <script type="text/javascript">

  $(document).ready(function(){
    
     project_fetch();
    
    
    $("#item4, #item5").hover(function(){
      $('img', this).addClass('rotating1');
    }, function(){ $('img', this).removeClass('rotating1');

    });

    $('#accordion').collapse({
        toggle: false
      });


  });
  </script>
<style type="text/css">
  .panel_head
  {
    width: 400px;
    
    transition:width 0.5s;
-webkit-transition:width 0.5s;  
  }
  .panel-title a
  {
    text-decoration: none;
  }
   .panel_head:hover
  
  {
    width:100%;
   
  }
 
  </style>

</head>
<body  style = "background : url(images/background.jpg); ">
<?php include 'header.php' ?>

<div class = "container form-inline">

<div class="" id="accordion">
 
  </div>
</div>
<?php include 'footer.php' ?>
</body>
</html>