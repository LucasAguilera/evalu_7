<?php

require('conexionBD.php');

$con = new conexionBD();

$respuesta['tipo'] = $con->iniciarConexion();
$respuesta['existe']= $con->hay_usuario();
if ($respuesta['tipo'] == "OK") {
	if($respuesta['existe'] != "OK")
	{
		$conexion = $con->getConexion();
		$insert = $conexion->prepare('INSERT INTO `usuarios`(`email`, `nombre`, `password`, `fecha_nacimiento`) VALUES (?,?,?,?)');
		$insert->bind_param('ssss', $email, $nombre, $password, $fecha_nacimiento);

		$email ="lucas@mail.com" ;
		$nombre = "Lucas";
		$password = password_hash("1234",PASSWORD_DEFAULT);
		$fecha_nacimiento = "1988-03-11" ;

		$insert->execute();
		
		$email = "gise@mail.com";
		$nombre = "Gisela";
		$password = password_hash("78945",PASSWORD_DEFAULT);
		$fecha_nacimiento = "1987-01-29" ;

		$insert->execute();

		$email = "pepe@mail.com" ;
		$nombre = "jose";
		$password =password_hash("1122",PASSWORD_DEFAULT);
		$fecha_nacimiento = "1983-12-02";

		$insert->execute();
	}
	

}




 ?>
