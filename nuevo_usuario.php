<?
include('conexion.php');
include ("validar_login.php");

if (isset($_POST["btn_nuevo_usuario"]))
{
    $btn=$_POST["btn_nuevo_usuario"];
    if($btn == "Agregar usuario")
    {
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];
		
		$query = "EXECUTE PROCEDURE SP_USUARIO_CREATE('$usuario','$clave','SYSDBA')";

		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un usuario ha sido Almacenado en la Base de Datos');</script>";
		?>
		<script type="text/javascript">
			window.location.href="usuarios.php" //CAMBIAR;
		</script>
		<?
		
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear nuevo Usuario | KENYSTEV</title>
</head>
<body>
	<form name="fe" action="nuevo_usuario.php" method="POST">
        <table id='tabla' cellpadding=7>
        <!-- Nombre del Usuario -->
        <tr>
            <td align="center"><b>usuario:  </b></td><td><label><input name="usuario" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        <!-- Password del Usuario -->
        <tr>
            <td align="center"><b>clave:  </b></td><td><label><input name="clave" type="password" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        </table>

    	<input id='crear' type="submit" name="btn_nuevo_usuario" value="Agregar usuario"/>
	</form>
</body>
</html>

