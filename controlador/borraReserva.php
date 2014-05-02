<?php
	session_start();

	$num = $_GET['num'];
	
	array_splice($_SESSION['reserva'], $num, 1);
	
	if (count($_SESSION['reserva']) == 0){
		unset($_SESSION['reserva']);
	}
	
	header('Location: ../vista/reservas.php');
	
?>
