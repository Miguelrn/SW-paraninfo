<?php
	include_once './controlador/opbasededatos.php';
	$fecha = $_POST['fecha'];
	$zona = $_POST['zona'];

	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Deportes UCM</title>
		<meta charset="utf-8">
		<meta name="Keywords" content="deportes, deportesUCM, deportes ucm, gratis, barato, rugby,tenis,futbito,futbol sala, baloncesto, ucm, paraninfo">
		<meta name="author" content="GRUPO 18 - SW - IVAN MENDEZ JIMENEZ - JOSE MIGUEL RODRIGUEZ NAVARRO">
		<link rel="shortcut icon" type="image/x-icon" href="./Images/favicon.ico">
		<link href="./css/index.css" rel="stylesheet" type="text/css"/>
		<link href="./css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<script src="./jquery/jquery-2.1.0.min.js" type="text/javascript"></script>
		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js' type='text/javascript'>
		</script>
		
		<script type="text/javascript">
			var $j = jQuery.noConflict();
			    $j(function () {
				    $j('#easy-slider div:gt(0)').hide();
				    setInterval(function(){
				      $j('#easy-slider div:first-child').fadeOut(0)
				         .next('div').fadeIn(1000)
				         .end().appendTo('#easy-slider');}, 4000);
				});
		</script>
		
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<?php include_once './vista/cabecera.php'?>
		</div>	
		<div id="cuerpo">
			<?php 
				print_r($_SESSION); 
				if (isset($_SESSION['error'])){
			?>		
			<script>			
				alert("<?php echo $_SESSION['error']?>");//informa del error mediante un popup		
			</script>	
			<?php
					unset($_SESSION['error']);
				}			
			?>
			<div class="general">			
				<div class="fijo">
					<?php include_once './vista/categorias.php'; ?>				
				</div>
				<div class="contenido" id="zona_central">
					<!-- muestra contenido de la consulta -->
					<fieldset id="consulta">
						<div>
							<?php 	
								$fecha_actual = strtotime(date("d-m-Y",time()));
								$fecha_entrada = strtotime($fecha);
								if($fecha_actual >= $fecha_entrada){
									echo "No puedes reservar en una fecha pasada";
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
									if(strcmp($zona,"norte") == 0){
										$pistas = $BDD->pistasDisponibles("norte");
										$consulta = $BDD->consultaPedido($fecha, "norte");//consulta las reservas realizadas en esta fecha
										$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
										echo "<h3>Complejo deportivo zona Norte ($fecha) </h3>";
										while($rowPista = mysqli_fetch_array($pistas, MYSQLI_ASSOC)){
											?>
											<h3><?php echo $rowPista['nombre']; ?></h3>
											<form action="./controlador/reserva.php" method="get">
												
												<?php
												for ($i=9; $i < 22; $i++) { //no estoy seguro de que horario tiene cada pista....comprobar !!!
													if($rowConsulta['hora'] == $i && $rowConsulta['nombre_pista'] == $rowPista['nombre']){//la hora ya esta reservada
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
												?>
												
												<input type="hidden" name="zona" value="norte"/>
												<input type="hidden" name="tipo" value="<?php echo $rowPista['nombre'] ?>"/>
												<input type="hidden" name="fecha" value="<?php echo $fecha ?>"/>
												<?php
													if((strcmp($rowPista['nombre'],"Futbol") == 0) || (strcmp($rowPista['nombre'],"Rugby")) == 0){
												?>
													<input type="radio" name="opcion" value="partido" required="">Partido
													<input type="radio" name="opcion" value="1 hora" required="">1 Hora
												<?php
													}else{
												?>
													<input type="hidden" name="opcion" value="1 hora" required="">
												<?php } ?>
													
											</form>
											</br>
											<?php
										}//fin del if norte
	
									}else if(strcmp($zona, "sur") == 0){
										$pistas = $BDD->pistasDisponibles("sur");
										$consulta = $BDD->consultaPedido($fecha, "sur");
										$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
										echo "<h3>Complejo deportivo zona Sur ($fecha) </h3>";
										while($rowPista = mysqli_fetch_array($pistas, MYSQLI_ASSOC)){
											?>
											<h3><?php echo $rowPista['nombre'] ?></h3>
											<form action="./controlador/reserva.php" method="get">
												<?php
												for ($i=9; $i < 22; $i++) { //no estoy seguro de que horario tiene cada pista....comprobar !!!
													if($rowConsulta['hora'] == $i && $rowConsulta['nombre_pista'] == $rowPista['nombre']){//la hora ya esta reservada
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
												?>
												<input type="hidden" name="zona" value="sur"/>
												<input type="hidden" name="tipo" value="<?php echo $rowPista['nombre'] ?>"/>
												<input type="hidden" name="fecha" value="<?php echo $fecha ?>"/>
												<?php
													if((strcmp($rowPista['nombre'],"Futbol") == 0) || (strcmp($rowPista['nombre'],"Rugby")) == 0){
												?>
													<input type="radio" name="opcion" value="partido" required="">Partido
													<input type="radio" name="opcion" value="1 hora" required="">1 Hora
												<?php
													}else{
												?>
													<input type="hidden" name="opcion" value="1 hora" required="">
												<?php } ?>
											</form>
											</br>
											<?php
	
										}//fin del if sur
									}else if(strcmp($zona, "seniora") == 0){
										$pistas = $BDD->pistasDisponibles("seniora");
										$consulta = $BDD->consultaPedido($fecha, "seniora");
										$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
										echo "<h3>Complejo deportivo zona Nª Señora de la Almudena ($fecha) </h3>";
										while($rowPista = mysqli_fetch_array($pistas, MYSQLI_ASSOC)){
											?>
											<h3><?php echo $rowPista['nombre'] ?></h3>
											<form action="./controlador/reserva.php" method="get">
												<?php
												for ($i=9; $i < 22; $i++) { //no estoy seguro de que horario tiene cada pista....comprobar !!!
													if($rowConsulta['hora'] == $i && $rowConsulta['nombre_pista'] == $rowPista['nombre']){//la hora ya esta reservada
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
												?>
												<input type="hidden" name="zona" value="seniora"/>
												<input type="hidden" name="tipo" value="<?php echo $rowPista['nombre'] ?>"/>
												<input type="hidden" name="fecha" value="<?php echo $fecha ?>"/>
												<input type="radio" name="opcion" value="1 banio" required="">1 Baño
												<input type="radio" name="opcion" value="10 banios" required="">10 Baños
												<input type="radio" name="opcion" value="1 calle" required="">1 calle
											</form>
											<?php
										}//fin del if seniora
									}else if(strcmp($zona, "suroeste") == 0){
										$pistas = $BDD->pistasDisponibles("suroeste");
										$consulta = $BDD->consultaPedido($fecha, "suroeste");
										$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
										echo "<h3>Complejo deportivo zona Suroeste ($fecha) </h3>";
										while($rowPista = mysqli_fetch_array($pistas, MYSQLI_ASSOC)){
											?>
												<h3><?php echo $rowPista['nombre'] ?></h3>
											<form action="./controlador/reserva.php" method="get">
												<?php
												for ($i=9; $i < 22; $i++) { //no estoy seguro de que horario tiene cada pista....comprobar !!!
													if($rowConsulta['hora'] == $i && $rowConsulta['nombre_pista'] == $rowPista['nombre']){//la hora ya esta reservada
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
												?>
												<input type="hidden" name="zona" value="suroeste"/>
												<input type="hidden" name="tipo" value="<?php echo $rowPista['nombre'] ?>"/>
												<input type="hidden" name="fecha" value="<?php echo $fecha ?>"/>
												<?php
													if((strcmp($rowPista['nombre'],"Futbol") == 0) || (strcmp($rowPista['nombre'],"Rugby")) == 0){
												?>
													<input type="radio" name="opcion" value="partido" required="">Partido
													<input type="radio" name="opcion" value="1 hora" required="">1 Hora
												<?php
													}else{
												?>
													<input type="hidden" name="opcion" value="1 hora" required="">
												<?php } ?>
											</form>
											</br>
											<?php
										}//fin del if suroeste
									}else if(strcmp($zona, "somosaguas") == 0){
										$pistas = $BDD->pistasDisponibles("somosaguas");
										$consulta = $BDD->consultaPedido($fecha, "somosaguas");
										$rowConsulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
										echo "<h3>Complejo deportivo zona Somosaguas ($fecha) </h3>";
										while($rowPista = mysqli_fetch_array($pistas, MYSQLI_ASSOC)){
											?>
											<h3><?php echo $rowPista['nombre'] ?></h3>
											<form action="./controlador/reserva.php" method="get">
												<?php
												for ($i=9; $i < 22; $i++) { //no estoy seguro de que horario tiene cada pista....comprobar !!!
													if($rowConsulta['hora'] == $i && $rowConsulta['nombre_pista'] == $rowPista['nombre']){//la hora ya esta reservada
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
												?>
												<input type="hidden" name="zona" value="somosaguas"/>
												<input type="hidden" name="tipo" value="<?php echo $rowPista['nombre'] ?>"/>
												<input type="hidden" name="fecha" value="<?php echo $fecha ?>"/>
												<?php
													if((strcmp($rowPista['nombre'],"Futbol") == 0) || (strcmp($rowPista['nombre'],"Rugby")) == 0){
												?>
													<input type="radio" name="opcion" value="partido" required="">Partido
													<input type="radio" name="opcion" value="1 hora" required="">1 Hora
												<?php
													}else{
												?>
													<input type="hidden" name="opcion" value="1 hora" required="">
												<?php } ?>
											</form>
											<?php
										}//fin del if somosaguas
									}
								}
							;?>
	
							
						</div>
					</fieldset>
					<!-- fin de la consulta -->
					</div>
				<div class="fijo">
					<?php include_once './vista/cesta.php'; ?>	
				</div>
			</div>
		</div>	
		<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
			<?php include_once './vista/footer.php'; ?>
		</div>
	</body>
</html>