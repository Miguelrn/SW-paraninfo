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
	function componentes(){
		$('#zona_central').load('./vista/componentes.php');
	}
	function codigo(){
		$('#zona_central').load('./vista/codigo.php');
	}
</script>

<fieldset>
	<legend>Panel principal</legend>
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

		<?php 
			if($_SESSION['logueado'] && $_SESSION['tipo'] == 0){
		?>
		
			<li><a href="#" onclick="editar()">Editar perfil</a></li>
			<li><a href="#" onclick="cambiarpass()">Cambiar contaseña</a></li>
			<li><a href="#" onclick="reservas()">Reserva actual</a></li>
			<li><a href="#" onclick="pedidosUser()">Mis pedidos</a></li>	

		<?php } else if(($_SESSION['logueado']) == 0){ ?>	
		
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
			<li><a href="#">Entrega P3</a>
				<ul class="otros">
					<li><a href="#" onclick="componentes()">Componentes y Nav.</a></li>
					<li><a href="#" onclick="codigo()">Código fuente</a></li>
				</ul>
			</li>

		<?php } ?>
		
	</ul>
</fieldset>