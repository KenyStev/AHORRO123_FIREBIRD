<?
include('conexion.php');
include ("validar_login.php");

if (isset($_POST["btn_nuevo_rol"]))
{
    $btn=$_POST["btn_nuevo_rol"];
    if($btn == "Agregar Rol")
    {
		$rol=$_POST['rol'];
		
		$query = "EXECUTE PROCEDURE SP_ROLES_CREATE('$rol','SYSDBA')";

		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un rol ha sido Almacenado en la Base de Datos');</script>";
		?>
		<script type="text/javascript">
			window.location.href="roles.php" //CAMBIAR;
		</script>
		<?
		
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear nuevo Rol | KENYSTEV</title>
</head>
<body>
	<form name="fe" action="nuevo_rol.php" method="POST">
        <table id='tabla' cellpadding=7>
        <!-- Nombre del Rol -->
        <tr>
            <td align="center"><b>Rol:  </b></td><td><label><input name="rol" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        </table>

    	<input id='crear' type="submit" name="btn_nuevo_rol" value="Agregar Rol"/>
	</form>
</body>
</html>

