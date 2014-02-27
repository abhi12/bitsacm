<?php function connect(){
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c){
		die("connection failes, error 102");
	}
}
?>