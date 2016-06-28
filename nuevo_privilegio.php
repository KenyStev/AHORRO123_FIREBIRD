<?
include('conexion.php');
include ("validar_login.php");

if (isset($_POST["btn_nuevo_privilegio"]))
{
    $btn=$_POST["btn_nuevo_privilegio"];
    if($btn == "Agregar Privilegio")
    {
		$privilegio=$_POST['privilegio'];
		
		$query = "EXECUTE PROCEDURE SP_PRIVILEGIOS_CREATE('$privilegio','SYSDBA')";

		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Privilegio ha sido Almacenado en la Base de Datos');</script>";
		?>
		<script type="text/javascript">
			window.location.href="privilegios.php" //CAMBIAR;
		</script>
		<?
		
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear nuevo Privilegio | KENYSTEV</title>
</head>
<body>
	<form name="fe" action="nuevo_privilegio.php" method="POST">
        <table id='tabla' cellpadding=7>
        <!-- Nombre del Privilegio -->
        <tr>
            <td align="center"><b>Privilegio:  </b></td><td><label><input name="privilegio" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        </table>

    	<input id='crear' type="submit" name="btn_nuevo_privilegio" value="Agregar Privilegio"/>
	</form>
</body>
</html>

