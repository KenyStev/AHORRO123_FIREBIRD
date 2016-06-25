<? include ("conexion.php") ?>

<!DOCTYPE html>
<html>
<head>
	<title>Externos | AHORRO123 | KENYSTEV</title>
</head>
<body>
	<?
		$query = "SELECT * FROM SP_EXTERNOS_READ";
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
				<td>PARENTESCO AVAL</td>
			</tr>

			<tr>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
				<td><hr></td>
			</tr>
			\n";
		while ($row=ibase_fetch_object($res)) {
			$DIRECCION = "Referencia: ".$row->DIREC_REFER.", Calle: ".$row->DIREC_CALLE.", AVE: ".$row->DIREC_AVE.", Casa: ".$row->DIREC_NUN_CASA.", Ciudad: ".$row->DIREC_CIUDAD.", Depto.: ".$row->DIREC_DEPTO;
			echo "
				<tr>
					<td>$row->NOMBRE_N1 $row->NOMBRE_N2</td>
					<td>$row->NOMBRE_A1 $row->NOMBRE_A2</td>
					<td>$DIRECCION</td>
					<td>$row->PARENTESCO_AVAL</td>
					<td align=center><a href='modificar_externo.php?id=$row->ID_EXTERNO'>Actualizar</a> | <a href='eliminar_externo.php?id=$row->ID_EXTERNO'>Eliminar</a></td>
				</tr>\n
			";
		}
		echo "</table>\n";
	?>
</body>
</html>