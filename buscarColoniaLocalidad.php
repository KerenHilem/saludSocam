<?php
session_start();
require_once 'clases/Connection.simple2.php';

$localidad = $_GET['term']; 
$unidad_id= $_SESSION['unidad_id'];

$result = $mysqli->query("SELECT nombre FROM localidades_pacientes WHERE nombre LIKE '%$localidad%'");


if($result->num_rows > 0){
	while($fila = $result->fetch_array()){
		$nombreArray[] = $fila['nombre'];		
	}
	echo json_encode($nombreArray);
}

?>