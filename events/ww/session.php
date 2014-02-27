<?php session_start();
//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator(Nihav Jain - 9549503022)");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c){
		die("connection failes, error 102 contact administrator(Nihav Jain - 9549503022)");
	}
	$elementArr = array('air','earth','ether','fire','water','s');
?> 

<?php
	//user_nmae,pass_word
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

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function initialize(){	
		if(isset($_POST['user_name']) && !empty($_POST['user_name'])){//B1	
			if(isset($_POST['pass_word']) && !empty($_POST['pass_word'])){//B2
				$_POST['pass_word'] = mysql_prep($_POST['pass_word']);
				return true;
			}//B2
			else{
				redirect_to('index.php?q=1');
			}
		}//B1
		else{
			redirect_to('index.php?q=1');
			// die('Username Not Valid');
		}
	}	
	function login_user(){
	//
		global $elementArr;
	//	
		initialize();
		global $db;
		$pass_word = md5($_POST['pass_word']);
		$loginQuery = "SELECT * FROM `ww_user_data` WHERE username='{$_POST['user_name']}'";
		$loginQueryRun = mysql_query($loginQuery,$db);
		
		if(!$loginQueryRun){
			redirect_to('index.php?q=1');
		}else{
			$user_data = mysql_fetch_array($loginQueryRun);
			if($user_data['password']!=$pass_word){
				redirect_to('index.php?q=1');
			}
			$_SESSION['username'] = $user_data['username'];
			//$elementArr = array('air','earth','ether','fire','water','s');
			if($user_data['element'] == 'a'){
				$_SESSION['element'] = $elementArr[0];
			}else if($user_data['element'] == 'e'){
				$_SESSION['element'] = $elementArr[1];
			}else if($user_data['element'] == 't'){
				$_SESSION['element'] = $elementArr[2];
			}else if($user_data['element'] == 'f'){
				$_SESSION['element'] = $elementArr[3];
			}else if($user_data['element'] == 'w'){
				$_SESSION['element'] = $elementArr[4];
			}else{
				$_SESSION['element'] = $elementArr[5];
			}
		
			// $_SESSION['element'] = $user_data['element'];
			$_SESSION['isLock_e'] = $user_data['isLock_e'];
			$_SESSION['isLock_h'] = $user_data['isLock_h'];
			// $_SESSION['lang'] = $user_data['lang'];
			$_SESSION['lang'] = $_POST['lang'];
		}
	}
	
?>

<?php
	login_user();
	$url = "./elements.php";
	redirect_to($url);
?>