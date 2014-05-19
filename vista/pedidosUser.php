<?php  
	session_start();
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	if(isset($_SESSION['id'])){
		$id_user = $_SESSION['id'];
	}	
	else{
		$user = $_SESSION['user'];
		$row = $BDD->consultaId($user);
		$id_user = $row['id'];
		$_SESSION['id'] = $id_user;
	}
	
	$resultado = $BDD->consultarPedidosUser($id_user);
?>
<div>
	<fieldset id="consulta">
		<legend class="text-center">Mi historial de pedidos</legend>
		<div>
			<table class="table">
				<thead>
					<tr>
					    <th>ID Pedido</th>
					    <th>Nombre Pista</th>
					    <th>Fecha</th>
					    <th>Hora</th>
					    <th>Tipo Reserva</th>
					    <th>Zona</th>
			  		</tr>
				</thead>
				<tbody>
			<?php	
				
				while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
					
			?>
					<tr>
						<th><?php print $row['id']?></th>
						<th><?php print $row['nombre_pista']?></th>
						<th><?php print $row['fecha']?></th>
						<th><?php print $row['hora'].":00"?></th>
						<th><?php print $row['tipo_reserva']?></th>
						<th><?php print $row['zona']?></th>
					</tr>
		
			<?php }//cierra el while ?>
				</tbody>
			</table>
		</div>
	</fieldset>	
</div>