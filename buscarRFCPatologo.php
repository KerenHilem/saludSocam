<?php
session_start();
require_once 'clases/Connection.simple2.php';

$cedula_patologo = $_GET['term']; 
$unidad_id= $_SESSION['unidad_id'];

// $result = $mysqli->query("SELECT rfc FROM personal WHERE rfc LIKE '%$rfc_responsable%'");
if($_SESSION['nivel']==4){
 $result = $mysqli->query("SELECT DISTINCT rfc FROM personal, unidades WHERE rfc LIKE '%$cedula_patologo%' AND personal.clues_unidad=(SELECT unidades.clues FROM unidades WHERE unidades.id='$unidad_id')");
}else $result = $mysqli->query("SELECT rfc FROM personal WHERE rfc LIKE '%$cedula_patologo%'");


if($result->num_rows > 0){
	while($fila = $result->fetch_array()){
		$rfcs[] = $fila['rfc'];		
	}
	echo json_encode($rfcs);
}


?>