<?php
    //phpinfo();
?>
	
	<h4> Bienvenido a la p&aacute;gina de reservas de las instalaciones deportivas de la UCM. </h4>
	
	<p>
		<strong>Alumnos: Jose Miguel Rodr&iacute;guez Navarro e Iv&aacute;n M&eacute;ndez Jim&eacute;nez</strong>	
	</p>
	
	<p>
	En esta p&aacute;gina podr&aacute; visitar nuestras instalaciones, as&iacute; 
	como sus respectivas ubicaciones y precios. Nuestros usuarios tendr&aacute;n la posibilidad
	de registrarse para hacer reservas de las pistas y conocer la disponibilidad de las mismas.
	</p>
	
	<?php if(($_SESSION['logueado']) == 0){ ?>	
	
	<p>
	En el apartado Entrega P1 se detallan los actores y los casos de uso que describen la funcionalidad 
	del sistema web. 
	</p>
	<p>
	En el apartado Entrega P2 se detallan el mapa del sitio, con las distintas opciones de navegaci&oacute;n 
	y una breve descripci&oacute;n con la informaci&oacute;n de dise&ntilde;o del sitio web.	
	</p>
	<p>
	En el apartado Entrega P3 se detalla el diagrama con la estructura de componentes del sitio web.
	</p>
	
	<?php } else if($_SESSION['logueado'] && $_SESSION['tipo'] == 0){ ?>
		
	<p>
	En el menú de la izquierda podrá, entre otras cosas, editar su perfil, cambiar su contraseña, consultar sus
	reservas actuales y ver su histórico de reservas realizadas hasta el momento.
	</p>
	<p>
	Por otro lado, en el apartado <strong>RESERVAS</strong> del lado derecho de la página, podrá realizar las reservas de las pistas
	que desee y estén disponibles.
	</p>
		
	<?php } else if($_SESSION['logueado'] && $_SESSION['tipo'] == 1){ ?>
	
	<p>
	Usted está en la cuenta del administrador. 
	En el menú de la izquierda podrá encontrar información acerca de las pistas.
	En el menú de la derecha se tiene acceso al panel del administrador, desde el cuál se pueden hacer consultas y ediciones.
	</p>
	
	<?php } ?>