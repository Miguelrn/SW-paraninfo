<?php  
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	$resultado = $BDD->consultarUsuarios();
?>	

<div id="listauser">
	
	<script>
		function borraUsuario(id){	
			
			var select = confirm("¿Desea realmente borrar este usuario?"); 

			if(select) {
				alert("USUARIO ELIMINADO");	
				$("#listauser").load("./controlador/borraUser.php?id="+id);
			} 
			else {
				alert("USUARIO NO ELIMINADO");
			} 	
		};
	</script>
	
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
			    <th>Eliminar</th>
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
				<th><button name="delete" type="button" class="btn-group-xs btn-info" onclick="borraUsuario(<?php echo $row['id'] ?>)">X</button></th>
			</tr>

	<?php }}//cierra el while ?>
		</tbody>
	</table>
</div>