<?php
	include ("conexion.php");
	if(!isset($_SESSION["current_user"])){
		echo "<script> window.location.href='login.php';</script>";
	}
?>
<a href="/PRESTAMOS_TBD1/">HOME</a></br>
<a href="logout.php">LOG OUT</a></br>