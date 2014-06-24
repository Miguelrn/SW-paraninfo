<?php
	
	$payer_email = $BDD->limpia_sql($_POST['payer_email']);
 	$mc_gross = $BDD->limpia_sql($_POST['mc_gross']);
	$txn_id = $BDD->limpia_sql($_POST['txn_id']);
	$num_productos = ($_POST['custom']);
	for ($i=1; $i<$num_productos; $i++) {//hasta donde debe contar ¿?
		$nombre_pista = $BDD->limpia_sql($_POST['iten_name_'.$i]);
		$precio = $BDD->limpia_sql($_POST['amount_'.$i]);
		$fecha = $BDD->limpia_sql($_POST['os0_'.$i]);
		$hora = $BDD->limpia_sql($_POST['os1_'.$i]);
		$tipo = $BDD->limpia_sql($_POST['os2_'.$i]);
		$zona = $BDD->limpia_sql($_POST['os3_'.$i]);
		$num_pista = $BDD->limpia_sql($_POST['os4_'.$i]);
										//$id_user, $txn_id, $email, $nombre_pista, $precio, $fecha, $hora, $tipo_reserva, $zona, $numpista){
		$BDD->insertarPedidoPaypal($id_user, $txt_id, $payer_email, $nombre_pista, $precio, $fecha, $hora, $tipo, $zona, $num_pista);
		mail('ppaypal@paraninfo.tk', 'else', $id_user." ".$txt_id." ".$payer_email." ".$nombre_pista." ".$precio." ".$fecha." ".$hora." ".$tipo." ".$zona." ".$num_pista);
	}

unset($_SESSION['reserva']);//no los borra OJO

?>