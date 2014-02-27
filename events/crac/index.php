<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" href="1.css" rel="stylesheet" media="screen" />
<!-- <link href='http://fonts.googleapis.com/css?family=Finger+Paint' rel='stylesheet' type='text/css'> -->
<link href='http://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<title>BITS N PIECES</title>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
function validateForm(){
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var x=document.forms["reg"]["name"].value;
var y=document.forms["reg"]["college"].value;
var z=document.forms["reg"]["email"].value;
var w=document.forms["reg"]["cn"].value;
//var a=document.forms["reg"]["member_two_name"].value;
//var b=document.forms["reg"]["mobile_two"].value;

/*var email1 = document.forms["reg"]["email_one"].value;
var email2 = document.forms["reg"]["email_two"].value;    

    if (!filter.test(email1.value)) {
    alert('Please provide a valid email address');
    email1.focus;
    return false;
	}

	if (!filter.test(email2.value)) {
    alert('Please provide a valid email address');
    email2.focus;
    return false;
	}*/


if(x==null || x=="")
 {
 alert("enter Name");
 return false;
 }

if(y==null || y=="")
 {
 alert("enter College");
 return false;
 }

if(z==null || z=="")
 {
 alert("enter email");
 return false;
 }
 if(w==null || w=="")
 {
 alert("enter Mobile");
 return false;
 }

// if(a==null || a=="")
 // {
 // alert("enter Member Name");
 // return false;
 // } 

// if(b==null || b=="")
 // {
 // alert("enter Mobile");
 // return false;
 // }  
 
}
</script>
</head>

<body>
<div id="container">
	<div id="banner" >
 		<img src="images/header-oasis.png" width="100%" height="80" />
		<img src="images/ACM.png" style="position:absolute;right:20px;top:0px;z-index:2;" />
	</div>
	<h2>BITS n PIECES</h2>
	<div id="content">
	<div id="form">
	<div class="register">
	<form method="post" action="register.php" id="reg" onsubmit="return validateForm()">
	
		<h3><u>Register Here</u><h3>
 
 
                <table cellspacing="1" cellpadding="3" border="0">
                  <tbody>
                    <tr>
                      <td class="normalfont">Name:</td>
                      <td>
                        <input type="text" class="formInput" name="Name" id="name"/></td>
                    </tr>
                    <tr>
                      <td class="normalfont">College:</td>
                      <td>
                        <input type="text" class="formInput" name="id"  id="college"/></td>
                    </tr>
                    <tr>
                      <td class="normalfont">E-mail:</td>
                      <td>
                        <input type="email" class="formInput" name="email" id="email"/></td>
                    </tr>
                    <tr>
                      <td class="normalfont">Contact Number:</td>
                    <td>
                        <input type="text" class="formInput" name="mobile" id="cn"/></td>
                    </tr>
                    <tr>
                      <td class="normalfont"></td>
                      <td>
                        <input type="submit" class="formButton" value="Register" /></td>
                    </tr>
                  </tbody>
                </table>
		</form>
			</div>
			  
			  
			  <div id="ins" style="overflow-y:scroll;color:#000;">
			  <h3><u>Instructions:</u></h3>
			  <ol>
			  <li>Everyday, participants will be provided a theme based on which they will be required make an image on the provided interface</li>
			  <li>After creating the image click on "Save" to save the image on your system and then mail it within 24 hours (the same day) to the following email ID: bitsnpieces.crac@gmail.com with the subject being "entry for bits n pieces".</li>
			  <li>In the mail, don't forget to mention your Name,  ID(if applicable) , College name and Contact number.</li>
			  <li>For every theme there will be one winner who will be informed as soon as the decision is made by our judges and of course he/she will be provided a prize at the final completion of the event.</li>
			  <li>Keyboard shortcuts - use  ' c ' and ' v ' to rotate the object use ' h '  and  ' j ' to change the width of the object use ' k '  and  ' l ' to change the height of the object use arrow keys to move the object and use ' d ' to delete the last selected object.
				</li>
			  <br/> BEST OF LUCK !!
			  </ol>
			  </div>
		
	</div>	
	<div id="video">
	<!--<video width="500" height="300" controls="controls">
  <source src=".mp4" type="video/mp4"><source src=".ogg" type="video/ogg">Your browser does not support the video tag.
</video>-->
	<a href="./images/ins1.jpg" target="_blank"><img src="./images/ins.jpg" style="margin-top:30px;border:2px solid black; border-radius:5px;"/></a>
	</div>
	
	<div>
	
	<div id="tiles">
	<h3 style="color:#444;">Events By CrAC...</h3>
	<a href="images/posters/1.jpg" target="_blank"><img class src="images/posters/1.jpg" width="190" height="142"/></a>
	<a href="images/posters/2.jpg" target="_blank"><img class src="images/posters/2.jpg" width="190" height="142"/></a>
	<a href="images/posters/3.jpg" target="_blank"><img class src="images/posters/3.jpg" width="190" height="142"/></a>
	<a href="images/posters/4.jpg"  target="_blank"><img class src="images/posters/4.jpg" width="190" height="142"/></a>
	<a href="images/posters/5.jpg"  target="_blank"><img class src="images/posters/5.jpg" width="190" height="142"/></a>
	<!--<a href="images/posters/bnp.jpg"><img class src="images/posters/6.jpg" width="190" height="142"/></a>-->
	</div>
	</div>
 	<div id="footer">For any queries, contact Sarvagya Bahadur(+91-8742024260), Utsav Misra(+91-9660773252)<br/>
		For technical query, contact Abhinav +91-8741950885
	</div>
</div>
</div>

</body>
</html>
