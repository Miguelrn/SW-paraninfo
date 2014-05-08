<?php  
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	$resultado = $BDD->consultarPrecios();
	session_start();
	if (isset($_SESSION['error'])){
    ?>              
    <script>                        
            alert("<?php echo $_SESSION['error']?>");//informa del error mediante un popup          
    </script>       
    <?php
         unset($_SESSION['error']);}                       
    ?>

<div id="modprec">
	
	<script>
			function cambiaPrecio(id) {
				var e = document.getElementById('precio');
				var valPrecio = e.value == "" ? "0" : e.value ;
				
				event.preventDefault();
				
				console.log(id);
				
			    $('#modprec').load('./controlador/cambiarPrecios.php?id='+id+'&precio='+valPrecio);
			}
	</script>

	<table class="table">
		<thead>
			<tr>
			    <th>ID</th>
			    <th>Nombre</th>
			    <th>Precio</th>
			    <th>Tipo</th>
			    <th>Modificar</th>
		  	</tr>
		</thead>
		<tbody>	
	<?php	
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {		
	?>
			<tr>
					<th><?php print $row['id'];?></th>
					<th><?php print $row['nombre'];?></th>
					<th><input type="text" id="precio" required="" value="<?php print $row['precio'];?>"></th>
					<th><?php print $row['tipo'];?></th>
					<th><button class="btn-xs btn-info" onclick="cambiaPrecio(<?php echo $row['id'] ?>)">Modificar</button></th>
			</tr>

	<?php }//cierra el while ?>
		</tbody>
	</table>
</div>