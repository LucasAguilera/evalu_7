<?php

	session_start(); 
	if (isset($_SESSION['email'])) { //verifica la si hay sesion iniciada
		session_destroy(); 
		$response['msg'] = 'Redireccionar'; //Redireccionar
		header('Location: ../client/index.php');
	}else{
		$response['msg'] = 'Sesion no iniciada'; //Mostrar mensaje
	}
	echo json_encode($response); //Devolver respuesta

 ?>



 ?>
