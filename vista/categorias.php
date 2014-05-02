

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
		$('#zona_central').load('./ubicacion.php');
	}
	function zona(id){
		$('#zona_central').load('./vista/zona.php?opcion='+id);
	}
	function infodis() {
		$('#zona_central').load('./vista/infodis.php');
	}
</script>

<div class="fijo">
 <ul class="list-menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="#">Categorias</a>
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
</div>
