<?php  
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	$resultado = $BDD->consultarPistas();
	session_start();
	if (isset($_SESSION['modPistas'])){
    ?>              
    <script>                        
            alert("<?php echo $_SESSION['modPistas']?>");//informa del cambio mediante un popup          
    </script>       
    <?php
         unset($_SESSION['modPistas']);}                       
    ?>

<div id="modpistas">
	
	<script>
			function cambiaNumeroPistas(id) {
				var e = document.getElementById('pistas');
				var valPistas = e.value == "" ? "0" : e.value ;
				
				event.preventDefault();
				
				console.log(id);
				
			    $('#modpistas').load('./controlador/cambiarPistas.php?id='+id+'&pistas='+valPistas);
			}
	</script>

	<table class="table">
		<thead>
			<tr>
			    <th>ID</th>
			    <th>Nombre</th>
			    <th>Zona</th>
			    <th>NumeroPistas</th>
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
					<th><?php print $row['zona'];?></th>
					<th><input type="text" id="pistas" required="" value="<?php print $row['NumeroPistas'];?>"></th>
					<th><button class="btn-xs btn-info" onclick="cambiaNumeroPistas(<?php echo $row['id'] ?>)">Modificar</button></th>
			</tr>

	<?php }//cierra el while ?>
		</tbody>
	</table>
</div>