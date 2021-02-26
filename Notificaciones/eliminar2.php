<?php
       require 'Conexion.php';
?>
<?php
	try{
		$sql="SELECT * FROM mensaje WHERE id_men=".$_REQUEST['cod'].";";

		$resultado=$base->prepare($sql);
		$resultado->execute(array());
		while($Consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
			echo "Esta seguro de eliminar este mensaje de asunto: ".$Consulta['asu_men'];
			}
		}catch(Exception $e){
			die('Error: ' .$e->getMessage());
		}
?>
<br>
<br>
<table width="50" border="1">
	<tr>
		<td>
			<a href="eliminado2.php?eliminar=<?php echo $_REQUEST['cod'];?>"><img src="Img/chulo.png" width="30"></a>
		</td>
		<td>
			<a href="mensaje.php"><img src="Img/cerrar.png" width="30"></a>
		
		</td>
	</tr>
</table>