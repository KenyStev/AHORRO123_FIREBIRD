<? include ("conexion.php"); include ("validar_login.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Roles | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$query = "SELECT * FROM SP_ROLES_READ";
		$res = ibase_query($con, $query);
		if (!$res) {
			echo "No se puede mostrar los datos desde la consulta $query !!";
			exit;
		}
		echo "<table id='tabla'>\n";
		echo "
			<tr>
				<td>NO.</td>
				<td>ROL</td>
			</tr>

			<tr>
				<td><hr></td>
				<td><hr></td>
			</tr>
			\n";
		while ($row=ibase_fetch_object($res)) {
			echo "
				<tr>
					<td>$row->ID_ROL</td>
					<td>$row->NOMBRE</td>
					<td align=center><a href='modificar_rol.php?id=$row->ID_ROL'>Actualizar</a> | <a href='eliminar_rol.php?id=$row->ID_ROL'>Eliminar</a></td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>