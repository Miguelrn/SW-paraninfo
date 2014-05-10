<?php
	include_once './controlador/opbasededatos.php';
	$BDD = new Mysql();

?>

<script>
	function imgmapa() {
		$('#zona_central').load('./vista/mapa.php');
	}
	function alumnos() {
		$('#zona_central').load('./vista/alumnos.php');
	}
	function precio() {
		$('#zona_central').load('./vista/precios.php');
	}
	function casos() {
		$('#zona_central').load('./vista/casosUso.php');
	}
	function ubicacion() {
		$('#zona_central').load('./vista/ubicacion.php');
	}
	function zona(id){
		$('#zona_central').load('./vista/zona.php?opcion='+id);
	}
	function infodis() {
		$('#zona_central').load('./vista/infodis.php');
	}
</script>


 <ul class="list-menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="#">Complejos Deportivos</a>
		<ul id="categorias">
			 <li><a href="#" onclick="zona(0)">Zona Norte</a></li>
			 <li><a href="#" onclick="zona(1)">Zona Sur</a></li>
			 <li><a href="#" onclick="zona(2)">Zona Suroeste</a></li>
			 <li><a href="#" onclick="zona(3)">Zona N&#170; Sra. de la Almudena</a></li>
			 <li><a href="#" onclick="zona(4)">Zona Somosaguas</a></li>
		</ul>
	</li>
	
	<li><a href="#">Otra Informaci&oacute;n</a>
		<ul class="otros">
			<li><a href="#" onclick="precio()">Precios</a></li>
			<li><a href="#" onclick="ubicacion()">Ubicaci&oacute;n</a></li>
		</ul>
	</li>
	
	<li><a href="#">Entrega P1</a>
		<ul class="otros">
			<li><a href="#" onclick="casos()">Casos de uso</a></li>
			<li><a href="#" onclick="alumnos()">Alumnos</a></li>
		</ul>
	</li>
	<li><a href="#">Entrega P2</a>
		<ul class="otros">
			<li><a href="#" onclick="imgmapa()">Mapa del sitio</a></li>
			<li><a href="#" onclick="infodis()">Informaci&oacute;n de dise&ntilde;o</a></li>
			<!--<li><a href="#">nada</a></li>-->
		</ul>
	</li>

 </ul>
 
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

