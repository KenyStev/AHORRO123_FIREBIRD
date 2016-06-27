<? include ("conexion.php") ?>

<!DOCTYPE html>
<html>
<head>
	<title>Privilegios | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$query = "SELECT * FROM SP_PRIVILEGIOS_READ";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>NO.</td>
				<td>PRIVILEGIO</td>
			</tr>

			<tr>
				<td><hr></td>
				<td><hr></td>
			</tr>
			\n";
		while ($row=ibase_fetch_object($res)) {
			echo "
				<tr>
					<td>$row->ID_PRIVI</td>
					<td>$row->NOMBRE</td>
					<td align=center><a href='modificar_privilegio.php?id=$row->ID_PRIVI'>Actualizar</a> | <a href='eliminar_privilegio.php?id=$row->ID_PRIVI'>Eliminar</a></td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>