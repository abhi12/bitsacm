<?php session_start();
//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator ");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c)
		die("connection failes, error 102 contact administrator ");
	
	$message = '';
?> 

<?php
	function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}


	function confirm_query($result_set) {
			if (!$result_set) {
				die("Database query failed: " . mysql_error());
			}
	}


	function redirect_to( $location = NULL ) {
			if ($location != NULL) {
				header("Location: {$location}");
				exit;
			}
	}

	function check_fields(){
		global $message;
		if(isset($_POST['username']) && !empty($_POST['username'])){//B1	
			if(isset($_POST['password']) && !empty($_POST['password'])){//B2
				if(isset($_POST['confirmPass']) && !empty($_POST['confirmPass'])){//B3
					if($_POST['confirmPass'] != $_POST['password']){
						$message .= "confirm password field does not match password.<br/>";
						break;
					}
					if(isset($_POST['mobile']) && !empty($_POST['mobile'])){//B4
						if(isset($_POST['email']) && !empty($_POST['email'])){//B5
							return true;
						}//B5					
						else{
							$message .= "email field is empty or invaild<br/>";
						}
					}//B4
					else{
						$message .= "mobile field is empty or invalid<br/>";
					}
				}//B3		
				else{
					$message .= "confirm passowrd is empty.<br/>";
				}
			}//B2
			else{
				$message .= "password field is empty<br/>";
			}
		}//B1
		else{
			$message .= "username is not set or field is empty <br/>";
		}
		return false;
	}

	function check_username($username){
		global $message;
		global $db;
		$usernameQuery = "SELECT * FROM `ww_user_data` WHERE username='{$_POST['username']}'";
		$usernameQueryRun = mysql_query($usernameQuery,$db);
		
		if($usernameQueryRun){
			while($data = mysql_fetch_array($usernameQueryRun)){
				if($data['username'] == $_POST['username']){
					redirect_to('index.php?q=5');
				}
			}
			
		}else{
			$message .= "Not connected to database";
		}		
	}

	function register_user(){
		global $message;
		global $db;
		if(!check_fields()){
			return false;
		}
		if(check_username($_POST['username'])){
			return false;
		}
		$_POST['username'] = mysql_prep($_POST['username']);
		$_POST['password'] = mysql_prep($_POST['password']);
		$_POST['mobile'] = mysql_prep($_POST['mobile']);
		$_POST['email'] = mysql_prep($_POST['email']);

		$pass = md5($_POST['password']);
		$registerQuery = "INSERT INTO  `joomla_bitsacm`.`ww_user_data` (
						`id` ,
						`name` ,
						`username` ,
						`password` ,
						`college` ,
						`email` ,
						`mobile` ,
						`element` ,
						`isLock_h` ,
						`isLock_e`
						)
						VALUES (
						NULL ,  '{$_POST['name']}',  '{$_POST['username']}', '{$pass}',  
						'{$_POST['college']}',  '{$_POST['email']}',  '{$_POST['mobile']}',  's',  '0',  '0'
						)";
		$registerQueryRun = mysql_query($registerQuery,$db);
		
		if(!$registerQueryRun){
			$message .= "Error in registration contact administrator  query not run";
		}
		
		
		$registerQuery2 = "INSERT INTO  `joomla_bitsacm`.`ww_poem_h` (
						`id` ,
						`username` ,
						`answer` ,
						`element`
						)
						VALUES (
						NULL ,  '{$_POST['username']}',  '',  ''
						)";
		$registerQueryRun = mysql_query($registerQuery2,$db);
		if(!$registerQueryRun){
			$message .= "Error in registration contact administrator  query return false";
		}

		$registerQuery2 = "INSERT INTO  `joomla_bitsacm`.`ww_poem_e` (
							`id` ,
							`username` ,
							`element` ,
							`answer`
							)
							VALUES (
							NULL ,  '{$_POST['username']}',  '',  ''
							)";
		$registerQueryRun = mysql_query($registerQuery2,$db);
		if(!$registerQueryRun){
			$message .= "Error in registration contact administrator  query return false";
		}
	}
