<?php
	session_start();
	unset($_SESSION["current_user"]);
	echo "<script> window.location.href='login.php';</script>";
?>