<?php
	session_start();
?>
<form name="perfil" action="./controlador/cambiarperfil.php" method="post" accept-charset="utf-8">
	<fieldset>
		<legend>Cambiar datos</legend>
		Nombre</br><input type="text" name="nombre" required="" placeholder="nombre" value="<?php echo $_SESSION['nombre']?>"></br>
		Apellidos</br><input type="text" name="apellidos" required="" placeholder="apellidos" value="<?php echo $_SESSION['apellidos']?>"></br>
		Provincia</br><input type="text" name="provincia" required="" placeholder="provincia" value="<?php echo $_SESSION['provincia']?>"></br>
		Fecha de nacimiento</br><input type="date" name="fecha" required="" placeholder="fecha de nacimiento" value="<?php echo $_SESSION['fecha']?>"></br>
		</br>

		<input type="submit" type="button" class="btn-xs btn-info" value="Modificar">
	</fieldset>	
</form>