?>

<?php
	if(isset($_GET['q'])){
		if($_GET['q'] == 1){
			$message .= "username or password is invalid.<br/>";
		}elseif($_GET['q'] == 2){
			$message .= "username already in use.<br/>";
		}elseif($_GET['q'] == 3){
			$message .= "not logged in.<br/>";
		}elseif($_GET['q'] == 4){
			$message .= "You are logged out...<br/>";
		}elseif($_GET['q'] == 5){
			$message .= "Username already exists.<br/>";
		}
		if($_GET['q']==0){
			register_user();
		}
	}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-16"/>
    <title>Whirl Word</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/base.css" />
   </head>
   
   <body>
	<div class="header">
		<img src="images/poetrylogo.png" height="70px" width="120px" style="padding-top:20px;"/>

		<p> & </p>
		<img src="images/acm.png" style="padding-top:10px;" />
		<p>present</p>
		 <img src="images/whirllogo.png"/>
		<img src="images/oasis-logo.png" style="padding-top:10px;margin-right:0;" />
	</div>

	<hr />
	<br>
   <div class="body">
   <center><div style="clear:both;">For Rules click <a href="./rules.pdf" target="_blank">here</a></div></center>
   <div class="msg" style="margin-left:30%;color:red;">
   	<?php
		if(empty($message)&&isset($_GET['q'])){
			echo "Please login";
		}else{
			echo $message;
		}
   	?>
   </div>
   	<div class="login">
   		<table class="form">
   			<form action="session.php" method="post">
   				<tr>
					<td>
						<h4>LOG IN</h4>
					</td>
				</tr>
   				<tr>
   					<td> Username:</td>
   					<td><input type="text" id="user_name" name="user_name" class="txtbox" /></td>
   				</tr>
   				<tr>
   					<td>Password:</td>
   					<td><input type="password" id="pass_word" name="pass_word" /></td>
   				</tr>
				<tr>
   					<td>Language:</td>
   					<td><select name="lang" />
					<option value="e">English</option>
					<option value="h">Hindi</option>
					</select></td>
   				</tr>
   			<tr><td colspan="2"><center>
   			<input type="submit" value="Login" name="login" /></center></td></tr>
   		</form>
   		</table>
   	</div>
   	<div class="register">
   		<table class="form" >
			<form action="index.php?q=0" method="post">
				<tr>
					<td>
						<h4>SIGN UP</h4>
					</td>
				</tr>
				
				<tr>
					<td class="label">
						Name:
					</td>
					<td>
						<input type="textbox" placeholder="Name" class="fields" name="name">
					</td>
				</tr>
				<tr>
					<td class="label">
						User ID :
					</td>
					<td>
						<input type="textbox" placeholder="Username" class="fields" name="username">
					</td>
				</tr>
					<!-- <br> -->
				<tr>
					<td class="label">
						Password :
					</td>
					<td>
						<input type="password" placeholder="Password" class="fields" name="password">
					</td>
				</tr>

				<tr>
					<td class="label">
						Confirm Password:
					</td>
					<td>
						<input type="password" placeholder="Confirm Password" class="fields" name="confirmPass">
					</td>
				</tr>
				
				<tr>
					<td class="label">
						College:
					</td>
					<td>
						<input type="textbox" placeholder="College" class="fields" name="college">
					</td>
				</tr>

				<tr>
					<td class="label">
						Email:
					</td>
					<td>
						<input type="email" placeholder="Email" class="fields" name="email">
					</td>
				</tr>
				<tr>
					<td class="label">
						Mobile:
					</td>
					<td>
						<input type="textbox" placeholder="Mobile" class="fields" name="mobile">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<center>
   						<input type="submit" value="Submit" />
   						</center>
   					</td>
   				</tr>


			</form>
			</table>
   	</div>
	<div id="footer"><center>Contact us: <br/> E-mail: poetryclub.bits@gmail.com, Phone: Tanayveer: +91-7891968834<br/>
		For technical query, contact Abhinav +91-8741950885</center>
	</div>
   </div>
   </body>
   </html>