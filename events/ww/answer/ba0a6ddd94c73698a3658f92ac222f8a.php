
<?php
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c)
		die("connection fails, error 102 contact administrator");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <meta http-equiv="content-type" content="text/html; charset=utf-16"/>
  </head>
<body style="background-color:#000;color:#fff;">  
<center>
<h1>Answers for english poems</h1><br/><hr/>
<?php
	$query = "SELECT * FROM `ww_poem_e`";
	$queryRun = mysql_query($query,$db);
	
	while($user_data = mysql_fetch_array($queryRun)) {
		echo $user_data['username'];
		echo ":<br/>";
		echo "<pre>".$user_data['answer']."</pre>";
		echo "<br/><hr/><br/>";
	}
?>
</center>
</body>
</html>