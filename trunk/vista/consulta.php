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
			if($fecha_actual >= $fecha_entrada){
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
				
				if(strcmp($deporte,"futbol") == 0){//ha elegido futbol
					$consulta = $BDD->consultaPedido($fecha, "norte");//consulta las reservas realizadas en esta fecha
					//$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
					if($consulta){//hay pistas en norte
						echo "<h3>Complejo deportivo zona Norte ($fecha) </h3>";
						//bucle while del numero de pistas
						$numpistas = $BDD->numPistas($deporte, "norte");//consultamos el numero de pistas para el deporte en concreto
						echo $numpistas['NumeroPistas'];
						for($j = 0; $j < $numpistas['NumeroPistas']; $j++){//recorre las pistas
						
							for ($i=9; $i < 22; $i++) { 
								if($rowConsulta['hora'] == $i && $rowConsulta['nombre_pista'] == $rowPista['nombre'] && $rowConsulta['numero_pista'] ==  $j){//la hora ya esta reservada
									?><input type="button" name="hora" class="btn-sm btn-danger" value="<?php echo $i ?>"><?php
									if(strcmp($rowConsulta['tipo_reserva'],'partido') == 0){
										$i++;
										?><input type="button" name="hora" class="btn-sm btn-danger" value="<?php echo $i ?>"><?php
									}
									$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
								}
								else{//se puede seleccionar
									?>
										<input type="submit" type="button" name="hora" class="btn-sm btn-info" value="<?php echo $i ?>">
									<?php	
								}
							}//fin del for

						}//fin del for
						
					}//fin del if
					
				
				}//fin de futbol
			}
		;?>

		
	</div>
</fieldset>
<!-- fin de la consulta -->