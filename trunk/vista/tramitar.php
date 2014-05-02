<?php		
	if (session_id() == "") {
		@session_start();
	}
?>
<div>
	<form name="tramitar" action="controlador/venta.php" method="POST">
		<h3>Datos personales</h3>
		Nombre: <?php echo $_SESSION['nombre']; ?> </br>
		Apellidos: <?php echo $_SESSION['apellidos']; ?> </br>
		Correo: <?php echo $_SESSION['correo']; ?> </br>

		<h3>Tu cesta</h3>
		<?php 
			
			$reservas = $_SESSION['reserva'];//consultar todos los items desde BD? o cookie? desde BD	
			$total = 0;		
			for ($i=0, $len=count($reservas); $i<$len; $i++) {
				echo $reservas[$i][1];
				echo "	".$reservas[$i][5]."€";
				echo "</br>";
				
				$total = $total + $reservas[$i][5];//el precio
			}		
		?>
		<h3>Total: <?php echo $total ?>€</h3>
	
		<h3>Pago</h3>
		Datos Bancarios: 
		<input type="number" name="banco" required="" placeholder="Datos Bancarios"/></br>			

		<button type="submit" class="btn-group-xs btn-info" value="Confirmacion">Confirmación</button>
	</form>
	

</div>