
<?php
	$opcion = $_GET['opcion'];
	
	if($opcion == 0){//zona norte
		
?>
<div>
	<h2 class="zona">Complejo deportivo Zona Norte</h2>
	
	<div id="easy-slider">
			<div><img src="./Images/futbol.jpg" alt="Futbol" /></div>
			<div><img src="./Images/futbolsala.jpg" alt="Futbol Sala" /></div>
			<div><img src="./Images/balonmano.jpg" alt="Balonmano" /></div>
			<div><img src="./Images/baloncesto.jpg" alt="Baloncesto" /></div>
			<div><img src="./Images/rugby.jpg" alt="Rugby" /></div>
			<div><img src="./Images/tenis.jpg" alt="Tenis" /></div>
	</div>
	
	<p class="zona">Avenida Complutense s/n</br>
	Telefono: 91.394.60.93/91.394.60.92</br>
	Oficina Unidad de gestión de Actividades Deportivas UCM</br>
	<a href="http://goo.gl/maps/yjd8J">(Plano)</a></p></br>
</div>

<?php }else if($opcion == 1){ ?>  
<div>
	<h2 class="zona">Complejo deportivo Zona Sur</h2>
	<div id="easy-slider">
			<!-- Se debe enlazar a contenido usando href. -->
			<!--<a href="#" target="_blank">  </a>-->
			<div><img src="./Images/atS.jpg" alt="Atletismo" /></div>
			<div><img src="./Images/balMS.jpg" alt="Balonmano/Futbol" /></div>
			<div><img src="./Images/balS.jpg" alt="Baloncesto" /></div>
			<div><img src="./Images/colS.jpg" alt="Sala de Columnas" /></div>
			<div><img src="./Images/fronS.jpg" alt="Frontón" /></div>
			<div><img src="./Images/hierbaS.jpg" alt="Futbol" /></div>
			<div><img src="./Images/mulS.jpg" alt="Sala Múltiple" /></div>
			<div><img src="./Images/muscS.jpg" alt="Musculación" /></div>
			<div><img src="./Images/padelS.jpg" alt="Padel" /></div>
			<div><img src="./Images/pisS.jpg" alt="Piscina" /></div>
			<div><img src="./Images/rocS.jpg" alt="Rocódromo" /></div>
			<div><img src="./Images/rugbyS.jpg" alt="Rugby" /></div>
			<div><img src="./Images/tenS.jpg" alt="Tenis" /></div>
			<div><img src="./Images/volCS.jpg" alt="Voleibol" /></div>
			<div><img src="./Images/volS.jpg" alt="Volley Playa" /></div>
	</div>
	<p class="zona">Avenida Juan de Herrera s/n</br>
	Telefono: 91.394.11.69</br>
	<a href="http://goo.gl/maps/rLteJ">(Plano)</a></p></br>
</div> 
<?php }else if($opcion == 2){ ?>   
<div>
	<h2 class="zona">Complejo deportivo Zona Suroeste</h2>
	<div id="easy-slider">
			<img src="./Images/rugbySO.jpg" alt="Rugby" />
	</div>

	<p class="zona">Arquitecto López Otero s/n</br>
	Telefono: 91.394.16.53</br>
	<a href="http://goo.gl/maps/ERsPn">(Plano)</a></p></br>
</div>
<?php }else if($opcion == 3){ ?>  
<div>
	<h2 class="zona">Complejo deportivo Zona Nª Señora de la Almudena</h2>
	<div id="easy-slider">
			<img src="./Images/piscinaALMU.jpg" alt="Piscina" />
	</div>
	<p class="zona">Camino de las moreras s/n</br>
	Telefono: 91.394.62.66</br>
	<a href="http://goo.gl/maps/68BXv">(Plano)</a></p></br>
</div>	
<?php }else if($opcion == 4){ ?> 
<div>
	<h2 class="zona">Complejo deportivo Zona Somosaguas</h2>
	<div id="easy-slider">
			<img src="./Images/poliSO.jpg" alt="Polideportivo" />
	</div>
	<p class="zona">Campus de Somosaguas</br>
	Telefono: 91.394.23.98</br>
	<a href="http://goo.gl/maps/qN9v5">(Plano)</a></p></br>
</div>		 
<?php }?>  
