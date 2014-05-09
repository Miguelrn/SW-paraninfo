<?php
	session_start();
    include_once '../controlador/opbasededatos.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
   		$BDD = new Mysql();
	    $nombre = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['nombre']))));
	    $apellidos = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['apellidos']))));
		$user = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['user']))));
	    $correo = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['correo']))));        
	    $pass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['passw']))));
	    $reppass = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['repassw']))));
		$provincia = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['provincia']))));
		$fecha = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['fecha']))));
		
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
	}

?>