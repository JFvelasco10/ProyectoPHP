<?php
       require 'Conexion.php';
?>

<?php
 try{
    $sql2="DELETE FROM mensaje WHERE  id_men=".$_REQUEST['eliminar'].";";
    $resultado2=$base->prepare($sql2);
    $resultado2->execute(array());
    ?>
    <script language="javascript">window.alert("El mensaje se ha elimido con exito..."); window.location="mensajeN.php"</script>
		<?php
	}catch(Exeption $e){
			die('Error: '.$e->getMessage());
	}	
 ?>