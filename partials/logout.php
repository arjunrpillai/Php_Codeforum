<?php
	session_start();
	echo "Logout done";
	header("Location: /Forum/index.php");
	session_destroy();
?>