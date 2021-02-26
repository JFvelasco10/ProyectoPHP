<?php
require 'Conexion.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>INICIAR SESION</title>
<link rel="shortcut icon" href="Img/Dialogar.png" type="image/x-icon" />
<link rel="stylesheet" href="Css/I_Sesion.css">
</head>
<body background="Img/fondo.png">

<form action="" method="POST">
    <table class="tbl2" align="center">
        <tr>
          <td colspan="2" align="center"><h1 id="titulo1">REGISTRAR USUARIO</h1></td>
        </tr>
        <tr>
          <td id="td1"><h2 id="titulo2">Nombre:</h2></td>
          <td><input id="n1" type="varchar" name="txt1" placeholder=" Introduzca nombre completo..." required></td>
        </tr>
        <tr>
          <td><h2 id="titulo2">Usuario:</h2></td>
          <td><input id="n2" type="varchar" name="txt3" placeholder=" Introduzca usuario..." required></td>
        </tr>
        <tr>
          <td><h2 id="titulo2">Contraseña:</h2></td>
          <td><input id="n2" type="password" name="txt4" placeholder=" Introduzca contraseña..." required></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><button class="btn2" name="btn5">REGISTRAR</button></td>
        </tr>
    </table>
  </form>


  <?php


if (isset($_POST['btn5'])) {
    $nombre=$_POST['txt1'];
    $usuario=$_POST['txt3'];
    $contrasena=$_POST['txt4'];


	try{
	$sql="INSERT INTO `usuario`(`id_usu`, `nombre_usu`, `usu_usu`, `con_usu`) VALUES ('',:nom,:usu,:con)";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":nom"=>$nombre,":usu"=>$usuario,":con"=>$contrasena));
	?>
	<script language="javascript">
		window.alert("Usuario registrado con Exito")
	</script>

<?php
}
catch(Exeption $e){
	die('ERROR:'.$e->getMessage());
}
}
?>

</body>
<footer align="center"><p><a id="href1"href="I_Sesion.php"><span>VOLVER</span></a></p></td></footer>
</html>