<?php
	session_start();
    include_once '../controlador/opbasededatos.php';
    
    $nombre = htmlspecialchars(trim(strip_tags($_POST['nombre'])));
    $apellidos = htmlspecialchars(trim(strip_tags($_POST['apellidos'])));
	$user = htmlspecialchars(trim(strip_tags($_POST['user'])));
    $correo = htmlspecialchars(trim(strip_tags($_POST['correo'])));        
    $pass = htmlspecialchars(trim(strip_tags($_POST['passw'])));
    $reppass = htmlspecialchars(trim(strip_tags($_POST['repassw'])));
	$provincia = htmlspecialchars(trim(strip_tags($_POST['provincia'])));
	$fecha = htmlspecialchars(trim(strip_tags($_POST['fecha'])));
	
	if (strcmp($pass, $reppass) == 0){
		$BDD = new Mysql();	
		$row = $BDD->insertarUser($user, $correo, $pass, $nombre, $apellidos, $fecha, $provincia);		
		if ($row){
			$_SESSION['nombre'] = $nombre;	
			$_SESSION['user'] = $user;
			$_SESSION['correo'] = $correo;	
			$_SESSION['apellidos'] = $apellidos;		
			$_SESSION['provincia'] = $provincia;
			$_SESSION['fecha'] = $fecha;	
			$_SESSION['logueado'] = true;	
			$_SESSION['tipo'] = 0;
			$_SESSION['encuesta'] = 0;

			if (isset($_SESSION['error'])){
				unset($_SESSION['error']);
			}
			header('Location: ../index.php');
			
		} else {			
			$_SESSION['error'] = "Hubo un problema al registrar. Intente nuevamente más tarde.";
			$_SESSION['logueado'] = false;	
			header('Location: ../index.php');
			
		}
	} else {		
		$_SESSION['error'] = "No fue posible realizar el registro. Las contraseñas no coinciden.";
		$_SESSION['logueado'] = false;			
		header('Location: ../index.php');
		
	}


?>