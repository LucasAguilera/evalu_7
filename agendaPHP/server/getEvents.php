<?php
require('conexionBD.php');
$con = new conexionBD;

$respuesta['tipo'] =$con->iniciarConexion();
$sesion = $_SESSION['email'];
if ($respuesta['tipo'] == "OK") {
 	
 	$result = "SELECT * FROM `evento` WHERE `email`='$sesion'";
 	$sql = $con->ejecutarQuery($result);
 	//print_r($sql);
	 	if($sql->num_rows != 0){
			$i = 0;
			while ($res = mysqli_fetch_assoc($sql)) {
		 	 	$resp['id'] = $res['id'];
		 	 	$resp['title'] = $res['titulo'];
		 	 	$resp['start'] = $res['fecha_inicio'].'T'.$res['hs_inicio'];
			 	$resp['end'] = $res['fecha_fin'].'T'.$res['hs_fin'];
			 	$respuesta['respuesta'][] = $resp;
			}

		
		 	
		 	 //$i++;
		 	
		 }

 }
$respuesta['msg'] = "OK";

echo json_encode($respuesta);

  



 ?>
