<?php
	include_once '../controlador/opbasededatos.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
   		$BDD = new Mysql();
		$pistas = $BDD->limpia_sql($_GET['pistas']);
	    $id = $BDD->limpia_sql($_GET['id']);
		//echo $pistas;
		$BDD = new Mysql();
		$row = $BDD->updateNumeroPistas($id, $pistas);
		
		
		//comprobar si se ha conseguido updatear... 
		if($row){
			$_SESSION['modPistas'] = "Se ha modificado el numero de pistas con exito!!";
		}	
	}
	
	
	header('Location: ../vista/muestraPistas.php');
	
?>