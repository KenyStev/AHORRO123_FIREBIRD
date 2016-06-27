<?
	session_start();
	$con = ibase_connect("C:\\AppServ\\www\\PRESTAMOS_TBD1\\AHORRO123DB.FDB","SYSDBA","masterkey");
	if(!$con)
		{
			echo "Acceso Denegado";
			exit;
		}
?>