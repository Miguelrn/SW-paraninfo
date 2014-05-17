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
	
		<!--<h3>Pago</h3>
		Datos Bancarios: 
		<input type="number" name="banco" required="" placeholder="Datos Bancarios"/></br>			

		<button type="submit" class="btn-group-xs btn-info" value="Confirmacion">Confirmación</button>-->
		<script src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=ppaypal@paraninfo.tk" 
		    data-button="buynow" 
		    data-name="Reserva Pistas Deportivas" 
		    data-amount="<?php echo $total ?>" 
		    data-currency="EUR" 
		    data-shipping="0" 
		    data-tax="0" 
		    data-callback="http://paraninfo.tk/controlador/ipn.php" 
		    data-env="sandbox"
		></script>
	</form>
	
	
	Test Purpose:
	<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	    <input type="hidden" name="cmd" value="_xclick">
	    <input type="hidden" name="business" value="ppaypal@paraninfo.tk"><!--Personal -->
	    <input type="hidden" name="currency_code" value="USD">
	    <input type="hidden" name="item_name" value="Reserva Pista Deportiva">
	    <input type="hidden" name="amount" value="<?php echo $total ?>">
	    <input type="hidden" name="return" value="http://paraninfo.tk">
	    <input type="hidden" name="notify_url" value="http://paraninfo.tk/controlador/ipn.php">
	    <input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	</form>
	

</div>