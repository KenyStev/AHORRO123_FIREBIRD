<? include ("conexion.php"); include ("validar_login.php");
	if (isset($_POST["btn_cierre_anual"]))
	{
	    $btn=$_POST["btn_cierre_anual"];
	    if($btn == "Reporte Cierre Anual")
	    {
			$anio=$_POST['anio'];
			echo "<script type='text/javascript'>window.location.href='reporte_cierre_anual.php?anio=$anio';</script>";
	    }

	}else if (isset($_POST["btn_REPORTE_GA_POR_PRESTAMO"]))
	{
	    $btn=$_POST["btn_REPORTE_GA_POR_PRESTAMO"];
	    if($btn == "Reporte Ganancia Anual Por Prestamo")
	    {
			$anio=$_POST['anio'];
			echo "<script type='text/javascript'>window.location.href='reporte_ga_anual_prestamo.php?anio=$anio';</script>";
	    }

	}else if (isset($_POST["btn_REPORTE_NUEVAS_AFILIACIONES"]))
	{
	    $btn=$_POST["btn_REPORTE_NUEVAS_AFILIACIONES"];
	    if($btn == "Reporte Nuevas Afiliaciones")
	    {
			$anio=$_POST['anio'];
			echo "<script type='text/javascript'>window.location.href='reporte_nuevas_afiliaciones.php?anio=$anio';</script>";
	    }

	}else if (isset($_POST["btn_REPORTE_INVERSION_POR_EMPLEADO"]))
	{
	    $btn=$_POST["btn_REPORTE_INVERSION_POR_EMPLEADO"];
	    if($btn == "Reporte Inversion por Empleado")
	    {
			$empleado=$_POST['empleados'];
			echo "<script type='text/javascript'>window.location.href='reporte_inversion_por_empleado.php?empleado=$empleado';</script>";
	    }

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reportes | KENYSTEV</title>
</head>
<body>
	<form name="fe" action="" method="POST">
		<table id='tabla' cellpadding=7>
		<!-- Año -->
        <tr>
            <td align="center"><b>Seleccione año:  </b></td><td><label>

            <input name="anio" type="text" size=35 style="font-size:18px"  /></label></td>
        </tr>
        <!-- Cierre Anual -->
		<tr>
			<td>
				<input id='reporte_cierre_anual' type="submit" name="btn_cierre_anual" value="Reporte Cierre Anual"/>
			</td>
		</tr>
		<!-- REPORTE_GA_POR_PRESTAMO -->
		<tr>
			<td>
				<input id='REPORTE_GA_POR_PRESTAMO' type="submit" name="btn_REPORTE_GA_POR_PRESTAMO" value="Reporte Ganancia Anual Por Prestamo"/>
			</td>
		</tr>
		<!-- REPORTE_NUEVAS_AFILIACIONES -->
		<tr>
			<td>
				<input id='REPORTE_NUEVAS_AFILIACIONES' type="submit" name="btn_REPORTE_NUEVAS_AFILIACIONES" value="Reporte Nuevas Afiliaciones"/>
			</td>
		</tr>
		<!-- codigo empleado -->
		<tr>
			<td>
				lista de Empleados:
		        <select name='empleados'>
		            <option value="">--- Select ---</option>
		            <?php

		            $sql = "SELECT * FROM EMPLEADOS";
		            $list = ibase_query($con, $sql);

		            while($row=ibase_fetch_object($list)){
		            
			            echo "<option value='$row->ID_EMPLEADO'>";
			            echo $row->NOMBRE_N1." ".$row->NOMBRE_N2." ".$row->NOMBRE_A1." ".$row->NOMBRE_A2;
			            echo "</option>";
		            }
		            ?>
		        </select>
			</td>
			<td>
				<input id='REPORTE_INVERSION_POR_EMPLEADO' type="submit" name="btn_REPORTE_INVERSION_POR_EMPLEADO" value="Reporte Inversion por Empleado"/>
			</td>
		</tr>
	</form>
</body>
</html>