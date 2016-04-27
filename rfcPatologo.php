<?php
	
	require_once 'clases/Connection.simple2.php';

	$cedula_citotecnologo = $_POST['cedula_citotecnologo'];
	
	$result = $mysqli->query("SELECT rfc, nombre, apellido_pat, apellido_mat, puesto FROM personal WHERE rfc = '$cedula_citotecnologo'");

	$respuesta_cedula_patologo = new stdClass();
	if($result->num_rows > 0){
		$fila = $result->fetch_array();
		$respuesta_cedula_patologo->nombre = $fila['nombre'];
		$respuesta_cedula_patologo->apellido_pat = $fila['apellido_pat'];
		$respuesta_cedula_patologo->apellido_mat = $fila['apellido_mat'];
		$respuesta_cedula_patologo->puesto = $fila['puesto'];
	}
	echo json_encode($respuesta_cedula_patologo);


?>