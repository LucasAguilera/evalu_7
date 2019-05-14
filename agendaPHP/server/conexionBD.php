<?php 
	session_start();

	
	class conexionBD
	{

		
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';

		public $datebase = 'agendabd';

		public $conexion;

		function iniciarConexion(){

			$this->conexion = new mysqli($this->host, $this->user, $this->password, $this->datebase);
			if($this->conexion->connect_error){
				return $this->conexion->connect_errno;

			} else{
				
				return 'OK';
			}

		}
		function ejecutarQuery($sql){
			return $this->conexion->query($sql);
		}
		function cerrarConexion(){
			$this->conexion->close();
		}
		function getConexion(){
			return $this->conexion;
		}
		function hay_usuario(){
			$sql = "SELECT * FROM `usuarios`";
			$registro = $this->conexion->query($sql);
			while ($reg = mysqli_fetch_array($registro)) {
				echo  $reg['email'];
			}

		}
		function check_usuario($user,$password){
			$sql = "SELECT * FROM `usuarios` WHERE `email` = '$user'" ;
			

			$registro = $this->conexion->query($sql);

			if ($reg = mysqli_fetch_array($registro)) {
				if (password_verify($password, $reg['password'])) {
				
					$_SESSION['email'] = $user;
					$respuesta['msg']= "OK";
					$respuesta['acceso']= "Autorizado";
				}else{
					$respuesta['msg'] = "password incorrecto";
					$respuesta['acceso'] = "Acceso denegado";
				}
								
			}else{
				$respuesta['msg'] = "Usuario incorrecto";
				$respuesta['acceso'] = "Acceso denegado";
			}
			return $respuesta;
	}
	function hay_eventos(){
		$sql = "SELECT * FROM `evento`";
		$registro = $this->conexion->query($sql);
		if($reg = mysqli_fetch_array($registro)){
			return "OK";
		}
		else{
			return"no existen eventos";
		}
	
	}
function mostrarEvento($user){
			$sql = "SELECT * FROM `evento` WHERE `email`='$user'";
			$registro = $this->conexion->query($sql);
			while ($reg = mysqli_fetch_array($registro)) {
				printf($reg['email']."---".$reg['titulo']." ");
			}
		}
}
?>
