<?php
	// tell PHP to log errors to ipn_errors.log in this directory
	ini_set('log_errors', true);
	ini_set('error_log', dirname(__FILE__).'/ipn_errors.log');
	session_start();
	
	//mail('ppaypal@paraninfo.tk', 'Hola', 'mensajito');
	// intantiate the IPN listener
	include('ipnlistener.php');
	require_once 'opbasededatos.php';
	$listener = new IpnListener();
	
	// tell the IPN listener to use the PayPal test sandbox
	$listener->use_sandbox = true;
	
	// try to process the IPN POST
	try {
	    $listener->requirePostMethod();
	    $verified = $listener->processIpn();
	} catch (Exception $e) {
	    error_log($e->getMessage());
	    exit(0);
	}
	
	$BDD = new Mysql();
	
	
	if ($verified) {
	
	    $errmsg = '';
	    
	    /*if ($_POST['payment_status'] != 'Completed') { 
	        exit(0); 
	    }*/
	
	    if ($_POST['receiver_email'] != 'ppaypal@paraninfo.tk') {
	        $errmsg .= "'receiver_email' does not match: ";
	        $errmsg .= $_POST['receiver_email']."\n";
	    }
	    
	    if ($_POST['mc_currency'] != 'EUR') {
	        $errmsg .= "'mc_currency' does not match: ";
	        $errmsg .= $_POST['mc_currency']."\n";
	    }
	
	    $txn_id = $BDD->limpia_sql($_POST['txn_id']);//comprobamos que no este repetido la id
		$r = $BDD->buscarPedido($txn_id);//busca si el pedido existe, ya estaria procesado
		
	    if ($r) {//habia un pedido con esa id
	        $errmsg .= "'txn_id' has already been processed: ".$_POST['txn_id']."\n";
	    }
	    
	    if (!empty($errmsg)) {
	    
	        // manually investigate errors from the fraud checking
	        $body = "IPN failed fraud checks: \n$errmsg\n\n";
	        $body .= $listener->getTextReport();
	        mail('ppaypal@paraninfo.tk', 'IPN Fraud Warning', $body);
	        
	    } else {
	    	
		    $payer_email = $BDD->limpia_sql($_POST['payer_email']);
		    $mc_gross = $BDD->limpia_sql($_POST['mc_gross']);
			$txn_id = $BDD->limpia_sql($_POST['txn_id']);
			$num_productos = ($_POST['custom']);
			//mail('ppaypal@paraninfo.tk', 'else', $num_productos);
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
			}
			
			unset($_SESSION['reserva']);//no los borra OJO
			
			//mandar un mail de confirmacion del pedido? ... futura ampliacion
			
	    }
	    
	} else {
	    // manually investigate the invalid IPN
	    mail('ppaypal@paraninfo.tk', 'Invalid IPN', $listener->getTextReport());
	}
	
	header('Location: ../index.php');

?>