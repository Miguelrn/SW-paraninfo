<?php
	include_once '../controlador/opbasededatos.php';
	session_start();

	$cont = htmlspecialchars(trim(strip_tags($_POST['oldpass'])));
    $newcont = htmlspecialchars(trim(strip_tags($_POST['newpass'])));
	$repcont = htmlspecialchars(trim(strip_tags($_POST['reppass'])));
	$user = $_SESSION['user'];
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
	$row = $BDD->conseguirDatosUsuario($user,$cont);
	
	if($row) {
			
		if(strcmp($newcont, $repcont) == 0) {
			$BDD->updatePassUsuario($id, $newcont);
		}
		else $_SESSION['error'] = "Las contraseñas no coinciden";
		
	}
	else $_SESSION['error'] = "La contraseña no es correcta";
	
	header('Location: ../index.php');

	
?>
