<?php
	session_start();
	include_once '../controlador/opbasededatos.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
   		$BDD = new Mysql();
	    $nombreUser = $BDD->limpia_sql($_POST['user']);
	    $pass = $BDD->limpia_sql($_POST['pass']);
		
		$r = $BDD->consultaUser($nombreUser);
		
		if(!isset($_SESSION['logueado'])) $_SESSION['logueado'] = false;

		$pass = hash("sha256",$pass.$r['fecha_registro'].$r['fecha']);
		$row = $BDD->conseguirDatosUsuario($nombreUser, $pass);
		
		if ($_SESSION['logueado'] == false && $row){
			$BDD->usuarioLogeado($row['id'],$row['correo']);		
			$_SESSION['logueado'] = true;	
			$_SESSION['id'] = $row['id'];
			$_SESSION['nombre'] = $row['nombre'];	
			$_SESSION['correo'] = $row['correo'];	
			$_SESSION['apellidos'] = $row['apellidos'];
			$_SESSION['user'] = $row['nombreuser'];
			$_SESSION['provincia'] = $row['provincia'];
			$_SESSION['fecha'] = $row['fecha'];
			$_SESSION['fecha_registro'] = $row['fecha_registro'];
			$_SESSION['tipo'] = $row['tipo'];
			$_SESSION['encuesta'] = $row['encuesta'];
		} else {
			$_SESSION['logueado'] = false;		
			$_SESSION['error'] = "Usuario o contraseña incorrecto.";
		}
	}	
	header('Location: ../index.php');

?>