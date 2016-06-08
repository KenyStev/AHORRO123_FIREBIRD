<? include ("conexion.php") ?>

<!DOCTYPE html>
<html>
<head>
	<title>Prestamos TBD1 | Kenystev | FireBird</title>
</head>
<body>
	<?
		$query = "SELECT EMP_NO, FIRST_NAME, LAST_NAME FROM EMPLOYEE";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>NO. EMPLEADO</td>
				<td>NOMBRE</td>
				<td>APELLIDO</td>
			</tr>

			<tr>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
			</tr>
			\n";
		while ($row=ibase_fetch_object($res)) {
			echo "
				<tr>
					<td>$row->EMP_NO</td>
					<td>$row->FIRST_NAME</td>
					<td>$row->LAST_NAME</td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>