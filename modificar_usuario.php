<?php 
 include('conexion.php');
 ?>

<!DOCTYPE HTML>

<?php
		$ide=$_GET['id'];
		$query= "SELECT * FROM USUARIO U WHERE U.ID_USUARIO='$ide'";
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
		$clave=$_POST['clave'];
		
		$query = "EXECUTE PROCEDURE SP_USUARIO_UPDATE('$ide','$clave','SYSDBA')";
		
		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Usuario ha sido Actualizado');</script>";
		?>
		<script type="text/javascript">
		window.location.href="usuarios.php";
		</script>
		<?
		
    }

}
?>


<html>
<head>

<title>Modificar Usuario: </title>

</head>
	
<body>
<center>	

	<p>Modificar información</p>
	<hr width=50%>
	
	<form name="fe" action="modificar_usuario.php" method="POST">
		<table id='tabla' cellpadding=7>
        <!-- Password del Usuario -->
        <tr>
            <td align="center"><b>clave:  </b></td><td><label><input name="clave" type="password" size=35 style="font-size:18px" required autofocus/></label></td>
        </tr>
        </table>
		<input id='modificar' type="submit" name="btn_modificar" value="Guardar Cambios"/>
	</form>

</center>	
</body>

</html>

