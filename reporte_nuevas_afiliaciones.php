<? include ("conexion.php");include ("validar_login.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Reporte Nuevas Afiliaciones | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$anio=$_GET['anio'];
		$query = "SELECT * FROM REPORTE_NUEVAS_AFILIACIONES(".$anio.")";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>ID_EMPLEADO</td>
				<td>NOMBRE</td>
				<td>FECHA_AFILIACION</td>
				<td>INVERSION</td>
				<td>AHORRO</td>
				<td>TOTAL</td>
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
			echo "
				<tr>
					<td>$row->ID_EMPLEADO</td>
					<td>$row->NOMBRE</td>
					<td>$row->FECHA_AFILIACION</td>
					<td>$row->INVERSION</td>
					<td>$row->AHORRO</td>
					<td>$row->TOTAL</td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>