<?php
	
	require_once 'clases/Connection.simple2.php';

	$rfc_responsable = $_POST['rfc_responsable'];
	
	$result = $mysqli->query("SELECT rfc, nombre, apellido_pat, apellido_mat, puesto FROM personal WHERE rfc = '$rfc_responsable'");

	$respuesta = new stdClass();
	if($result->num_rows > 0){
		$fila = $result->fetch_array();
		$respuesta->nombre = $fila['nombre'];
		$respuesta->apellido_pat = $fila['apellido_pat'];
		$respuesta->apellido_mat = $fila['apellido_mat'];
		$respuesta->puesto = $fila['puesto'];
	}
	echo json_encode($respuesta);

?>