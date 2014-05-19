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
				var valzona = e.options[e.selectedIndex].value;
			
				console.log('./vista/consulta.php?fecha='+valfecha+'&zona='+valzona);
				event.preventDefault();
				
			    $('#zona_central').load('./vista/consulta.php?fecha='+valfecha+'&zona='+valzona);
			
			}
		</script>
		
		<form onsubmit="muestraConsulta()" action="" method="get">
			<fieldset>
				<legend><strong>RESERVAS</strong></legend>
				DIA:</br><input type="date" id="fecha" name="fecha" required=""></br>
				
				ZONA:</br><select id="comboBoxZona">
							<option value="norte">Norte</option>
							<option value="sur">Sur</option> 
							<option value="suroeste">Suroeste</option>
							<option value="seniora">Nª Señora</option>
							<option value="somosaguas">Somosaguas</option>
					 	 </select>
				</br>
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
		</script>
	
		<!-- ADMINISTRADOR -->	
		
		<fieldset>
			<legend>Panel de Administrador</legend>
			<ul class="list-menu">
				<li><a href="#" onclick="pedidos()">Mostrar pedidos</a></li>
				<li><a href="#" onclick="usuarios()">Mostrar/Baja usuarios</a></li>
				<li><a href="#" onclick="precios()">Editar precios</a></li>
			</ul>
		</fieldset>
	
	<?php } ?>
	

	
	
	







