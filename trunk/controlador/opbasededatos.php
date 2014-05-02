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
	

 
    public function conectar(){
        $this->conexion=mysqli_connect($this->host,$this->user,$this->clave);
        mysqli_select_db($this->conexion, $this->bd);
    }
		
	public function insertarUser($user, $correo, $pass, $nombre, $apellidos, $fecha, $provincia){
		$consulta="insert into usuario (nombre, apellidos, nombreuser, password, correo, provincia, fecha, tipo)
		values('$nombre', '$apellidos', '$user', '$pass', '$correo', '$provincia', '$fecha', '0')";
		$this->conectar();
		$resultado = mysqli_query($this->conexion,$consulta);
		$this->cerrar();
		unset($consulta);
		return $resultado;
	}
	
	public function conseguirDatosUsuario($nombreUser, $pass){
		$consulta = "select * from usuario where nombreuser = '$nombreUser' AND password = '$pass'";
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
		$consulta = "select * from pedidos where fecha = '$fecha' and zona='$zona' order by nombre_pista, hora";
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
	
	public function insertarPedido($id_user, $nombre_pista, $fecha, $hora, $tipo_reserva, $zona){
		$consulta = "insert into pedidos (id_user, nombre_pista, fecha, hora, tipo_reserva, zona)
		values('$id_user', '$nombre_pista', '$fecha', '$hora', '$tipo_reserva', '$zona')";
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
	
	public function cerrar () {
        @mysql_close($this->conexion);
    }
}
?>