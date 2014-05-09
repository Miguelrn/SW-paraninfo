<?php 
	if (session_id() == "") {
		@session_start();
	}
	include_once '../controlador/opbasededatos.php';
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
   		$BDD = new Mysql();
		if($_SESSION['logueado'] == 1){
			$id_user = $_SESSION['id'];
			$zona_pista = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['zona']))));
			$tipo_pista = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['tipo']))));
			$hora = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['hora']))));
			$fecha = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['fecha']))));
			$tipo_reserva = $BDD->limpia_sql(htmlspecialchars(trim(strip_tags($_GET['opcion']))));
	
			if(!isset($_SESSION['reserva'])){
				$_SESSION['reserva'] = array();
			}
			
			//consultar el precio y añadirlo al array de la reserva
			$BDD = new Mysql();
			if((strcmp($tipo_pista, "Futbol") == 0) || (strcmp($tipo_pista, "Piscina")) == 0){
				$precio = $BDD->consultaPrecio($tipo_pista."-".$zona_pista, $tipo_reserva);
				//echo $tipo_pista."-".$zona_pista."--".$tipo_reserva;
			}
			else if((strcmp($tipo_pista, "Tenis") == 0) || (strcmp($tipo_pista, "Padel") == 0) || (strcmp($tipo_pista, "Volley playa") == 0)){
				if($hora <= "12"){//antes del mediodia
					$precio = $BDD->consultaPrecio($tipo_pista, "antes 12");	
				}
				else{//despues de 13:00
					$precio = $BDD->consultaPrecio($tipo_pista, "despues 13");	
				}
			}
			else{	
				$precio = $BDD->consultaPrecio($tipo_pista, $tipo_reserva);		
			}
			//el array de la reserva va a tener id_user, nombre_pista, fecha, hora, tipo_reserva, precio
			$lista = $_SESSION['reserva']; 	
			$size = count($lista);
			$lista[$size] = array($id_user, $tipo_pista, $fecha, $hora, $tipo_reserva, $precio['precio'], $zona_pista);
			$_SESSION['reserva'] = $lista;
		}
	}	
	
	header('Location: ../index.php');
 ?>