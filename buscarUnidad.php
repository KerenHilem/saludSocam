<?php

require_once 'clases/Connection.simple2.php';

$nombre_unidad = $_GET['term'];
$result = $mysqli->query("select clues FROM unidades WHERE nombre LIKE '%$nombre_unidad%'");

// $result = $conexion->query($consulta);

if($result->num_rows > 0){
	while($fila = $result->fetch_array()){
		$nombre_unidad[] = $fila['clues'];		
	}
	echo json_encode($nombre_unidad);
}

?>