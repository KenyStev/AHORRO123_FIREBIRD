<script type="text/javascript">/*Función Js que sirve para activar una política que tiene estado Inactivo*/
	
	<?
		include ("conexion.php");
		include ("validar_login.php");
		$id= $_GET['id'];
		
		$query= "EXECUTE PROCEDURE SP_CUETAS_DELETE('$id')";
		$res=ibase_query($con, $query);
		if(!res)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
	?>

	alert("El registro ha sido eliminado");
	window.location.href="cuentas.php";
</script>
