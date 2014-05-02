
<form action="controlador/insertaUser.php" name="register" method="POST" accept-charset="utf-8">
	<fieldset id="leyenda">
	<legend>Informaci&oacute;n Personal </legend>
		Nombre</br><input class="registro" placeholder="Nombre" type="text" name="nombre" required=""></br></br>
		Apellidos</br> <input class="registro" type="text" placeholder="Apellidos" name="apellidos" required=""></br></br>
		Nombre de usuario</br> <input class="registro" type="text" placeholder="Usuario" name="user" required=""></br></br>
		Contrase&ntilde;a</br> <input class="registro" type="password" placeholder="Contraseña" name="passw" required=""></br></br>
		Repite Contraseña</br> <input class="registro" type="password" placeholder="Contraseña" name="repassw" required=""></br></br>
		Correo electr&oacute;nico</br> <input class="registro" type="email" placeholder="E-Mail" name="correo" required=""></br></br>
		Provincia</br> <input class="registro" type="text" placeholder="Provincia" name="provincia" required=""></br></br>
		Fecha de Nacimiento</br><input class="registro" type="date" name="fecha" placeholder="dd/mm/aaaa" required=""></br>
	</fieldSet>	
	</br>			
	<!--&#191C&oacute;mo nos conociste?<br>
	<input type="checkbox" name="conocer">
		A trav&eacute;s de un amigo.<br>
	<input type="checkbox" name="conocer">
		A trav&eacute;s de un buscador.<br>
	<input type="checkbox" name="conocer">
		Navegando por la red.<br>
	<input type="checkbox" name="conocer">
		Otros
	<br><br>
		
	Opini&oacute;n sobre nuestra p&aacute;gina web<br>
	<textarea id="texto" name="opinion" placeholder="Escriba aqui su opinion..."></textarea><br><br>
-->
		
	<div>
		<input type="submit" type="button" class="btn-xs btn-info" value="Enviar Formulario">
		<input type="submit" type="button" class="btn-xs btn-info" value="Borrar Formulario">
	</div>

	
</form>
