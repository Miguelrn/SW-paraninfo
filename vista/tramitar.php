<?php		
	if (session_id() == "") {
		@session_start();
	}
?>
<div>
	<form action="./controlador/venta.php" method="post" accept-charset="utf-8">
	<h3>Datos personales</h3>
	Nombre: <?php echo $_SESSION['nombre']; ?> </br>
	Apellidos: <?php echo $_SESSION['apellidos']; ?> </br>
	Correo: <?php echo $_SESSION['correo']; ?> </br>

	<h3>Tu cesta</h3>
	<?php 
		
		$reservas = $_SESSION['reserva'];
		$total = 0;		
		for ($i=0, $len=count($reservas); $i<$len; $i++) {
			echo $reservas[$i][1];
			echo "	".$reservas[$i][5]."€";
			echo "</br>";
			
			$total = $total + $reservas[$i][5];//el precio
		}		
	?>
	<h3>Total: <?php echo $total ?>€</h3>
	<input type="numeric" requiered="" placeholder="Datos bancarios"/></br>
	<input type="submit" value="Comprar" class="btn-xs btn-info"/>
</form>
	 <!-- FALTA COMPROBAR QUE LAS PISTAS NO ESTEN REPETIDAS Y QUE SIGAN ESTANDO LIBRES -->
		

	
	Paypal(sandbox):
	<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	    <input type="hidden" name="cmd" value="_cart">
	    <input type="hidden" name="upload" value="1">
	    <input type="hidden" name="business" value="ppaypal@paraninfo.tk">
	    <input type="hidden" name="currency_code" value="EUR">
	    <input type="hidden" name="email" value="<?php echo $_SESSION['correo']?>">
	    <?php 
	    	for ($i=1, $len=count($reservas); $i<=$len; $i++) { ?> 
				<input type="hidden" name="item_name_<?php echo $i ?>" value="<?php echo $reservas[$i-1][1]?>"> 
				<input type="hidden" name="amount_<?php echo $i ?>" value="<?php echo $reservas[$i-1][5] ?>">
				<input type="hidden" name="on0_<?php echo $i ?>" value="fecha">
				<input type="hidden" name="os0_<?php echo $i ?>" value="<?php echo $reservas[$i-1][2] ?>"><!-- fecha -->
				<input type="hidden" name="on1_<?php echo $i ?>" value="hora">
				<input type="hidden" name="os1_<?php echo $i ?>" value="<?php echo $reservas[$i-1][3] ?>"><!-- hora -->
				<input type="hidden" name="on2_<?php echo $i ?>" value="tipo_reserva">
				<input type="hidden" name="os2_<?php echo $i ?>" value="<?php echo $reservas[$i-1][4] ?>"><!-- tipo reserva -->
				<input type="hidden" name="on3_<?php echo $i ?>" value="zona">
				<input type="hidden" name="os3_<?php echo $i ?>" value="<?php echo $reservas[$i-1][6] ?>"><!-- zona -->
				<input type="hidden" name="on4_<?php echo $i ?>" value="Numero pista">
				<input type="hidden" name="os4_<?php echo $i ?>" value="<?php echo $reservas[$i-1][7] ?>"><!-- Numero pista -->
		<?php } ?>
		<input type="hidden" name="custom" value="<?php echo $len ?>"><!-- Numero Articulos -->
		 <input type="hidden" name="return" value="http://paraninfo.tk/controlador/sucess.php">
	    <input type="hidden" name="return" value="http://paraninfo.tk">
	    <input type="hidden" name="notify_url" value="http://paraninfo.tk/controlador/ipn.php">
	    <input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	</form>
	


</div>