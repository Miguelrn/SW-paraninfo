<?php
	$deporte = $_GET['deporte'];
	$fecha = $_GET['fecha'];
	require_once '../controlador/opbasededatos.php';
	
	session_start();
?>

<!-- muestra contenido de la consulta -->
<fieldset id="consulta">
	<div>
		<?php 	
			$fecha_actual = strtotime(date("d-m-Y",time()));
			$fecha_entrada = strtotime($fecha);
			$hora_actual = date("G",time()) + 6;//la hora del servidor es la de NY
			if($fecha_actual > $fecha_entrada){
				echo "<h3>No puedes reservar en una fecha pasada</h3>";
				//$_SESSION['error'] = "No puedes reservar en una fecha pasada";
				//header('Location: ./vista/contenido.php');
				//echo $fecha;
			}else{
				if(!$_SESSION['logueado']){
					?> 
					<script>			
						alert("Para reservar necesita estar logueado");		
					</script>	
					<?php
				}
				$BDD = new Mysql();
				
				echo "<h4><strong>Funcionamiento (Necesita estar registrado): </strong></h4>";
				echo "<h4> - Pinche, a continuación, sobre la hora a la que quiere reservar una pista concreta. </h4>";
				echo "<h4> - Las horas marcadas en rojo ya estan reservadas. </h4>";
				echo "<h4> - Puede ver sus reservas actuales en el apartado 'Reserva actual' del menu de la izquierda.</h4>";
				echo "<h3>DEPORTE: $deporte - ($fecha)</h3>";
				
				
				include_once '../vista/consultaZona.php';

			}
		;?>

		
	</div>
</fieldset>
<!-- fin de la consulta -->