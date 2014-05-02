<?php  
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	$resultado = $BDD->consultarPrecios();
?>
<div>
	<!-- 
		LA IDEA ES DARLE LA POSIBILIDAD DE EDITAR LOS PRECIOS, FUTURA EXPANSION DE FUNCIONALIDADES, UNA VEZ PROBADO TODO EL RESTO HARA ESTO 
	-->	

	<table class="table">
		<thead>
			<tr>
			    <th>ID</th>
			    <th>Nombre</th>
			    <th>Precio</th>
			    <th>Tipo</th>
		  	</tr>
		</thead>
		<tbody>	
	<?php	
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {		
	?>
			<tr>
				<th><?php print $row['id'];?></th>
				<th><?php print $row['nombre'];?></th>
				<th><?php print $row['precio'];?></th>
				<th><?php print $row['tipo'];?></th>
			</tr>

	<?php }//cierra el while ?>
		</tbody>
	</table>
</div>