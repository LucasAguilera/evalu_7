<?php
require('conexionBD.php');
$con = new conexionBD;

$respuesta['tipo'] =$con->iniciarConexion();

if ($respuesta['tipo']== "OK") {
		
 	
	$fecha_inicio = $_POST['start_date'] ;
	$fecha_fin= $_POST['end_date'] ;
	$hs_inicio = $_POST['start_hour'];
	$hs_fin= $_POST['end_hour'];
	$id = $_POST['id'];


	$result = "UPDATE `evento` SET `fecha_inicio`='$fecha_inicio', `fecha_fin`='$fecha_fin'
	WHERE `id`= $id ";
	$sql = $con->ejecutarQuery($result);
	$respuesta['msg'] = "OK";

echo json_encode($respuesta);
}
 


 ?>
