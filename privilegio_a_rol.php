<?php include ("conexion.php"); 
	if(isset($_POST["btn_relacionar"])){
		$btn=$_POST["btn_relacionar"];
	    if($btn == "Guardar Cambios")
	    {
	    	$rol = $_POST['roles'];
	    	$priv = $_POST['privilegios'];

	    	$query = "SELECT COUNT(*) AS EXISTE FROM ROL_PRIVILEGIO RP WHERE RP.ID_ROL = $rol AND RP.ID_PRIVI = $priv";
	    	$EXISTE = ibase_query($con,$query);
	    	$EXISTE = ibase_fetch_object($EXISTE);
	    	$EXISTE = $EXISTE->EXISTE + 0;
	    	//echo "<script>alert('EXISTE: ".$EXISTE."');</script>";

	    	//echo "<script>alert('Rol: ".$rol.", Privi: ".$priv."');</script>";

	    	if ($EXISTE == 0) {
	    		$query = "EXECUTE PROCEDURE SP_ROL_PRIVILEGIO_CREATE('$rol','$priv','SYSDBA')";
	    		$re=ibase_query($con, $query);
				if(!re)
				{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
				exit;}
				
				echo "<script> alert('Un Privilegio conectado a un Rol');</script>";
				?>
					<script type="text/javascript">
					window.location.href="privilegio_a_rol.php";
					</script>
				<?
	    	}else{
	    		echo "<script>alert('Ya existe una relacion entre el privilegio y el rol seleccionado!');</script>";
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
	<form name="priviToRol" method="post" action="privilegio_a_rol.php">
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

        lista de privilegios:
        <select name='privilegios'>
            <option value="">--- Select ---</option>
            <?php

            $sql = "SELECT * FROM SP_PRIVILEGIOS_READ";
            $list_priv = ibase_query($con, $sql);

            while($row=ibase_fetch_object($list_priv)){
            
	            echo "<option value='$row->ID_PRIVI'>";
	            echo $row->NOMBRE;
	            echo "</option>";
            }
            ?>
        </select>

        <input id='relacionar' type="submit" name="btn_relacionar" value="Guardar Cambios"/>
	</form>
</body>
</html>