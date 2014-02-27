<?php
//connecting to database
	$db=mysql_connect('localhost','joomla_bitsacm','Hrafd459$pz');
	if(!$db){
		die("connection fail, error 101 contact administrator");
	}
	$db_c=mysql_select_db("joomla_bitsacm",$db);
	if(!$db_c)
		die("connection failes, error 102 contact administrator");
?> 
<?php
	function redirect_to( $location = NULL ) {
			if ($location != NULL) {
				header("Location: {$location}");
				exit;
			}
	}
	
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

	function check_fields(){
		global $message;
		if(isset($_POST['Name']) && !empty($_POST['Name'])){//B1	
			if(isset($_POST['id']) && !empty($_POST['id'])){//B2
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
?>

<?php
	// echo $_POST['Name']."<br/>";
	// echo $_POST['id']."<br/>";
	// echo $_POST['mobile']."<br/>";
	// echo $_POST['email']."<br/>";
	check_fields();
	$_POST['Name'] = mysql_prep( $_POST['Name'] );
	$_POST['id'] = mysql_prep( $_POST['id'] );
	$_POST['mobile'] = mysql_prep( $_POST['mobile'] );
	$_POST['email'] = mysql_prep( $_POST['email'] );
	
	$query = "INSERT INTO  `joomla_bitsacm`.`bnp_user_data` (
			`name` ,
			`id` ,
			`mobile` ,
			`email`
			)
			VALUES (
			'{$_POST['Name']}',  '{$_POST['id']}',  '{$_POST['mobile']}',  '{$_POST['email']}'
			)";
	$queryrun = mysql_query($query);
	if(!$queryrun){
		die("Contact the ADMIN.<br/>");
	}
?>
<html>
<head>
<script type="text/javascript">
alert("Registration Successful !!");
</script>

</head>
<body></body>
</html>

<?php	
	redirect_to("flash.php");
?>