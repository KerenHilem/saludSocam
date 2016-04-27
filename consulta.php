<?php
  require_once 'clases/Connection.simple.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">

<div class="menuBotones">
 	<button type="button" class="btn btn-default btn-lg">
   		<a href="jurisdiccion.php">Jurisdiccion</a>
 	</button>
  
	<button type="button" class="btn btn-default btn-lg">
    	<a href="municipio.php">Municipio</a>
  	</button>

  	<button type="button" class="btn btn-default btn-lg">
    <a href="localidad.php">Localidad</a>
  	</button>

    <button type="button" class="btn btn-default btn-lg">
   	 	<a href="unidad.php">Unidad</a>
 	</button>

  	<button type="button" class="btn btn-default btn-lg">
    	<a href="hojaResumen.php">Hoja de Resumen</a>
  	</button>

  	<button type="button" class="btn btn-default btn-lg">
    	<a href="doctor.php">Doctor</a>
  	</button>

  	<button type="button" class="btn btn-default btn-lg">
    	<a href="usuario.php">Usuarios</a>
  	</button>

  	<button type="button" class="btn btn-default btn-lg">
    	<a href="perfil.php">Perfiles</a>
  	</button>
</div>

 
</div>
</section>
<?php
  include("../footer.php");
?>