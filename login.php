<? include ("conexion.php") ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Login | Kenystev</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
	<link href="assets/css/get-shit-done.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet">

	<script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/custom.js"></script>
</head>
<body>
	<div>
	        <center>
	       <fieldset >
	           <legend>Ingrese sus datos</legend>
	        <h1>LOGIN</h1>
	       
	        <form action="roles_usuario.php" method="POST">
	            Usuario: <input type="text" name="user" required><br>
	            Password:<input type="password" name="password" required><br>
	        <input type="submit" value="Entrar">
	        
	        </form>
	        </fieldset>
	        </center>
	       
	</div>
</body>
</html>