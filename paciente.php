<?php
	
	require_once 'clases/Connection.simple2.php';
	
	$paciente_id = $_POST['paciente_id'];

	$result = $mysqli->query("SELECT pacientes.cicam_clave, pacientes.nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.entidad_nacimiento, pacientes.municipio_nacimiento, pacientes.edad, pacientes.fecha_nacimiento, pacientes.curp, pacientes.calle, pacientes.numero, pacientes.colonia, pacientes.telefono, pacientes.otro_telefono, pacientes.correo, localidades.nombre AS localidades_nombre , municipios.nombre AS municipios_nombre, delegacion, pacientes.cp, pacientes.entidad_federativa, jurisdicciones.nombre AS jurisdicciones_nombre, pacientes.tiempo_residencia, pacientes.estado_civil, pacientes.escolaridad, pacientes.ocupacion, pacientes.afiliacion, pacientes.afiliacion_otro, pacientes.num_poliza FROM pacientes,municipios, localidades, jurisdicciones WHERE pacientes.id='$paciente_id' AND pacientes.localidad=localidades.id AND municipios.id=pacientes.municipio_id AND jurisdicciones.id=pacientes.jurisdiccion_id");
// $result = $mysqli->query("SELECT cicam_clave, nombre, apellido_pat, apellido_mat, entidad_nacimiento, municipio_nacimiento, edad, fecha_nacimiento, curp, calle, numero, colonia, telefono, otro_telefono, correo, localidad, municipio_id, delegacion, cp, entidad_federativa, jurisdiccion_id, tiempo_residencia, estado_civil, escolaridad, ocupacion, afiliacion, afiliacion_otro, num_poliza FROM pacientes WHERE id=$paciente_id");
	$respuesta = new stdClass();
	if($result->num_rows > 0){
		$fila = $result->fetch_array();
		$respuesta->cicam_clave 	= $fila['cicam_clave'];
		$respuesta->nombre 	= $fila['nombre'];
		$respuesta->apellido_pat = $fila['apellido_pat'];
		$respuesta->apellido_mat = $fila['apellido_mat'];	
		$respuesta->entidad_nacimiento = $fila['entidad_nacimiento'];
		$respuesta->municipio_nacimiento = $fila['municipio_nacimiento'];
		$respuesta->edad = $fila['edad'];	
		$respuesta->fecha_nacimiento = $fila['fecha_nacimiento'];
		$respuesta->curp = $fila['curp'];
		$respuesta->calle = $fila['calle'];
		$respuesta->numero = $fila['numero'];
		$respuesta->colonia = $fila['colonia'];
		$respuesta->telefono = $fila['telefono'];
		$respuesta->otro_telefono = $fila['otro_telefono'];
		$respuesta->correo = $fila['correo'];
		$respuesta->localidades_nombre = $fila['localidades_nombre'];
		$respuesta->municipios_nombre = $fila['municipios_nombre'];
		$respuesta->delegacion = $fila['delegacion'];
		$respuesta->cp = $fila['cp'];
		$respuesta->entidad_federativa = $fila['entidad_federativa'];
		$respuesta->jurisdicciones_nombre = $fila['jurisdicciones_nombre'];
		$respuesta->tiempo_residencia = $fila['tiempo_residencia'];
		$respuesta->estado_civil = $fila['estado_civil'];
		$respuesta->escolaridad = $fila['escolaridad'];
		$respuesta->ocupacion = $fila['ocupacion'];
		$respuesta->afiliacion = $fila['afiliacion'];
		$respuesta->afiliacion_otro = $fila['afiliacion_otro'];
		$respuesta->num_poliza = $fila['num_poliza'];
		
	}
	echo json_encode($respuesta);

?>