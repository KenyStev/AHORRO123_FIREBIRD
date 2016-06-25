<? include ("conexion.php") ?>

<!DOCTYPE html>
<html>
<head>
	<title>AHORRO123 | Kenystev</title>
</head>
<body>
	<div>
	        <center>
	       <fieldset >
	           <legend>Ingrese sus datos</legend>
	        <h1>LOGIN</h1>
	       
	        <form action="roles.php" method="POST">
	            Usuario: <input type="text" name="user" required><br>
	            Password:<input type="password" name="password" required><br>
	        <input type="submit" value="Entrar">
	        
	        </form>
	        </fieldset>
	        </center>
	       
	</div>
</body>
</html>