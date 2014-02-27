<?php
	session_start();
	session_destroy();
	echo "You are logged out...";
	header("location:./index.php?q=4");
?>