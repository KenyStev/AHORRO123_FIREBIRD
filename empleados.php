<? include ("conexion.php"); include ("validar_login.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Empleados | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$query = "SELECT * FROM SP_EMPLEADOS_READ";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>NOMBRE</td>
				<td>APELLIDOS</td>
				<td>DIRECCION</td>
			</tr>

			<tr>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
			</tr>
			\n";
		while ($row=ibase_fetch_object($res)) {
			$DIRECCION = "Referencia: ".$row->DIREC_REFER.", Calle: ".$row->DIREC_CALLE.", AVE: ".$row->DIREC_AVE.", Casa: ".$row->DIREC_NUM_CASA.", Ciudad: ".$row->DIREC_CIUDAD.", Depto.: ".$row->DIREC_DEPTO;
			echo "
				<tr>
					<td>$row->NOMBRE_N1 $row->NOMBRE_N2</td>
					<td>$row->NOMBRE_A1 $row->NOMBRE_A2</td>
					<td>$DIRECCION</td>
					<td align=center><a href='modificar_empleado.php?id=$row->ID_EMPLEADO'>Actualizar</a> | <a href='eliminar_empleado.php?id=$row->ID_EMPLEADO'>Eliminar</a></td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>