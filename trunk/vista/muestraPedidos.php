<?php  
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	$resultado = $BDD->consultarPedidos();
?>
<div>
	<table class="table">
		<thead>
			<tr>
			    <th>ID Pedido</th>
			    <th>ID Usuario</th>
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
				<th><?php print $row['id_user']?></th>
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