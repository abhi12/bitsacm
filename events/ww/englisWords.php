<?php session_start();
//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator(Nihav Jain - 9549503022)");
	}
	$db_c=mysql_select_db("poet",$db);
	if(!$db_c)
		die("connection failes, error 102 contact administrator(Nihav Jain - 9549503022)");
	}

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
?>

<?php
	$tableName = "ww_" . $_SESSION['element'] . "_e";
	$query = "SELECT * FROM `{$tableName}` WHERE check=0";
	$queryRun = mysqli_query($usernameQuery,$db);
		
	if($queryRun){
		die("elements are not working");
	}
	while($data = mysqli_fetch_array($queryRun)){
		array_push($restricted,$data);
	}
	array_push($return,$restricted);

	$query = "SELECT * FROM `{$tableName}` WHERE check=1";
	$queryRun = mysqli_query($usernameQuery,$db);
		
	if($queryRun){
		die("elements are not working");
	}
	while($data = mysqli_fetch_array($queryRun)){
		array_push($allowed,$data);
	}
	array_push($return,$allowed);


	$query = "SELECT * FROM `ww_poem_e` WHERE username='{$_SESSION['username']}'";
	$queryRun = mysqli_query($usernameQuery,$db);
		
	if($queryRun){
		redirect_to(login.php?q=2);
	}
	$userAnswer = mysqli_fect_array($queryRun);
	array_push($return,$userAnswer['answer']);


	array_push($return,$_SESSION['isLock']);

	
	echo json_encode($return);
?>