<?
include('conexion.php');
include ("validar_login.php");

if (isset($_POST["btn_nuevo_externo"]))
{
    $btn=$_POST["btn_nuevo_externo"];
    if($btn == "Agregar Externo")
    {
		$fecha_nacimiento=$_POST['fecha_nacimiento'];
		$parentesco_aval=$_POST['parentesco_aval'];
		$PN = $_POST['Primer_Nombre'];
		$SN = $_POST['Segundo_Nombre'];
		$PA = $_POST['Primer_Apellido'];
		$SA = $_POST['Segundo_Apellido'];
		$Direc_Referencia = $_POST['Direc_Referencia'];
		$Direc_Calle = $_POST['Direc_Calle'];
		$Direc_Avenida = $_POST['Direc_Avenida'];
		$Direc_Num_Casa = $_POST['Direc_Num_Casa'];
		$Direc_Ciudad = $_POST['Direc_Ciudad'];
		$Direc_Depto = $_POST['Direc_Depto'];
		$Correo_1 = $_POST['Correo_1'];
		$Correo_2 = $_POST['Correo_2'];
		
		$query = "EXECUTE PROCEDURE SP_EXTERNOS_CREATE('$fecha_nacimiento','$parentesco_aval','$PN','$SN','$PA','$SA','$Direc_Referencia','$Direc_Calle','$Direc_Avenida','$Direc_Num_Casa','$Direc_Ciudad','$Direc_Depto','$Correo_1','$Correo_2','SYSDBA')";

		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Externo ha sido Almacenado en la Base de Datos');</script>";
		?>
		<script type="text/javascript">
			window.location.href="externos.php" //CAMBIAR;
		</script>
		<?
		
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="fe" action="nuevo_externo.php" method="POST">
        <table id='tabla' cellpadding=7>
        <!-- fecha de nacimiento -->
        <tr>
            <td align="center"><b>Fecha de Nacimiento:  </b></td><td><label><input name="fecha_nacimiento" type="date" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        <tr>
        <!-- Parentesco Aval -->
        <tr>
            <td align="center"><b>Parentesco Aval:  </b></td><td><label><input name="parentesco_aval" type="text" size=35  style="font-size:18px" required /></label></td>
        </tr>
        <tr>
        <!-- Primer Nombre -->
        <tr>
            <td align="center"><b>Primer Nombre:  </b></td><td><label><input name="Primer_Nombre" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Segundo Nombre -->
        <tr>
            <td align="center"><b>Segundo Nombre:  </b></td><td><label><input name="Segundo_Nombre" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Primer Apellido -->
        <tr>
            <td align="center"><b>Primer Apellido:  </b></td><td><label><input name="Primer_Apellido" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Segundo Apellido -->
        <tr>
            <td align="center"><b>Segundo Apellido:  </b></td><td><label><input name="Segundo_Apellido" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Direccion de Referencia -->
        <tr>
            <td align="center"><b>Direccion de Referencia:  </b></td><td><label><input name="Direc_Referencia" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Direccion Calle -->
        <tr>
            <td align="center"><b>Direccion Calle:  </b></td><td><label><input name="Direc_Calle" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Direccion Avenida -->
        <tr>
            <td align="center"><b>Direccion Avenida:  </b></td><td><label><input name="Direc_Avenida" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Direccion Numero de Casa -->
        <tr>
            <td align="center"><b>Direccion Numero de Casa:  </b></td><td><label><input name="Direc_Num_Casa" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Direccion Ciudad -->
        <tr>
            <td align="center"><b>Direccion Ciudad:  </b></td><td><label><input name="Direc_Ciudad" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Direccion Depto -->
        <tr>
            <td align="center"><b>Direccion Depto:  </b></td><td><label><input name="Direc_Depto" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Correo Primario -->
        <tr>
            <td align="center"><b>Correo Primario:  </b></td><td><label><input name="Correo_1" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        <!-- Correo Secundario -->
        <tr>
            <td align="center"><b>Correo Secundario:  </b></td><td><label><input name="Correo_2" type="text" size=35 style="font-size:18px" required /></label></td>
        </tr>
        </table>

    	<input id='crear' type="submit" name="btn_nuevo_externo" value="Agregar Externo"/>
	</form>
</body>
</html>

