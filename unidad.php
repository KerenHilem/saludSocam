<?php

	require_once 'clases/Connection.simple2.php';

	$unidad_id = $_POST['unidad_id'];
	
	$result = $mysqli->query("SELECT unidades.clues, municipios.nombre AS municipios_nombre, jurisdicciones.nombre AS jurisdicciones_nombre FROM unidades, jurisdicciones, municipios WHERE unidades.id='$unidad_id' AND jurisdicciones.id=unidades.jurisdiccion_id AND jurisdicciones.municipio_id=municipios.id");

	$respuesta = new stdClass();
	if($result->num_rows > 0){
		$fila = $result->fetch_array();
		$respuesta->clues 	= $fila['clues'];
		$respuesta->municipios_nombre = $fila['municipios_nombre'];
		$respuesta->jurisdicciones_nombre = $fila['jurisdicciones_nombre'];		
	}
	echo json_encode($respuesta);

?>