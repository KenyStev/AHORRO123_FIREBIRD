<?
include('conexion.php');

if (isset($_POST["btn_nuevo_cuenta"]))
{
    $btn=$_POST["btn_nuevo_cuenta"];
    if($btn == "Agregar cuenta")
    {
		$id_empleado=$_POST['empleados'];

		//AHORRO
		$saldo=$_POST['saldo_ahorro'];
		$inversion=$_POST['inversion_ahorro'];
		//INVERSION
		$saldo=$_POST['saldo_inversion'];
		$inversion=$_POST['inversion_inversion'];

		echo "<script>alert('".$id_empleado."');</script>";
		
		$query = "EXECUTE PROCEDURE SP_CUENTAS_CREATE('$saldo_ahorro','AHORRO','SYSDBA','$id_empleado','$inversion_ahorro')";

		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}

		$query = "EXECUTE PROCEDURE SP_CUENTAS_CREATE('$saldo_inversion','INVERSION','SYSDBA','$id_empleado','$inversion_inversion')";

		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Dos cuenta ha sido Almacenado en la Base de Datos');</script>";
		?>
		<script type="text/javascript">
			window.location.href="cuentas.php" //CAMBIAR;
		</script>
		<?
		
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear nueva Cuenta | KENYSTEV</title>
</head>
<body>
	<form name="fe" action="nuevo_cuenta.php" method="POST">
        <table id='tabla' cellpadding=7>
        <!-- Empleado de la cuenta -->
        <tr>
            <td align="center"><b>Empleado:  </b></td><td><label>
            <select name='empleados'>
            <option value="">--- Select ---</option>
            <?
            	$query="SELECT * FROM FN_GET_EMPLEADOS_SIN_CUENTA";
            	$res=ibase_query($con,$query);
            	while ($row = ibase_fetch_object($res)) {
            		echo "<option value='$row->ID_EMPLEADO'>";
		            echo $row->NOMBRE;
		            echo "</option>";
            	}
            ?>
            </select>
        </tr>
        <!-- Saldo de la cuenta de AHORRO -->
        <tr>
        	<td align="center">CUENTA DE AHORRO</td>
        </tr>
        <tr>
            <td align="center"><b>Saldo:  </b></td><td><label><input name="saldo_ahorro" type="number" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        <!-- Inversion de la cuenta -->
        <tr>
            <td align="center"><b>Inversion:  </b></td><td><label><input name="inversion_ahorro" type="number" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        <!-- Saldo de la cuenta de INVERSION -->
        <tr>
        	<td align="center">CUENTA DE INVERSION</td>
        </tr>
        <tr>
            <td align="center"><b>Saldo:  </b></td><td><label><input name="saldo_inversion" type="number" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        <!-- Inversion de la cuenta -->
        <tr>
            <td align="center"><b>Inversion:  </b></td><td><label><input name="inversion_inversion" type="number" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        </table>

    	<input id='crear' type="submit" name="btn_nuevo_cuenta" value="Agregar cuenta"/>
	</form>
</body>
</html>

