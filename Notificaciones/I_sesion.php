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
    <table class="tbl1" align="center">
        <tr>
          <td colspan="2" align="center"><h1 id="titulo1">INICIAR SESION</h1></td>
        </tr>
        <tr> 
          <td colspan="2" align="center"><img src="Img/Dialogar.png" width:="300" height="100"></td>
        </tr>
        <tr>
          <td id="td1"><h2 id="titulo2">Usuario:</h2></td>
          <td><input id="n1" type="text" name="txtu" placeholder=" Introduzca Usuario..." required></td>
        </tr>
        <tr>
          <td><h2 id="titulo2">Contraseña:</h2></td>
          <td><input id="n2" type="password" name="txtc" placeholder=" Introduzca Contraseña..." required></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><button class="btn2" name="btn1">INGRESAR</button></td>
        </tr>
    </table>
  </form>


<?php
      if (isset($_POST["btn1"])){
       if(empty($_POST["txtu"]) || empty($_POST["txtc"])){
    ?>
        <script type="text/javascript">window.alert("Usuario y contraseña obligatorio!!!")</script>    
    <?php
      }else{
        $sql="SELECT * FROM usuario WHERE usu_usu=:usuario AND con_usu=:contrasena";
        $resul=$base->prepare($sql);
        $resul->execute(array(":usuario"=>$_POST["txtu"],":contrasena"=>$_POST["txtc"]));
        while ($consulta=$resul->fetch(PDO::FETCH_ASSOC)){
          $_SESSION["nombre"]=$consulta["nombre_usu"];
        }
        $verificar=$resul->rowCount();
        if ($verificar > 0) {
          header("location:principal.php");
        }else{
    ?>
        <script language='javascript'> window.alert("Datos erroneos!!!")</script>
    <?php
        }   
      }
    }
    ?>

</body>
<footer align="center"><p><a id="href1"href="RegistrarU.php"><span>REGISTRAR</span></a></p></td></footer>
</html>