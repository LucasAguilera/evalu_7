<?php
require('conexionBD.php');
$con = new conexionBD;

$respuesta['tipo'] =$con->iniciarConexion();

if ($respuesta['tipo']== "OK") {
	 	
	
	$id = $_POST['id'];


	$result = "DELETE FROM `evento` WHERE `id`= $id ";
	$sql = $con->ejecutarQuery($result);
	$respuesta['msg'] = "OK";

echo json_encode($respuesta);
}


 ?>
