<?php 
 include('conexion.php');
 include ("validar_login.php");
 ?>

<!DOCTYPE HTML>

<?php
		$ide=$_GET['id'];
		$query= "SELECT * FROM EXTERNOS E WHERE E.ID_EXTERNO=$ide";
		$res=ibase_query($con, $query);
		if(!res)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		$row=ibase_fetch_object($res);


if (isset($_POST["btn_modificar"]))
{
    $btn=$_POST["btn_modificar"];
    if($btn == "Guardar Cambios")
    {
		$fecha_nacimiento=$_POST['fecha_nacimiento'];
		$parentesco_aval=$_POST['parentesco_aval'];
		$PN = $_POST['Primer_Nombre'];
		$SN = $_POST['Segundo_Nombre'];
		$PA = $_POST['Primer_Apellido'];
		$SA = $_POST['Segundo_Apellido'];
		$Direc_Referencia = $_POST['Direc_Referencia'];
		$Direc_Calle = $_POST['Direc_Calle'];
		$Direc_Avenida = $_POST['Direc_Avenida'];
		$Direc_Num_Casa = $_POST['Direc_Num_Casa'];
		$Direc_Ciudad = $_POST['Direc_Ciudad'];
		$Direc_Depto = $_POST['Direc_Depto'];
		$Correo_1 = $_POST['Correo_1'];
		$Correo_2 = $_POST['Correo_2'];
		
		$query = "EXECUTE PROCEDURE SP_EXTERNOS_UPDATE('$ide','$fecha_nacimiento','$parentesco_aval','$PN','$SN','$PA','$SA','$Direc_Referencia','$Direc_Calle','$Direc_Avenida','$Direc_Num_Casa','$Direc_Ciudad','$Direc_Depto','$Correo_1','$Correo_2','SYSDBA')";
		
		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Externo ha sido Actualizado');</script>";
		?>
		<script type="text/javascript">
		window.location.href="externos.php";*
		</script>
		<?
		
    }

}
?>


<html>
<head>

<title>Modificar Externo: </title>

</head>
	
<body>
<center>	

	<p>Modificar información</p>
	<hr width=50%>
	
	<form name="fe" action="" method="POST">
		<table id='tabla' cellpadding=7>
        <!-- fecha de nacimiento -->
        <tr>
            <td align="center"><b>Fecha de Nacimiento:  </b></td><td><label><input name="fecha_nacimiento" type="date" size=35 value="<?echo $row->FECHA_NAC?>" style="font-size:18px" required autofocus/></label></td>
        </tr>
        <tr>
        <!-- Parentesco con Aval -->
        <tr>
            <td align="center"><b>Parentesco con Aval:  </b></td><td><label><input name="parentesco_aval" type="text" size=35 value="<?echo $row->PARENTESCO_AVAL?>" style="font-size:18px" required /></label></td>
        </tr>
        <tr>
        <!-- Primer Nombre -->
        <tr>
            <td align="center"><b>Primer Nombre:  </b></td><td><label><input name="Primer_Nombre" type="text" size=35 style="font-size:18px" value="<?echo $row->NOMBRE_N1?>" required /></label></td>
        </tr>
        <!-- Segundo Nombre -->
        <tr>
            <td align="center"><b>Segundo Nombre:  </b></td><td><label><input name="Segundo_Nombre" type="text" size=35 style="font-size:18px" value="<?echo $row->NOMBRE_N2?>" required /></label></td>
        </tr>
        <!-- Primer Apellido -->
        <tr>
            <td align="center"><b>Primer Apellido:  </b></td><td><label><input name="Primer_Apellido" type="text" size=35 style="font-size:18px" value="<?echo $row->NOMBRE_A1?>" required /></label></td>
        </tr>
        <!-- Segundo Apellido -->
        <tr>
            <td align="center"><b>Segundo Apellido:  </b></td><td><label><input name="Segundo_Apellido" type="text" size=35 style="font-size:18px" value="<?echo $row->NOMBRE_A2?>" required /></label></td>
        </tr>
        <!-- Direccion de Referencia -->
        <tr>
            <td align="center"><b>Direccion de Referencia:  </b></td><td><label><input name="Direc_Referencia" type="text" size=35 style="font-size:18px" value="<?echo $row->DIREC_REFER?>" required /></label></td>
        </tr>
        <!-- Direccion Calle -->
        <tr>
            <td align="center"><b>Direccion Calle:  </b></td><td><label><input name="Direc_Calle" type="text" size=35 style="font-size:18px" value="<?echo $row->DIREC_CALLE?>" required /></label></td>
        </tr>
        <!-- Direccion Avenida -->
        <tr>
            <td align="center"><b>Direccion Avenida:  </b></td><td><label><input name="Direc_Avenida" type="text" size=35 style="font-size:18px" value="<?echo $row->DIREC_AVE?>" required /></label></td>
        </tr>
        <!-- Direccion Numero de Casa -->
        <tr>
            <td align="center"><b>Direccion Numero de Casa:  </b></td><td><label><input name="Direc_Num_Casa" type="text" size=35 style="font-size:18px" value="<?echo $row->DIREC_NUN_CASA?>" required /></label></td>
        </tr>
        <!-- Direccion Ciudad -->
        <tr>
            <td align="center"><b>Direccion Ciudad:  </b></td><td><label><input name="Direc_Ciudad" type="text" size=35 style="font-size:18px" value="<?echo $row->DIREC_CIUDAD?>" required /></label></td>
        </tr>
        <!-- Direccion Depto -->
        <tr>
            <td align="center"><b>Direccion Depto:  </b></td><td><label><input name="Direc_Depto" type="text" size=35 style="font-size:18px" value="<?echo $row->DIREC_DEPTO?>" required /></label></td>
        </tr>
        <!-- Correo Primario -->
        <tr>
            <td align="center"><b>Correo Primario:  </b></td><td><label><input name="Correo_1" type="text" size=35 style="font-size:18px" value="<?echo $row->CORREO_1?>" required /></label></td>
        </tr>
        <!-- Correo Secundario -->
        <tr>
            <td align="center"><b>Correo Secundario:  </b></td><td><label><input name="Correo_2" type="text" size=35 style="font-size:18px" value="<?echo $row->CORREO_2?>" required /></label></td>
        </tr>
        </table>
	<input id='modificar' type="submit" name="btn_modificar" value="Guardar Cambios"/>
  

</form>

</center>	
</body>

</html>

