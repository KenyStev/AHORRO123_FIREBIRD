<? include ("conexion.php") ?>

<!DOCTYPE html>
<html>
<head>
	<title>Usuarios | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$query = "SELECT * FROM SP_USUARIO_READ";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>USUARIO</td>
			</tr>

			<tr>
				<td><hr></td>
			</tr>
			\n";
		while ($row=ibase_fetch_object($res)) {
			echo "
				<tr>
					<td>$row->ID_USUARIO</td>
					<td align=center><a href='modificar_usuario.php?id=$row->ID_USUARIO'>Actualizar</a> | <a href='eliminar_usuario.php?id=$row->ID_USUARIO'>Eliminar</a></td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>