<?php
//$mysqli = new mysqli('sql300.byethost15.com','b15_17207641','6wp5y3kr','b15_17207641_socamv2');
$mysqli = new mysqli('localhost','root','','salud');
if($mysqli->connect_errno){
  echo "Error de Conexion ".$mysqli->connect_error;
	}
 $mysqli->query("SET NAMES 'utf8'");

 ?>