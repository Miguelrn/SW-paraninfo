<?php
	session_start();
	include_once '../controlador/opbasededatos.php';
    
    $nombreUser = $_GET['user']; 
	//echo $nombreUser; 
    $pass = $_GET['pass'];
	
	if(!isset($_SESSION['logueado'])) $_SESSION['logueado'] = false;
  
	$BDD = new Mysql();
	$row = $BDD->conseguirDatosUsuario($nombreUser, $pass);		
	
	if ($_SESSION['logueado'] == false && $row){		
		$_SESSION['logueado'] = true;	
		$_SESSION['id'] = $row['id'];
		$_SESSION['nombre'] = $row['nombre'];	
		$_SESSION['correo'] = $row['correo'];	
		$_SESSION['apellidos'] = $row['apellidos'];
		$_SESSION['user'] = $row['nombreuser'];
		$_SESSION['provincia'] = $row['provincia'];
		$_SESSION['fecha'] = $row['fecha'];	
		$_SESSION['tipo'] = $row['tipo'];
		$_SESSION['encuesta'] = $row['encuesta'];
	} else {
		$_SESSION['logueado'] = false;		
		$_SESSION['error'] = "Usuario o contraseña incorrecto.";
	}
	
	//echo $row['nombre'];
	header('Location: ../index.php');

?>