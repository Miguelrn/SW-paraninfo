<?php
	include_once '../controlador/opbasededatos.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
   		$BDD = new Mysql();
		$precio = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['precio']))));
	    $id = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['id']))));
		
		$BDD = new Mysql();
		$row = $BDD->updatePreciosPistas($id, $precio);
		
		
		//comprobar si se ha conseguido updatear... 
		if($row){
			$_SESSION['modPrecio'] = "Se ha modificado el precio con exito!!";
		}	
	}
	
	
	header('Location: ../vista/muestraPrecios.php');
	
?>