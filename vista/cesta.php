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
				<legend>Reservas</legend>
				<input type="date" id="fecha" name="fecha" required=""></br>
				
				<select id="comboBoxZona">
						<option value="norte">Norte</option>
						<option value="sur">Sur</option> 
						<option value="suroeste">Suroeste</option>
						<option value="seniora">Nª Señora</option>
						<option value="somosaguas">Somosaguas</option>
				</select>
				</br>
				<button type="submit" class="btn-xs btn-info">Consultar</button>
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
	<fieldset>
		<legend>Panel de Administrador</legend>
		<button type="button" class="btn-lg btn-info" onclick="pedidos()">Mostrar Pedidos</button>
		<button type="button" class="btn-lg btn-info" onclick="usuarios()">Mostrar Usuarios</button>
		<button type="button" class="btn-lg btn-info" onclick="precios()">Editar Precios</button>
		<button type="button" class="btn-lg btn-info" onclick="">Modificar Pistas</button>
		<button type="button" class="btn-lg btn-info" onclick="">Baja Usuario</button>
	</fieldset>
		
	<?php	} ?>
	
	
	








	

	
	
	







