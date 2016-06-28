<?php 
 include('conexion.php');
 include ("validar_login.php");
 ?>

<!DOCTYPE HTML>

<?php
		$ide=$_GET['id'];
		$query= "SELECT * FROM ROLES P WHERE P.ID_ROL=$ide";
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
		$rol=$_POST['rol'];
		
		$query = "EXECUTE PROCEDURE SP_ROLES_UPDATE('$ide','$rol','SYSDBA')";
		
		$re=ibase_query($con, $query);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un rol ha sido Actualizado');</script>";
		?>
		<script type="text/javascript">
		window.location.href="roles.php";
		</script>
		<?
		
    }

}
?>


<html>
<head>

<title>Modificar rol: </title>

</head>
	
<body>
<center>	

	<p>Modificar información</p>
	<hr width=50%>
	
	<form name="fe" action="modificar_rol.php" method="POST">
		<table id='tabla' cellpadding=7>
        <!-- Nombre del rol -->
        <tr>
            <td align="center"><b>Rol:  </b></td><td><label><input name="rol" type="text" size=35 value="<?echo $row->NOMBRE?>" style="font-size:18px" required autofocus/></label></td>
        </tr>
        </table>
	<input id='modificar' type="submit" name="btn_modificar" value="Guardar Cambios"/>
  

</form>

</center>	
</body>

</html>

