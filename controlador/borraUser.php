<?php
	session_start();
	require_once '../controlador/opbasededatos.php';

	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$BDD = new Mysql();
		$id = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['id']))));
	
		$BDD->deleteUser($id);
		
	}	
	
	header('Location: ../vista/muestraUsuarios.php');
	
?>