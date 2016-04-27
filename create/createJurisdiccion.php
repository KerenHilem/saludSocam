<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
  <div class="row">
      <div class="col-md-10"> <h3>Agregar Jurisdicción</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="jurisdiccion.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
  </div>
    
    <?php     
    if(isset($_POST['submit'])){
     
      $nombre         = $_POST['nombre'];
      $ciudades       = $_POST['ciudades'];
      $clave          = $_POST['clave'];
      $clues          = $_POST['clues'];
     
      $query = $mysqli->query("insert into jurisdicciones values('','$nombre','$ciudades', $clave,'$clues',NOW(),NOW())");
          
      if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Añadidos.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Falta Algún Dato.
        </div>
        <?php
      }
    }
    ?>

    <form role="form"  method="post">
      
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" placeholder="Ej. HOSPITAL GENERAL DE MEXICALI" required>
        </div>

        <div class="form-group">
          <label for="clues">Clues:</label>
          <input type="text" class="form-control text-uppercase" id="clues" name="clues" placeholder="Ej. BCSSA000440" required>
        </div>

         <div class="form-group">
          <label for="ciudades">Ciudades:</label>
          <input type="text" class="form-control text-uppercase" id="ciudades" name="ciudades" placeholder="Ej. Mexicali" required>
        </div>

         <div class="form-group">
          <label for="clave">Clave de Jurisdicción:</label>
          <input type="number" class="form-control" id="clave" name="clave" placeholder="Ej. 01" required>
        </div>

        <button type="submit" class="btn btn-default" name="submit">Enviar</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>