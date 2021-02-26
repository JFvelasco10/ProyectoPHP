<?php
try {
	$base=new PDO('mysql:host=localhost; dbname=bd_notificaciones','root','');
	
} catch(Exeption $e){
	die('ERROR:'.$e->getMessage());
}

  ?>