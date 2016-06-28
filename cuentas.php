<? include ("conexion.php"); include ("validar_login.php");?>

<!DOCTYPE html>
<html>
<head>
	<title>Cuentas | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$query = "SELECT * FROM SP_CUENTAS_READ";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>NO. CUENTA</td>
				<td>FECHA APERTURA</td>
				<td>SALDO</td>
				<td>TIPO</td>
				<td>EMPLEADO</td>
				<td>INVERSION</td>
			</tr>

			<tr>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
			</tr>
			\n";
		while ($row=ibase_fetch_object($res)) {
			/*$sql="SELECT * FROM EMPLEADOS E WHERE E.ID_EMPLEADO = $row->ID_EMPLEADO";
			$res=ibase_query($con,$sql);
			$obejct = ibase_fetch_object($res);
			$empleado_nombre = $obejct->NOMBRE_N1." ".$obejct->NOMBRE_N2." ".$obejct->NOMBRE_A1." ".$obejct->NOMBRE_A2;*/
			echo "
				<tr>
					<td>$row->ID_CUENTA</td>
					<td>$row->FECHA_APER</td>
					<td>$row->SALDO</td>
					<td>$row->TIPO</td>
					<td>$row->ID_EMPLEADO</td>
					<td>$row->INVERSION</td>
					<td align=center><a href='eliminar_cuenta.php?id=$row->ID_CUENTA'>Eliminar</a></td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>