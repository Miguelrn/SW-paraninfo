<?php
	include_once './controlador/opbasededatos.php';
	$BDD = new Mysql();

?>
		<?php 
		if(($_SESSION['logueado'] && $_SESSION['tipo'] == 0) || ($_SESSION['logueado']) == 0){
		?>
		
		<script>
			function muestraConsulta() {
				var e = document.getElementById('fecha');
				var valfecha = e.value == "" ? "ninguno" : e.value ;
				
				e = document.getElementById('comboBoxZona');
				var valdep = e.options[e.selectedIndex].value;
			
				//console.log('./vista/consulta.php?fecha='+valfecha+'&zona='+valzona);
				event.preventDefault();
				
			    $('#zona_central').load('./vista/consulta.php?fecha='+valfecha+'&deporte='+valdep);
			
			}
		</script>
		
		<form onsubmit="muestraConsulta()" method="get">
			<fieldset>
				<legend><strong>RESERVAS</strong></legend>
				<label>DIA:<br><input type="date" id="fecha" name="fecha" required></label><br>
				
				<label>DEPORTE:<br><select id="comboBoxZona">
							<option value="Futbol">Futbol</option>
							<option value="Futbol_sala">Futbol sala</option> 
							<option value="Balonmano">Balonmano</option>
							<option value="Baloncesto">Baloncesto</option>
							<option value="Rugby">Rugby</option>
							<option value="Tenis">Tenis</option>
							<option value="Piscina">Piscina</option>
							<option value="Polideportivo">Polideportivo</option>
							<option value="Atletismo">Atletismo</option>
							<option value="Fronton">Fronton</option>
							<option value="Sala_multiple">Sala multiple</option>
							<option value="Musculacion">Musculacion</option>
							<option value="Padel">Padel</option>
							<option value="Rocodromo">Rocodromo</option>
							<option value="Voleibol">Voleibol</option>
							<option value="Volley_playa">Volley playa</option>
					 	 </select></label>
				<br>
				<button type="submit" class="btn-xs btn-info">Elegir hora</button>
			</fieldset>
		</form>
	<?php 
		}
		if($_SESSION['logueado'] && $_SESSION['tipo'] == 0){
	?>
	
	<!-- USUARIO NORMAL -->
	
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
					<strong>¿Deporte preferido?</strong></br>
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
	
	<?php } else if($_SESSION['logueado'] && $_SESSION['tipo'] == 1){ ?>
	
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
			function pistas(){
				$('#zona_central').load('./vista/muestraPistas.php');
			}
		</script>
	
		<!-- ADMINISTRADOR -->	
		
		<fieldset>
			<legend>Panel de Administrador</legend>
			<ul class="list-menu">
				<li><a href="#" onclick="pedidos()">Mostrar pedidos</a></li>
				<li><a href="#" onclick="usuarios()">Mostrar/Baja usuarios</a></li>
				<li><a href="#" onclick="precios()">Editar precios</a></li>
				<li><a href="#" onclick="pistas()">Editar pistas</a></li>
			</ul>
		</fieldset>
	
	<?php } ?>
	

	
	
	







