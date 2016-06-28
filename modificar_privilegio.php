<?php 
 include('conexion.php');
 include ("validar_login.php");
 ?>

<!DOCTYPE HTML>

<?php
		$ide=$_GET['id'];
		$query= "SELECT * FROM PRIVILEGIOS P WHERE P.ID_PRIVI=$ide";
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
		$privilegio=$_POST['privilegio'];
		
		$query = "EXECUTE PROCEDURE SP_PRIVILEGIOS_UPDATE('$ide','$privilegio','SYSDBA')";
		
		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Privilegio ha sido Actualizado');</script>";
		?>
		<script type="text/javascript">
		window.location.href="privilegios.php";
		</script>
		<?
		
    }

}
?>


<html>
<head>

<title>Modificar Privilegio: </title>

</head>
	
<body>
<center>	

	<p>Modificar información</p>
	<hr width=50%>
	
	<form name="fe" action="modificar_privilegio.php" method="POST">
		<table id='tabla' cellpadding=7>
        <!-- Nombre del Privilegio -->
        <tr>
            <td align="center"><b>Privilegio:  </b></td><td><label><input name="privilegio" type="text" size=35 value="<?echo $row->NOMBRE?>" style="font-size:18px" required autofocus/></label></td>
        </tr>
        </table>
	<input id='modificar' type="submit" name="btn_modificar" value="Guardar Cambios"/>
  

</form>

</center>	
</body>

</html>

