<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dialogue inicio</title>
    <link rel="shortcut icon" href="Img/Dialogar.png" type="image/x-icon" />
    <link rel="stylesheet" href="Css/Estilos.css">
</head>
<body>
    <?php
       require 'Conexion.php';
       $contador=0;
       try { 
        $sql= "SELECT asu_men, con_men, est_men FROM mensaje";
        $resultado=$base->prepare($sql);
        $resultado->execute(array());
        while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
            if ($consulta['est_men']=='Pendiente') {
                $contador=$contador + 1;
            }
        }
    }catch(Exception $e){
        die('Error: '.$e->getMessage());
     }
    ?>
    <div id="header">
        <h1 id="titulo">NOTIFICACIONES</h1>
        <h2 id="titulo2">ialogue</h2>
    <img src="Img/mensajes.png" width="60" height="60"/>
    <img id="img1"src="Img/dialogar.png" width="80" height="70"/>
    <a id="href1" href="cerrar.php"><img src="Img/CerrarSesion.png" style="width: 50px;"></a>

    <table id="tablan"> 
     <tr>
        <td>
            <?php
if (isset($_SESSION["nombre"])) {
$nombre=$_SESSION["nombre"];
}else{
    $nombre="";
}

if ($nombre=="") {
    echo "<script>window.location='I_Sesion.php'</script>";
}else{
    echo $nombre;
} 
            ?>
       </td>
     </tr> 
</table>

    <table> 
        <tr>
            <td>
               <?php
                 if($contador > 0) {
               ?>
                  <a id="notificacion" href="mensaje.php">
               <?php
                  echo $contador;
               ?>
         </a>
            </td>
        </tr> 
    </table>
        </section>
        <?php
    }
    ?>
    </div> 


<center><div id="main">
<a href="principal.php" class="in3"><span>Atràs</span></a>

<form id="formaa"action="" method="" name="frml">
<table id="tbl222" border=5>
       <tr>
           <th id="txt7" colspan="3">MENSAJES POR REVISAR</th>
       </tr>
      <tr>
        <th id="txt7" align="center">ASUNTO</th>
        <th id="txt9" align="center">DETALLE</th>
        <th id="txt9" align="center">ELIMINAR</th>
      </tr>
       <?php 
		try { 
			$sql= "SELECT * FROM mensaje";
			$resultado=$base->prepare($sql);
			$resultado->execute(array());
			while ($consulta=$resultado->fetch(PDO::FETCH_ASSOC)) {
                if ($consulta['est_men']=='Pendiente') {
        ?>
      <tr>
        <td id="txt8"><Center><?php echo $consulta['asu_men']?></Center></td>
        <td><center><a href="Mrevisado.php?cod=<?php echo $consulta['id_men'] ?>">Ver</center></td>
        <td><center><a href="eliminar.php?cod=<?php echo $consulta['id_men'] ?>">Eliminar</center></td>
      </tr>
      <?php
                }
			}
		} catch(Exeption $e){
	die('ERROR:'.$e->getMessage());
			
		}
		 ?>    
    </table>
    </form>
</div></center>


    <div id="aside"> 
        <img id="img2"src="Img/gif.gif" width="190" height="260"/>
    </div>



    <div id="aside1">
        <img id="img3"src="Img/gif1.gif" width="190" height="260"/>
    </div> 


    <center><div id="footer"><h4 id="pie">@Dialogue-Pitalito-Huila..2020</h4></div></center>
</body>
</html>