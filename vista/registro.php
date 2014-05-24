
<form action="controlador/insertaUser.php" name="register" method="POST" accept-charset="utf-8">
	<fieldset id="leyenda">
	<legend>Informaci&oacute;n Personal </legend>
		<label>Nombre:</br><input class="registro" placeholder="Nombre" type="text" name="nombre" required=""></label></br></br>
		<label>Apellidos:</br> <input class="registro" type="text" placeholder="Apellidos" name="apellidos" required=""></label></br></br>
		<label>Nombre de usuario:</br> <input class="registro" type="text" placeholder="Usuario" name="user" required=""></label></br></br>
		<label>Contrase&ntilde;a:</br> <input class="registro" type="password" placeholder="Contraseña" name="passw" required=""></label></br></br>
		<label>Repite Contraseña:</br> <input class="registro" type="password" placeholder="Contraseña" name="repassw" required=""></label></br></br>
		<label>Correo electr&oacute;nico:</br> <input class="registro" type="email" placeholder="E-Mail" name="correo" required=""></label></br></br>
		<label>Provincia:</br> <input class="registro" type="text" placeholder="Provincia" name="provincia" required=""></label></br></br>
		<label>Fecha de Nacimiento:</br><input class="registro" type="date" name="fecha" placeholder="dd/mm/aaaa" required=""></label></br>
	</fieldSet>	
	</br>			
	
		
	<div>
		<input type="submit" type="button" class="btn-xs btn-info" value="Enviar Formulario">
		<input type="reset" type="button" class="btn-xs btn-info" value="Borrar Formulario">
	</div>

	
</form>
