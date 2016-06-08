<?
	$con = ibase_connect("C:\\AppServ\\www\\PRESTAMOS_TBD1\\EMPLOYEE.FDB","SYSDBA","masterkey");
	if(!$con)
		{
			echo "Acceso Denegado";
			exit;
		}
?>