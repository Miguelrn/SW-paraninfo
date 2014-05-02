<?php
   include_once '../controlador/opbasededatos.php';
   $BDD = new Mysql();
?>


<div>
	<u><h2>Precios de las instalaciones</h2></u>

	<h4>1. PISCINAS</h4>  
	1 ba&ntilde;o: <?php
		$consulta = $BDD->consultaPrecio("Piscina-seniora", "1 banio");
		echo $consulta['precio']."€";
	?>
	</br>
	10 ba&ntilde;os: <?php
		$consulta = $BDD->consultaPrecio("Piscina-seniora", "10 banios");
		echo $consulta['precio']."€";
	?>
	</br> 
	1 calle/hora: <?php
		$consulta = $BDD->consultaPrecio("Piscina-seniora", "1 calle");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>2. TENIS, PADEL Y VOLEY-PLAYA (pista precio hora/m&aacute;x. 4 personas)</h4> 
	1h (horario de ma&ntilde;ana hasta las 12h): <?php
		$consulta = $BDD->consultaPrecio("Tenis", "antes 12");//padel y voley podrian tener diferente precio?
		echo $consulta['precio']."€";
	?>
	</br> 
	1h (horario de tarde a partir de las 13h): <?php
		$consulta = $BDD->consultaPrecio("Tenis", "despues 13");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>3. INSTALACIONES SUR: Atletismo (pista/60 min.)</h4>
	1 hora (m&aacute;x. 25 personas): <?php
		$consulta = $BDD->consultaPrecio("Atletismo", "1 hora");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>4. INSTALACIONES SUR: Front&oacute;n cubierto (pista precio hora/m&aacute;x. 4 personas)</h4>
	1 hora: <?php
		$consulta = $BDD->consultaPrecio("Fronton", "1 hora");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>5. POLIDEPORTIVOS AIRE LIBRE (Baloncesto, Balonmano, F&uacute;tbol Sala, Voleibol)</h4>
	1 hora: <?php
		$consulta = $BDD->consultaPrecio("Baloncesto", "1 hora");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>6. POLIDEPORTIVOS ALMUDENA, Y SOMOSAGUAS PABELL&Oacute;N CUBIERTO (Baloncesto, Balonmano, F&uacute;tbol Sala, Voleibol)</h4>
	1 hora: <?php
		$consulta = $BDD->consultaPrecio("Polideportivo", "1 hora");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>7. GRANDES CAMPOS: Campos de Rugby: CANTARRANAS (ZONA SUROESTE), ZONA NORTE y ZONA SUR</h4>
	Alquiler 1 hora: <?php
		$consulta = $BDD->consultaPrecio("Rugby", "1 hora");
		echo $consulta['precio']."€";
	?>
	</br> 
	Partido 2 horas: <?php
		$consulta = $BDD->consultaPrecio("Rugby", "partido");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>8. GRANDES CAMPOS: Campo de Hierba PARANINFO (ZONA NORTE)</h4>
	Alquiler 1 hora: <?php
		$consulta = $BDD->consultaPrecio("Futbol-norte", "1 hora");
		echo $consulta['precio']."€";
	?>
	</br> 
	Partido 2 horas: <?php
		$consulta = $BDD->consultaPrecio("Futbol-norte", "partido");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>9. GRANDES CAMPOS: Campo de Hierba SUR</h4>
	Alquiler 1 hora: <?php
		$consulta = $BDD->consultaPrecio("Futbol-sur", "1 hora");
		echo $consulta['precio']."€";
	?>
	</br> 
	Partido 2 horas: <?php
		$consulta = $BDD->consultaPrecio("Futbol-sur", "partido");
		echo $consulta['precio']."€";
	?>
	<hr>
	<h4>10. OTROS: Musculaci&oacute;n y Roc&oacute;dromo ZONA SUR</h4>
	1 hora: <?php
		$consulta = $BDD->consultaPrecio("Musculacion", "1 hora");
		echo $consulta['precio']."€";
	?>
</div>
