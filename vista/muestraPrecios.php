<?php  
	include_once '../controlador/opbasededatos.php';
	$BDD = new Mysql();
	$resultado = $BDD->consultarPrecios();
	session_start();
	if (isset($_SESSION['modPrecio'])){
    ?>              
    <script>                        
            alert("<?php echo $_SESSION['modPrecio']?>");//informa del error mediante un popup          
    </script>       
    <?php
         unset($_SESSION['modPrecio']);}                       
    ?>

<div id="modprec">
	
	<script>
			function cambiaPrecio(id,cont) {
				var e = document.getElementById(cont);
				var valPrecio = e.value == "" ? "0" : e.value ;
				
				event.preventDefault();
				
				//console.log(id, cont);
				
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
		$cont = 1;
		
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {		
	?>
			<tr>
					<th><?php print $row['id'];?></th>
					<th><?php print $row['nombre'];?></th>
					<th><input type="text" id="<?php echo $cont ?>" required="" value="<?php print $row['precio'] ?>"></th>
					<th><?php print $row['tipo'];?></th>
					<th><button class="btn-xs btn-info" onclick="cambiaPrecio(<?php echo $row['id'] ?>, <?php echo $cont ?>)">Modificar</button></th>
			</tr>

	<?php $cont++;}//cierra el while ?>
		</tbody>
	</table>
</div>