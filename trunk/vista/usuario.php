<?php
//isset($_SESSION['logueado']) &&
//echo isset($_SESSION['logueado']);
//echo isset($_SESSION['logueado']);
ini_set("display_errores", "stdout");
error_reporting(E_ALL | E_STRICT);
	
if (isset($_SESSION['logueado'])){	
	$usuarioLogueado = $_SESSION['logueado'];
} else {
	$_SESSION['logueado'] = false;
	$usuarioLogueado = false;
}

if ($usuarioLogueado){	
?>		
	<div class="loged">
		<p style="line-height: 0px;" class="fuenteSubtitulo">Bienvenid@ <?php echo $_SESSION['nombre']." ".$_SESSION['apellidos'] ?></p>

		<img id="fotoperfil" src="./Images/user.jpg"/> 
								
		<form name="logout" action="./controlador/logout.php" method="get" accept-charset="utf-8">
			<input type="submit" type="button" class="btn-xs btn-info" value="Salir">
		</form>			
	</div>
<?php
} else {//no esta logeado
?>
<script>
	function nuevouser(){
		$('#zona_central').load('./vista/registro.php');
	};
</script>
	<form name="login" action="controlador/login.php" method="get" accept-charset="utf-8">
			<input type="text" name="user" placeholder="Usuario" required="">
			<input type="password" name="pass" placeholder="Contraseña" required="">
			<input name="start_login" class="btn btn-xs btn-info" type="submit" value="Entrar"></br>
			
			<a class="fuenteSubtitulo" href="#" onclick="nuevouser()">¿Eres nuevo?</a><br>
	</form>	
<?php
}
?>
