<?php 
session_start();
	
	require_once 'clases/Connection.simple2.php';

	$username=$_POST['usuario'];
	$pass=$_POST['contrasena'];

	$query = $mysqli->query("SELECT * FROM usuarios WHERE correo='$username'");
	foreach ($query as $key) {
		if($key['contrasena']==$pass){
			$_SESSION["autenticado"]= "SI";
			$_SESSION['jurisdiccion']=$key['jurisdiccion_id'];
			$_SESSION['nivel']=$key['perfil_id'];
			$_SESSION['unidad_id']=$key['unidad_id'];
			header ("Location: index/home.php");
		}else {
				header("Location: index.php?errorusuario=si");
				}
	}

?>