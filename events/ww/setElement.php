<?php session_start();
//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection failed, error 101 contact administrator(Nihav Jain - 9549503022)");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c){
		die("connection failed, error 102 contact administrator(Nihav Jain - 9549503022)");
	}
	
	function redirect_to( $location = NULL ) {
			if ($location != NULL) {
				header("Location: {$location}");
				exit;
			}
	}
?>

<?php
	$elementArr = array('earth','fire','air','water','ether','s');
?>

<?php
	if(!(isset($_GET['element']) && !empty($_GET['element']))){
		die("element not set");
	}
	$q;
	if($_GET['element'] == 1){
		$_SESSION['element'] = $elementArr[0];
		$q = 'e';
	}else if($_GET['element'] == 2){
		$_SESSION['element'] = $elementArr[1];
		$q = 'f';
	}else if($_GET['element'] == 3){
		$_SESSION['element'] = $elementArr[2];
		$q = 'a';
	}else if($_GET['element'] == 4){
		$_SESSION['element'] = $elementArr[3];
		$q = 'w';
	}else if($_GET['element'] == 5){
		$_SESSION['element'] = $elementArr[4];
		$q = 't';
	}else{
		$_SESSION['element'] = $elementArr[5];
		$q = 's';
	}


	$query = "UPDATE ww_user_data SET `element`= '{$q}' WHERE `username` = '{$_SESSION['username']}'";
	
	$tablename = "ww_poem_e";
	$query1 = "UPDATE  `joomla_bitsacm`.`{$tablename}` SET  `element` =  '{$q}' WHERE  `{$tablename}`.`username` ='{$_SESSION['username']}'";	
	$query_run1 = mysql_query($query1);
	
	$tablename1 = "ww_poem_h";
	$query2 = "UPDATE  `joomla_bitsacm`.`{$tablename1}` SET  `element` =  '{$q}' WHERE  `{$tablename1}`.`username` ='{$_SESSION['username']}'";	
	$query_run2 = mysql_query($query2);
	
	if(!mysql_query($query,$db)){
		die("Element not selected " . mysql_error());
	}
	if($_SESSION['lang'] == 'e')
		redirect_to("poem_e.php");
	elseif($_SESSION['lang'] == 'h')
		redirect_to("poem_h.php");
	else
		redirect_to("index.php?q=3");
?>