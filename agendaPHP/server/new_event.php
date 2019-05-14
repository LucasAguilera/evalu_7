<?php
  
require('conexionBD.php');
$con = new conexionBD;

$respuesta['tipo'] =$con->iniciarConexion();

if ($respuesta['tipo'] == "OK") {
	$titulo =$_POST['titulo'];
	$fecha_inicio = $_POST['start_date'] ;
	$fecha_fin= $_POST['end_date'] ;
	$hs_inicio = $_POST['start_hour'];
	$hs_fin= $_POST['end_hour'];
	$allDay= $_POST['allDay'];
	$email= $_SESSION['email'] ;

	$sql = "
	INSERT INTO `evento` (`id`, `titulo`, `fecha_inicio`, `fecha_fin`, `hs_inicio`, `hs_fin`,`tododia` `email`)
	 VALUES (NULL,'$titulo','$fecha_inicio','$fecha_fin','$hs_inicio','$hs_fin',allDay,'$email')";

	$respuesta['msg'] = "OK"; 
	$con->ejecutarQuery($sql);
	echo json_encode($respuesta);
	

}

 ?>
