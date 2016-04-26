<html>
<head>
 <meta charset="utf-8" />
<title>Autenticación PHP</title>
  <link href="plantilla/css/lavish-bootstrap.css" rel="stylesheet">
 <link href="plantilla/css/multi.css" rel="stylesheet">
</head>
<body>
<div class="container col-xs-12">
  <div class="page-header">
	<h1>Formulario de autenticación</h1>
  </div>
<?php 
	if (isset($_GET["errorusuario"]) && $_GET["errorusuario"]=="si"){

			  echo 	'<div class="alert alert-danger col-xs-offset-4 col-md-offset-4 col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">
				   		<strong>Alerta!</strong> <h2>Introduce tu nombre de usuario y contraseña.</h2>
				 		</div>';

		}else{
				echo '<h3 class="col-md-offset-3 col-xs-offset-3 col-md-6 col-xs-6 col-md-offset-3 col-xs-offset-3">Introduce tu nombre de usuario y contraseña</h3>';
			}
?>

	<form class="form" 	action="autenticacion.php" method="POST" class="form-group">
		<div class="form-group col-xs-offset-3 col-md-offset-3 col-md-6 col-xs-6 col-md-offset-3 col-xs-offset-3">
			<h2 for="usuario">Nombre de usuario:</h2>
			<input type="text" name="usuario" id="usuario" class="form-control" value="@gmail.com"required>
		</div>
		<div class="form-group col-xs-offset-3 col-md-offset-3 col-md-6 col-xs-6 col-md-offset-3 col-xs-offset-3">
			<h2 for="login">Contraseña:</h2>
			<input type="password" name="contrasena" id="login"  class="form-control"  value="123"required>
		</div>
		<div class="form-group col-xs-offset-3 col-md-offset-3 col-md-6 col-xs-6 col-md-offset-3 col-xs-offset-3">
		<input type="submit" class="btn btn-default "  value="Inicio de sesión" >
	</div>
	</form>
	
</div>
</body>
</html>

