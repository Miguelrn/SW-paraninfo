<?php

class Mysql { // estaba puesto en minúsculas todo
  
   	private $host="localhost";
    private $user="root";
    private $clave="";
    private $bd="deportesucm";
    private $conexion;  
    private $sql;
	
	
	/*private $host="mysql.nixiweb.com";
    private $user="u528687211_root";
    private $clave="94019401";
    private $bd="u528687211_depor";
    private $conexion;  
    private $sql;*/
	
	
	public function limpia_sql($texto){

		$link = mysqli_connect($this->host,$this->user,$this->clave, $this->bd);
		
		if (get_magic_quotes_gpc()){
			$texto = stripslashes($texto);//quita /
		}	
		if (!is_numeric($texto)){
			$texto = mysqli_real_escape_string($link, $texto);
		}
			
		return $texto;
	}	

 
    public function conectar(){
        $this->conexion=mysqli_connect($this->host,$this->user,$this->clave);
        mysqli_select_db($this->conexion, $this->bd);
    }
		
	public function insertarUser($user, $correo, $pass, $nombre, $apellidos, $fecha, $provincia, $fecha_reg){
		$consulta="insert into usuario (nombre, apellidos, nombreuser, password, correo, provincia, fecha, fecha_registro,tipo)
		values('$nombre', '$apellidos', '$user', '$pass', '$correo', '$provincia', '$fecha', '$fecha_reg','0')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function conseguirDatosUsuario($nombreUser, $pass){//hash("sha256",$pass.($row['fecha_registro'] - $row['fecha']));
		$consulta = "select * from usuario where nombreuser = '$nombreUser' AND password= '$pass'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function consultaUser($nombreUser){
		$consulta = "select * from usuario where nombreuser = '$nombreUser'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function updateDatosUsuario($nombre, $apellidos, $provincia, $fecha, $id) {
		$consulta = "update usuario set nombre='$nombre', apellidos='$apellidos', provincia='$provincia', fecha='$fecha' where id='$id'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultaPedido($fecha, $zona){
		$consulta = "select * from pedidos where fecha = '$fecha' and zona='$zona' order by nombre_pista, NumeroPistas, hora";//not sure
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function pistasDisponibles($zona){
		$consulta = "select * from pistas where zona='$zona' order by nombre";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function updatePassUsuario($id, $cont) {
		$consulta = "update usuario set password = '$cont' where id ='$id'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	
	}
	
	public function consultaPrecio($nombre_pista,$tipo_reserva){
		$consulta = "select precio from precios where nombre='$nombre_pista' and tipo='$tipo_reserva';";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function insertarPedidoPaypal($id_user, $txn_id, $email, $nombre_pista, $precio, $fecha, $hora, $tipo_reserva, $zona, $numpista){
		$consulta = "insert into pedidos (id_user, txn_id, email, nombre_pista, NumeroPista, precio, fecha, hora, tipo_reserva, zona)
		values('$id_user', '$txn_id', '$email', '$nombre_pista', '$precio', '$fecha', '$hora', '$tipo_reserva', '$zona')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function insertarPedido($id_user, $nombre_pista, $fecha, $hora, $tipo_reserva, $zona, $numpista){
        $consulta = "insert into pedidos (id_user, nombre_pista, NumeroPistas, fecha, hora, tipo_reserva, zona)
        values('$id_user', '$nombre_pista', '$numpista','$fecha', '$hora', '$tipo_reserva', '$zona')";
        $this->conectar();
        $resultado = mysqli_query($this->conexion,$consulta);
        $this->cerrar();
        unset($consulta);
        return $resultado;
    }
	
	public function consultarPedidosUser($usuario){
		$consulta = "select * from pedidos where id_user='$usuario'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultarPedidos(){
		$consulta = "select * from pedidos";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultarUsuarios(){
		$consulta = "select * from usuario";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultarPrecios(){
		$consulta = "select * from precios";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function encuestaRealizada($id){//poner al usuario como que ha realizado la encuesta
		$consulta = "update usuario set encuesta=1 where id='$id'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function userEncuesta($user,$deporte){
		$consulta = "insert into encuesta (id_user, deporte)values('$user', '$deporte')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultarEncuesta(){//select count(*) as cantidad, deporte, sum(id_user) from encuesta group by deporte
		$consulta = "select count(*) as cantidad, deporte from encuesta group by deporte";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function consultaId($nombreUser){
		$consulta = "select id from usuario where nombreuser = '$nombreUser'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset ($resultado);
		return $r;
	}
	
	public function updatePreciosPistas($id, $precio){
		$consulta = "update precios set precio='$precio' where id = '$id'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		//$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) > 0;
	}
	
	public function usuarioLogeado($id, $correo){
		$consulta = "insert into logeos (id_user, correo) values ('$id', '$correo')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function buscarPedido($idPedido){
		$consulta = "SELECT * FROM pedidos WHERE txn_id = '$idPedido'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return mysqli_affected_rows($this->conexion) == 1;
	}
	
	public function deleteUser($id) {
		$consulta = "delete from usuario where id='$id'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}	
	
	public function numPistas($deporte, $zona){
		$consulta = "select NumeroPistas from pistas where nombre='$deporte' and zona='$zona'";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$r=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$this->cerrar();
		unset($consulta);
		unset($resultado);
		return $r;
	}
	
	public function cerrar () {
        @mysql_close($this->conexion);
    }
}
?>