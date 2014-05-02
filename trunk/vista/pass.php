<?php
	session_start();
?>
<form name="passchange" action="./controlador/cambiarpass.php" method="post" accept-charset="utf-8">
	<fieldset>
		<legend>Cambiar contrase&ntilde;a</legend>
		Contrase&ntilde;a actual</br><input type="password" name="oldpass" required="" placeholder="contraseña"></br>
		Nueva contrase&ntilde;a</br><input type="password" name="newpass" required="" placeholder="nueva contraseña"></br>
		Repite contrase&ntilde;a</br><input type="password" name="reppass" required="" placeholder="repita contraseña"></br>
		</br>
		
		<input type="submit" type="button" class="btn-xs btn-info" value="Modificar">
	</fieldset>	
</form>