<?php  
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	$resultado = $BDD->consultarUsuarios();
?>
<div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
			    <th>Nombre</th>
			    <th>Apellidos</th>
			    <th>Nombre Usuario</th>
			    <th>Correo</th>
			    <th>Provincia</th>
			    <th>Fecha</th>
			</tr>
	  	</thead>
	  	<tbody>
	<?php	
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
			if($row['tipo'] == 0){
				
	?>	
			<tr>
				<th><?php print $row['id'];?></th>
				<th><?php print $row['nombre'];?></th>
				<th><?php print $row['apellidos'];?></th>
				<th><?php print $row['nombreuser'];?></th>
				<th><?php print $row['correo'];?></th>
				<th><?php print $row['provincia'];?></th>
				<th><?php print $row['fecha'];?></th>
			</tr>

	<?php }}//cierra el while ?>
		</tbody>
	</table>
</div>