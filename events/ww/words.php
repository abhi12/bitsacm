<?php session_start();
//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator(Nihav Jain - 9549503022)");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c)
		die("connection failes, error 102 contact administrator(Nihav Jain - 9549503022)");
	

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
?>

<?php
//format:- restricted array, allowed array, answer, isLock
	$return = array();
	$restricted = array();
	$allowed = array();
	// $_SESSION['element']='air';
	// $_SESSION['username']='q';
?>

<?php
	if(isset($_POST['lang']) && !empty($_POST['lang'])){
		
		if($_POST['lang'] == 'e'){
			$tableName = "ww_" . $_SESSION['element'] . "_e";
			$tablename_2 = "ww_" . "poem_e";
		}elseif($_POST['lang'] == 'h'){
			$tableName = "ww_" . $_SESSION['element'] . "_h";
			$tablename_2 = "ww_" . "poem_h";
		}else{
			die();
		}
		
		$query = "SELECT * 
				FROM  `{$tableName}` 
				WHERE  `check` =0";
		$queryRun = mysql_query($query,$db);
			
		if(!$queryRun){
			die("elements are not working");
		}
		
		while($data = mysql_fetch_array($queryRun)){
			array_push($restricted,$data['words']);
		}
		array_push($return,$restricted);

		$query = "SELECT * 
				FROM  `{$tableName}` 
				WHERE  `check` =1";
		$queryRun = mysql_query($query,$db);
			
		if(!$queryRun){
			die("elements are not working");
		}
		while($data = mysql_fetch_array($queryRun)){
			array_push($allowed,$data['words']);
		}
		array_push($return,$allowed);

		$query = "SELECT * FROM `{$tablename_2}` WHERE username='{$_SESSION['username']}'";
		$queryRun = mysql_query($query,$db);
			
		if(!$queryRun){
			redirect_to('index.php?q=2');
		}
		$userAnswer = mysql_fetch_array($queryRun);
		if(empty($userAnswer)){
			array_push($return, "");
		}else{
			array_push($return,$userAnswer['answer']);
		}
		if($_SESSION['lang']=='e')
			array_push($return,$_SESSION['isLock_e']);
		else if($_SESSION['lang']=='h')
			array_push($return,$_SESSION['isLock_h']);

		array_push($return,$_SESSION['element']);
		echo json_encode($return);
	}
?>