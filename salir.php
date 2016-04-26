<?php
session_start();
session_destroy();
header('Location: index.php');
?>
<!--
<html>
<head>
 <meta charset="utf-8" />
<title>Contenido no seguro</title>
</head>
<body>
Ahora estás fuera de la aplicación segura.
<br>
<br>
<a href="login.php">Autenticar usuario</a>
</body>
</html>
-->