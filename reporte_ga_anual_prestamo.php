<? include ("conexion.php"); include ("validar_login.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Reporte Ganancia Anual Por Prestamo | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$anio=$_GET['anio'];
		$query = "SELECT * FROM REPORTE_GA_POR_PRESTAMO(".$anio.")";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>NUMERO_PRESTAMO</td>
				<td>FECHA_SOLICITUD</td>
				<td>IMPORTE</td>
				<td>NO_PEDIDOS</td>
				<td>CODIGO_SOLICITANTE</td>
				<td>SOLICITANTE</td>
				<td>GANANCIA</td>
				<td>PR_GANANCIA</td>
			</tr>

			<tr>
				<td><hr></td>
				<td><hr></td>
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
					<td>$row->NUMERO_PRESTAMO</td>
					<td>$row->FECHA_SOLICITUD</td>
					<td>$row->IMPORTE</td>
					<td>$row->NO_PEDIDOS</td>
					<td>$row->CODIGO_SOLICITANTE</td>
					<td>$row->SOLICITANTE</td>
					<td>$row->GANANCIA</td>
					<td>$row->PR_GANANCIA</td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>