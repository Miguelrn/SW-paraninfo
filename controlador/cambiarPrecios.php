<?php
	include_once '../controlador/opbasededatos.php';
	session_start();

	$precio = htmlspecialchars(trim(strip_tags($_GET['precio'])));
    $id = htmlspecialchars(trim(strip_tags($_GET['id'])));
	
	$BDD = new Mysql();
	$row = $BDD->updatePreciosPistas($id, $precio);
	
	
	//comprobar si se ha conseguido updatear... 
	 
	$_SESSION['error'] = "Se ha modificado el precio con exito!!";
		
	
	
	header('Location: ../vista/muestraPrecios.php');
	
?>