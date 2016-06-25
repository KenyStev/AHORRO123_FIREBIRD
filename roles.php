<?php
include ("conexion.php");
?>
<?php
  if($_POST['user'] && $_POST['password']) { 
    
    $sql="SELECT * FROM LOGIN('".$_POST['user']."','".$_POST['password']."')";
     
    $res=ibase_query($con, $sql);
    $row=ibase_fetch_object($res);
    $logged = $row->LOGGED_IN + 0;

    if ($logged==0) {
      echo "<script> alert('Usuario o Contraseña incorrectos'); location.replace('index.php'); </script>";
    }else{

    }
  }
?>

<!doctype html>
<html lang="es">
  <link rel="stylesheet" type="text/css" href="screen.css"/>   
  <head>
    <title>
        ROLES DE USUARIO 
    </title>
  </head>
  <body>
    <center>
      <?php
        $sql = "SELECT * FROM FN_GET_ROLES_FOR('".$_POST['user']."',0)";
         
        $res=ibase_query($con,$sql);
        
        $cantidad = ibase_fetch_object($res)->R_ID_ROL + 0;
        if($cantidad==0){
          echo "<script> alert('El Usuario no tiene ningun Rol'); location.replace('index.php'); </script>";
        }

        echo "<table border = 1 rule = nome width = 600px cellpadding = 5px id = tabla>\n";
        echo " <tr>"
            . " <td align = center><b>CON QUE ROL DESEA ENTRAR</b><td>"
            . "</tr>";
        while($row = ibase_fetch_object($res)){
        echo " <tr>"
            . " <td align = center><a href='privilegios_usuario.php?id='".$_POST['user']."'&rol=$row->ID_ROL'>$row->NOMBRE</a></td>"
            . "</tr>\n";
        }
        echo "</table>\n";
             
      ?>
    </center>  
  </body>
</html>