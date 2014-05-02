<?php
	include_once './controlador/opbasededatos.php';
	$BDD = new Mysql();

?>

		<?php 
		if(($_SESSION['logueado'] && $_SESSION['tipo'] == 0) || ($_SESSION['logueado']) == 0){
		?>
		<form id="consulta" name="consulta" action="./muestraconsulta.php" method="post" accept-charset="utf-8">
			<fieldset>
				<legend>Consulta</legend>
				<input type="date" id="fecha" name="fecha" required=""><br>
				
				<select name="zona">
					<optgroup id="zona" label="Zona">
						<option value="norte">Norte</option>
					    <option value="sur">Sur</option> 
					    <option value="suroeste">Suroeste</option>
					    <option value="seniora">Nª Señora</option>
					    <option value="somosaguas">Somosaguas</option>
					</optgroup>       
				</select></br>
				
				<input type="submit" type="button" class="btn-xs btn-info" value="Consultar">
				
			</fieldset>
		</form>
	<?php 
		}
		if($_SESSION['logueado'] && $_SESSION['tipo'] == 0){
	?>
	<script>
		function editar() {
			$('#zona_central').load('./vista/perfil.php');
		};
		function cambiarpass() {
			$('#zona_central').load('./vista/pass.php');
		};
		function reservas(){
			$('#zona_central').load('./vista/reservas.php');
		};
		function pedidosUser(){
			$('#zona_central').load('./vista/pedidosUser.php');
		}
	
	</script>
	
	<!-- USUARIO NORMAL -->
	</br>
	<fieldset>
		<legend>Panel de control</legend>
		<button type="button" class="btn-lg btn-info" onclick="editar()">Editar Perfil</button><br>
		<button type="button" class="btn-lg btn-info" onclick="cambiarpass()">Cambiar contraseña</button></br>
		<button type="button" class="btn-lg btn-info" onclick="reservas()">Mi cesta</button></br>
		<button type="button" class="btn-lg btn-info" onclick="pedidosUser()">Pedidos</button></br><!-- cambiarle el nombre es para consultar los pedidos del usuario que ya se han pagado -->
	</fieldset>
	
	<?php }else if($_SESSION['logueado'] && $_SESSION['tipo'] == 1){ ?>
		
	<script>
		function pedidos() {
			$('#zona_central').load('./vista/muestraPedidos.php');
		};
		function usuarios() {
			$('#zona_central').load('./vista/muestraUsuarios.php');
		};
		function precios(){
			$('#zona_central').load('./vista/muestraPrecios.php');
		}
	</script>
	<!-- ADMINISTRADOR -->	
	
	<legend>Panel de Administrador</legend>
	<button type="button" class="btn-lg btn-info" onclick="pedidos()">Mostrar Pedidos</button>
	<button type="button" class="btn-lg btn-info" onclick="usuarios()">Mostrar Usuarios</button>
	<button type="button" class="btn-lg btn-info" onclick="precios()">Editar Precios</button>
	<button type="button" class="btn-lg btn-info" onclick="">Modificar Pistas</button>
	<button type="button" class="btn-lg btn-info" onclick="">Baja Usuario</button>
	
		
	<?php	} ?>
	
	<!-- ENCUESTA -->
	<div>
	</br>
	 	<?php 
	 		if((isset($_SESSION['logueado']) && $_SESSION['logueado'] == 1) && ($_SESSION['encuesta'] == 1 && $_SESSION['tipo'] == 0)){//ya ha hecho la encuenta
	 			echo "<legend>Deportes preferidos</legend>";
		 		$encuesta = $BDD->consultarEncuesta();
				$totalEncuestas = 0;
				while($rowEncuesta = mysqli_fetch_array($encuesta, MYSQLI_ASSOC)){
					$totalEncuestas = $totalEncuestas + $rowEncuesta['cantidad'];
				}
				$encuesta = $BDD->consultarEncuesta();
				while($rowEncuesta = mysqli_fetch_array($encuesta, MYSQLI_ASSOC)){
					//$totalEncuestas = $totalEncuestas + $rowEncuesta['cantidad'];
					echo "	".$rowEncuesta['deporte']." ";
					$num=($rowEncuesta['cantidad']/$totalEncuestas)*100;
					echo number_format($num,2,".",","); 
					echo " %</br>"; 
				}
			
	 		?>
	 		
	 	<?php }else if(isset($_SESSION['logueado']) && $_SESSION['logueado'] && $_SESSION['tipo'] == 0){//no ha hecho la encuesta ?>
	 		<form name="encuesta" action="./controlador/encuesta.php" method="get" accept-charset="utf-8">
	 			<fieldset>
					<legend>Encuesta</legend>
					<strong>¿Deporte preferido?</strong>
					<input type="radio" name="opcion" value="Futbol" required="">Futbol</br>
					<input type="radio" name="opcion" value="Baloncesto" required="">Baloncesto</br>
					<input type="radio" name="opcion" value="Balonmano" required="">Balonamno</br>
					<input type="radio" name="opcion" value="Tenis" required="">Tenis</br>
					<input type="radio" name="opcion" value="Rugby" required="">Rugby</br>
					<input type="submit" type="button" class="btn-xs btn-info" value="Enviar">
				</fieldset>	
	 		</form>
	 	<?php } ?>		
	 </div>
	







