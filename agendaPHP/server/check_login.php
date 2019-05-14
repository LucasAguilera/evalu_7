<?php
require('conexionBD.php');
$con = new conexionBD();

$respuesta['tipo'] = $con->iniciarConexion();
/*$respuesta['msg'] = '';
$respuesta['acceso'] = '';*/

	if ($respuesta['tipo'] == 'OK') {
	 //$resp=	$con->check_usuario("lucas@mail.com","1245");
	 $resp = $con->check_usuario($_POST['username'],$_POST['password']);	
	}

//echo $resp['msg'].$_SESSION['email'];


		
echo json_encode($resp);

$con->cerrarConexion();


 ?>
