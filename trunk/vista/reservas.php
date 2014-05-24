<?php		
	if (session_id() == "") {
		@session_start();
	}
?>
<div id="listaCompra">
	<legend class="text-center">Mi reserva actual</legend>
	<script>
		function borraReserva(num){		
			$("#listaCompra").load("./controlador/borraReserva.php?num="+num);
		};
	</script>	
		<table class="table">
			<thead>
				<tr>
		    		<th>Nombre</th>
		    		<th>Fecha</th>
				    <th>Hora</th>
				    <th>Tipo reserva</th>
				    <th>Numero Pista</th>
				    <th>Precio</th>
				    <th>Cancelar</th>
		  		</tr>
			</thead>
			<tbody>
		  
			<?php	
			if (isset($_SESSION['reserva'])){
				$reservas = $_SESSION['reserva'];		
				for ($i=0, $len=count($reservas); $i<$len; $i++) {
			?>		
					<tr>
						<th><?php echo ($reservas[$i][1])?></th><!-- nombre -->
						<th><?php echo ($reservas[$i][2])?></th><!-- fecha -->
						<th><?php echo ($reservas[$i][3])?></th><!-- hora -->
						<th><?php echo ($reservas[$i][4])?></th><!-- tipo reserva -->
						<th><?php echo ($reservas[$i][7])?></th><!--Numero pista -->
						<th><?php echo ($reservas[$i][5]."€") ?></th><!-- Precio -->
						<th><button name="delete" type="button" class="btn-group-xs btn-info" onclick="borraReserva(<?php echo $i ?>)">X</button></tr>
					</tr>	
			<?php
				}//cierra for
			}//cierra if
			?>
			</tbody>
		</table>
		<script>
			function comprar(){		
				$("#zona_central").load("./vista/tramitar.php");
			};
		</script>
		<?php 
			if(isset($_SESSION['reserva']) && count($_SESSION['reserva']) > 0){
		?>		
			<button type="submit" type="button" class="btn-group-xs btn-info" onclick="comprar()" value="Comprar">Comprar</button>
		<?php } ?>
</div>




  