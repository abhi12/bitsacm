<?php session_start();
//require files
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
		if(isset($_POST['ans'])){
			$username = $_SESSION['username'];
			$ans = $_POST['ans'];
		}
		else{
			if($_SESSION['lang']=="e"){
				header("Location:./poem_e.php ");
			}else {
				header("Location:./poem_h.php ");
			}
			
		}
	}
	else{
		die('Username is Empty or Is Not Set');
	}
?>

<?php 
	$url = "poem_".$_SESSION['lang'].".php";
//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c)
		die("connection fails, error 102 contact administrator");
?> 

<?php
function redirect_to( $location = NULL ) {
			if ($location != NULL) {
				header("Location: {$location}");
				exit;
			}
}

function updateans(){
	// echo "bitch";
	global $db;
	global $username;
	global $ans;
	// echo $ans;
	// echo $username;
	$tablename = "ww_" . "poem_".$_SESSION['lang'];
	// echo $tablename;
	$query = "UPDATE  `joomla_bitsacm`.`{$tablename}` SET  `answer` =  '{$ans}' WHERE  `{$tablename}`.`username` ='{$username}'";
	
	$query_run = mysql_query($query);
	if(!$query_run){
		echo 'Not Updated Error Error in save.php Ln:13'. mysql_error();
	}			
}
?>
<?php
	
	$query = "SELECT * FROM `ww_user_data` WHERE username='{$_SESSION['username']}'";
	$queryRun = mysql_query($query,$db);
	
	if(!$queryRun){
		redirect_to('index.php?q=3');
	}
	$user_data = mysql_fetch_array($queryRun);
	if($_SESSION['lang'] == 'e'){
		if($user_data['isLock_e'] == 1){
			redirect_to("./"."{$url}");
		}
	}elseif($_SESSION['lang'] == 'h'){
		if($user_data['isLock_h'] == 1){
			redirect_to("./"."{$url}");
		}
	}
	updateans();
	// echo $_POST['submit'];
	if($_POST['submit'] == 1){
		if($_SESSION['lang'] == 'e')
			$query = "UPDATE `ww_user_data` SET `isLock_e` = 1 WHERE `username` = '{$username}'";
		else if($_SESSION['lang'] == 'h')
			$query = "UPDATE `ww_user_data` SET `isLock_h` = 1 WHERE `username` = '{$username}'";
		else
			redirect_to("index.php?q=3");
			
		$query_run = mysql_query($query);
	
		if(!$query_run){
			echo 'Not Locked Error Error in save.php Ln:40';
		}
		
		if($_SESSION['lang']=='e')
			$_SESSION['isLock_e'] = 1;
		else if($_SESSION['lang']=='h')
			$_SESSION['isLock_h'] = 1;
	}
	redirect_to("./"."{$url}");
?>