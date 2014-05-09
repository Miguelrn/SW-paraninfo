<?php 
	session_start();
	
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
   		$BDD = new Mysql();
		$deporte = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['opcion']))));
		 if(isset($_SESSION['id'])){
			$id_user = $_SESSION['id'];
		}	
		else{
			$user = $_SESSION['user'];
			$row = $BDD->consultaId($user);
			$id_user = $row['id'];
			$_SESSION['id'] = $id_user;
		}
		
		include_once '../controlador/opbasededatos.php';
	   	$BDD = new Mysql();
	
		$BDD->encuestaRealizada($id_user);//poner al usuario como que ha realizado la encuesta
		$BDD->userEncuesta($id_user,$deporte);//rellena la tabla
		$_SESSION['encuesta'] = 1;
	}
	header('Location: ../index.php');
?>