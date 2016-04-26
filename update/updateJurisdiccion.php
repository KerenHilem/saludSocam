<?php
  require_once '../clases/Connection.simple.php';
  include("../head.php");
  include("../nav.php");
?>

<section>
<div class="container">
  <div class="row">
      <div class="col-md-10">
        <h1>Actualización de Datos</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="jurisdiccion.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>

  <?php

   $id = $_GET['id'];

if(isset($id)){
        $conn = dbConnect();
        $sql = "select * from jurisdicciones where id='$id' limit 0,1";
        $stmt = $conn->query($sql);
        $data = $stmt->fetch();
     
        if (empty($data)) {
            echo '<div class="alert alert-info fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Info!</strong> Array vacio.
                  </div>';
          }
?>
    
    <?php
    if(isset($_POST['submit'])){
      $nombre         = $_POST['nombre'];
      $ciudades       = $_POST['ciudades'];
      $clave          = $_POST['clave'];
      $clues          = $_POST['clues'];

      $sql = "update jurisdicciones set nombre ='$nombre', ciudades ='$ciudades', clave ='$clave', clues ='$clues' , modificado = NOW() where id='$id'";
      $stmt = $conn->query($sql);
      if($stmt){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Actualizados.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Alerta!</strong> Faltan Datos.
        </div>
        <?php
      }
    }
    ?>
    <br/>
    <form method="post">

        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control text-uppercase" id="nombre" name="nombre" value="<?php echo $data['nombre'] ?>">
        </div>

         <div class="form-group">
          <label for="ciudades">Ciudades:</label>
          <input type="text" class="form-control text-uppercase" id="ciudades" name="ciudades" value="<?php echo $data['ciudades'] ?>">
        </div>

         <div class="form-group">
          <label for="clave">Clave:</label>
          <input type="text" class="form-control" id="clave" name="clave" value="<?php echo $data['clave'] ?>">
        </div>

        <div class="form-group">
          <label for="clues">Clues:</label>
          <input type="text" class="form-control text-uppercase" id="clues" name="clues" value="<?php echo $data['clues'] ?>">
        </div>
                
        <button type="submit" class="btn btn-default" name="submit">Actualizar</button>
    </form>
<?php
} else{
  echo "<script>location.href='jurisdicciones.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>