<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Perfil</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/perfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $nombre   = $_POST['nombre'];
      $query = $mysqli->query("insert into perfiles values('','$nombre',NOW(),NOW())");
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
          <strong>Alerta!</strong> Error!
        </div>
        <?php
      }
    }
    ?>

    <form role="form"  method="post">
      
        <div class="form-group col-md-12">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. miguel">
        </div>
                      
        <button type="submit" class="btn btn-default" name="submit">Enviar</button>
    </form>
  
  </div>
</section>

<?php
  include("../footer.php");
?>