<?php
	//$deporte = $_GET['deporte'];
	for($k = 1; $k <= 5; $k++){	
		switch($k){
			case '1': $zona = 'norte'; break;
			case '2': $zona = 'sur'; break;
			case '3': $zona = 'seniora'; break;
			case '4': $zona = 'suroeste'; break;
			case '5': $zona = 'somosaguas'; break;
		}
		
		$consulta = $BDD->consultaPedido($fecha, $zona, $deporte);//consulta las reservas realizadas en esta fecha
		$r = $BDD->numPistas($deporte, $zona);//consultamos el numero de pistas para el deporte en concreto
		$numpistas = $r['NumeroPistas'];
		$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
		
		if($numpistas > 0){//hay pistas en la zona K-esima
			echo "<h3>Complejo deportivo zona $zona </h3>";
			
			//echo $numpistas['NumeroPistas'];
			for($j = 1; $j <= $numpistas; $j++){//recorre las pistas
				?><form action="./controlador/reserva.php" method="get"><?php
				echo " Pista $j ";
					if((strcmp($deporte,"Futbol") == 0) || (strcmp($deporte,"Rugby")) == 0){
				?>
					<input type="radio" name="opcion" value="partido" required="">Partido
					<input type="radio" name="opcion" value="1 hora" required="">1 Hora
				<?php
					}else if((strcmp($deporte, "Piscina") == 0)){
				?>
					<input type="radio" name="opcion" value="1 banio" required="">1 Baño
					<input type="radio" name="opcion" value="10 banios" required="">10 Baños
					<input type="radio" name="opcion" value="1 calle" required="">1 calle
				<?php }else{ ?>
					<input type="hidden" name="opcion" value="1 hora" required="">
				<?php } 
				echo "</br>";
				for ($i=9; $i < 22; $i++) { 
					if($rowConsulta['hora'] == $i && $rowConsulta['nombre_pista'] == $deporte && $rowConsulta['NumeroPistas'] == $j){//la hora ya esta reservada
						?><input type="button" name="hora" class="btn-sm btn-danger" value="<?php echo $i.":00" ?>"><?php
						if(strcmp($rowConsulta['tipo_reserva'],'partido') == 0){
							$i++;
							?><input type="button" name="hora" class="btn-sm btn-danger" value="<?php echo $i.":00" ?>"><?php
						}
						$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
					}
					else{//se puede seleccionar
						?>
							<input type="submit" type="button" name="hora" class="btn-sm btn-info" value="<?php echo $i.":00" ?>">
						<?php	
					}
				}//fin del for	
				?><input type="hidden" name="zona" value="<?php echo $zona ?>"/>
				  <input type="hidden" name="numpista" value="<?php echo $j ?>"/>
				  <input type="hidden" name="tipo" value="<?php echo $deporte ?>"/>
				  <input type="hidden" name="fecha" value="<?php echo $fecha ?>"/>
				<?php
				echo "</br>";
				echo "</br>";
				echo "</form>";
			}//fin del for
			
		}//fin del if
	}//fin de la zona K-esima	
	
?>	