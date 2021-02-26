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
                  <a id="notificacion" href="mensajeN.php">
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
<table id="tbl1">
        <tr>
           <td><a href="enviar.php"><img src="Img/enviar.jpg" style="width: 400px;"></a></td>
        </tr>
        <tr>
           <td id="txt"><a href="mensaje.php"><img src="Img/ver.jpg" style="width: 400px;"></a></td>
        </tr>
    </table>
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