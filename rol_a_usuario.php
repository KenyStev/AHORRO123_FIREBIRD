<?php include ("conexion.php"); include ("validar_login.php");
	if(isset($_POST["btn_relacionar"])){
		$btn=$_POST["btn_relacionar"];
	    if($btn == "Guardar Cambios")
	    {
	    	$rol = $_POST['roles'];
	    	$user = $_POST['usuarios'];

	    	$query = "SELECT COUNT(*) AS EXISTE FROM ROL_USUARIO RP WHERE RP.ID_ROL = $rol AND RP.ID_USUARIO = '$user'";
	    	$EXISTE = ibase_query($con,$query);
	    	$EXISTE = ibase_fetch_object($EXISTE);
	    	$EXISTE = $EXISTE->EXISTE + 0;
	    	//echo "<script>alert('EXISTE: ".$EXISTE."');</script>";

	    	//echo "<script>alert('Rol: ".$rol.", Privi: ".$priv."');</script>";

	    	if ($EXISTE == 0) {
	    		$query = "EXECUTE PROCEDURE SP_ROL_USUARIO_CREATE('".$user."','$rol','SYSDBA')";
	    		$re=ibase_query($con, $query);
				if(!re)
				{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
				exit;}
				
				echo "<script> alert('Un Rol conectado a un Usuario');</script>";
				?>
					<script type="text/javascript">
					window.location.href="rol_a_usuario.php";
					</script>
				<?
	    	}else{
	    		echo "<script>alert('Ya existe una relacion entre el rol y el usuario seleccionado!');</script>";
	    	}
	    }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="rolToUser" method="post" action="rol_a_usuario.php">
		lista de roles:
        <select name='roles'>
            <option value="">--- Select ---</option>
            <?php

            $query = "SELECT * FROM SP_ROLES_READ";
            $list = ibase_query($con, $query);

            while($row_list=ibase_fetch_object($list)){
            
	            echo "<option value='$row_list->ID_ROL'>";
	            echo $row_list->NOMBRE;
	            echo "</option>";
            }
            ?>
        </select>

        lista de Usuarios:
        <select name='usuarios'>
            <option value="">--- Select ---</option>
            <?php

            $sql = "SELECT * FROM SP_USUARIO_READ";
            $list_priv = ibase_query($con, $sql);

            while($row=ibase_fetch_object($list_priv)){
            
	            echo "<option value='$row->ID_USUARIO'>";
	            echo $row->ID_USUARIO;
	            echo "</option>";
            }
            ?>
        </select>

        <input id='relacionar' type="submit" name="btn_relacionar" value="Guardar Cambios"/>
	</form>
</body>
</html>