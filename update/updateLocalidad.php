<?php
  require_once '../clases/Connection.simple.php';
  include("../head.php");
  include("../nav.php");
?>

  
<section>
  <div class="container">
  <?php

   $id = $_GET['id'];

if(isset($id)){
 
      $conn = dbConnect();
      $sql = "select * from localidades where id='$id' limit 0,1";
      $stmt = $conn->query($sql);
      $data = $stmt->fetch();
   
      if (empty($data)) {
          echo '<div class="alert alert-info fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong> Tabla sin datos.
                </div>';
        }
     
?>
    <div class="row">
      <div class="col-md-10"> <h3>Actualización de Localidades</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="localidad.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $nombre           = $_POST['nombre'];
      $municipio_id     = $_POST['municipio_id'];
      $clave            = $_POST['clave'];
    
      $sql = "update localidades set nombre ='$nombre', municipio_id ='$municipio_id', clave ='$clave',modificado = NOW() where id='$id'";
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

  // para cargar los nombres y asignar los IDS de las jurisdicciones
  $sql = 'SELECT id, nombre FROM municipios';
  // we have to tell the PDO that we are going to send values to the query
  $stmt = $conn->query($sql);
  // Extract the values from $stmt
  $rows = $stmt->fetchAll();
  if (empty($rows)) {
    
    echo "No se encontraron resultados !!";
  }
    
    ?>
    <br/>
    <form method="post" name="formulario">

        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre'] ?>">
        </div>

        <div class="form-group">
            <label for="id_municipio">Jurisdicción:</label>
            <select name="id_municipio" class="form-control" >
                <?php foreach ($rows as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
        <div class="form-group" name="modificar">
            <input type="number" class="form-control" id="municipio_id" name="municipio_id" readonly value="<?php echo $data['municipio_id'] ?>">
        </div>

        <div class="form-group">
          <label for="clave">Clave de Municipio:</label>                                   
          <input type="text" class="form-control" id="clave" name="clave" value="<?php echo $data['clave'] ?>">
        </div>

                
        <button type="submit" class="btn btn-default" name="submit">Actualizar</button>
    </form>
<?php
} else{
  echo "<script>location.href='localidad.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>