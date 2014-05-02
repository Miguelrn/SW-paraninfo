<?php
	include_once '../controlador/opbasededatos.php';
	session_start();

	$nombre = htmlspecialchars(trim(strip_tags($_POST['nombre'])));
    $apellidos = htmlspecialchars(trim(strip_tags($_POST['apellidos'])));
	$provincia = htmlspecialchars(trim(strip_tags($_POST['provincia'])));
	$fecha = htmlspecialchars(trim(strip_tags($_POST['fecha'])));
	if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];
	}	
	else{
		$user = $_SESSION['user'];
		$row = $BDD->consultaId($user);
		$id = $row['id'];
		$_SESSION['id'] = $id;
	}
	
	$BDD = new Mysql();
	$row = $BDD->updateDatosUsuario($nombre, $apellidos, $provincia, $fecha, $id);
	

	$_SESSION['nombre'] = $nombre;	
	$_SESSION['apellidos'] = $apellidos;
	$_SESSION['provincia'] = $provincia;
	$_SESSION['fecha'] = $fecha;
	
	
	header('Location: ../index.php');

	
?>

