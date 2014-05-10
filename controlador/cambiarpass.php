<?php
	include_once '../controlador/opbasededatos.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
   		$BDD = new Mysql();
		$cont = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['oldpass']))));
	    $newcont = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['newpass']))));
		$repcont = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_POST['reppass']))));
		$user = $_SESSION['user'];
		$fecha = $_SESSION['fecha'];
		$fecha_reg = $_SESSION['fecha_registro'];
		if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
		}	
		else{
			$user = $_SESSION['user'];
			$row = $BDD->consultaId($user);
			$id = $row['id'];
			$_SESSION['id'] = $id;
		}
		$cont = hash("sha256",$cont.$fecha_reg.$fecha);
		
		$BDD = new Mysql();
		$row = $BDD->conseguirDatosUsuario($user,$cont);
		
		if($row) {
				
			if(strcmp($newcont, $repcont) == 0) {
				$newcont = hash("sha256",$newcont.$fecha_reg.$fecha);
				$BDD->updatePassUsuario($id, $newcont);
			}
			else $_SESSION['error'] = "Las contraseñas no coinciden";
			
		}
		else $_SESSION['error'] = "La contraseña no es correcta";
	}
	header('Location: ../index.php');

	
?>
