<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
  <div class="container">
  <?php
   $id = $_GET['id'];
if(isset($id)){
        $result = $mysqli->query("select * from unidades where id='$id' limit 0,1");
        $data = $result->fetch_assoc();
     
        if (empty($data)) {
            echo '<div class="alert alert-info fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Info!</strong> Array vacio.
                  </div>';
          }
?>
    <div class="row">
      <div class="col-md-10">
        <h1>Actualización de Unidad</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/unidad.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
      if(isset($_POST['submit'])){
        $jurisdiccion_id      = $_POST['jurisdiccion_id'];
        $nombre               = $_POST['nombre'];
        $direccion            = $_POST['direccion'];
        $telefono             = $_POST['telefono'];
        if (empty($telefono)) {
        $telefono = 'NULL';
        }
        $clues                = $_POST['clues'];
        $tipo_establecimiento = $_POST['tipo_establecimiento'];
        $tipologia            = $_POST['tipologia'];
        $tipologia_sinerhias  = $_POST['tipologia_sinerhias'];
                                    
        $query = $mysqli->query("update unidades set jurisdiccion_id = $jurisdiccion_id, nombre = '$nombre', direccion ='$direccion', telefono = $telefono, clues = '$clues', tipo_establecimiento = '$tipo_establecimiento', tipologia = '$tipologia', tipologia_sinerhias = '$tipologia_sinerhias', modificado = NOW() where id='$id'");
        if($query){        
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
          <strong>Alerta!</strong> Error.
        </div>
        <?php
      }
    }
$rowsJurisdiccion = $mysqli->query("SELECT id, nombre FROM jurisdicciones");
$rowsMunicipio = $mysqli->query("SELECT id, nombre FROM municipios");
$rowsLocalidad = $mysqli->query("SELECT id, nombre FROM localidades ORDER by nombre");
$rowsTipoDeEstablecimiento = $mysqli->query("SELECT DISTINCT tipo_establecimiento FROM unidades ORDER by tipo_establecimiento");
$rowsTipologia = $mysqli->query("SELECT DISTINCT tipologia FROM unidades");
$rowsTipologiaSinerhias = $mysqli->query("SELECT DISTINCT tipologia_sinerhias FROM unidades ORDER by tipologia_sinerhias");

    ?>
    <br/>
    <form method="post">
      
        <div class="form-group col-md-12">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre'] ?>">
        </div>

        <div class="form-group col-md-12">
          <label for="direccion">Dirección:</label>
          <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $data['direccion'] ?>">
        </div>

        <div class="form-group col-md-12">
          <label for="telefono">Telefono:</label>
          <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $data['telefono'] ?>">
        </div>

        <div class="form-group col-md-6">
          <label for="clues">Clues:</label>
          <input type="text" class="form-control" id="clues" name="clues" value="<?php echo $data['clues'] ?>">
        </div>

       <!-- COMINEZA SELECT PARA TIPOLOGI LOCALIDAD -->
        <div class="form-group col-md-6">
            <label for="id_localidad">Localidad:</label>
            <select name="id_localidad" class="form-control" >
                <?php foreach ($rowsLocalidad as $key) {
                   if ($key['id']==$data['id_localidad']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
        <!-- FIN DEL SELECT PARA TIPOLOGI LOCALIDAD -->

        <!-- COMINEZA SELECT PARA JURISDICCIONES -->
        <div class="form-group col-md-3">
            <label for="jurisdiccion_id">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
              <option value="-1">SELECCIONA JURISDICCIÓN</option>';
                <?php foreach ($rowsJurisdiccion as $key) {
                   if ($key['id']==$data['jurisdiccion_id']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>

      <!-- FIN DEL SELECT PARA JURISDICCIONES -->

      <!-- COMINEZA SELECT PARA TIPO ESTABLECIMIENTO -->
        <div class="form-group col-md-3">
            <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
            <select name="tipo_establecimiento" class="form-control" >
                <?php foreach ($rowsTipoDeEstablecimiento as $key) {
                   if ($key['tipo_establecimiento']==$data['tipo_establecimiento']) {
                  echo '<option value="'.$key['tipo_establecimiento'].'" selected>'.$key['tipo_establecimiento'].'</option>';
                   }
                    else 
                  echo '<option value="'.$key['tipo_establecimiento'].'">'.$key['tipo_establecimiento'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPO ESTABLECIMIENTO -->
      
      <!-- COMINEZA SELECT PARA TIPOLOGIA -->
        <div class="form-group col-md-3">
            <label for="tipologia">Tipología:</label>
            <select name="tipologia" class="form-control" >
                <?php foreach ($rowsTipologia as $key) {
                  if ($key['tiplogia']==$data['tipologia']) {
                      echo '<option value="'.$key['tipologia'].'" selected>'.$key['tipologia'].'</option>';
                    }else
                      echo '<option value="'.$key['tipologia'].'">'.$key['tipologia'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPOLOGIA -->

      <!-- COMINEZA SELECT PARA TIPOLOGI SINERHIAS -->
        <div class="form-group col-md-3">
            <label for="tipologia_sinerhias">Tipología Sinerhias:</label>
            <select name="tipologia_sinerhias" class="form-control" >
                <?php foreach ($rowsTipologiaSinerhias as $key) {
                   if ($key['tipologia_sinerhias']==$data['tipologia_sinerhias']) {
                      echo '<option value="'.$key['tipologia_sinerhias'].'" selected>'.$key['tipologia_sinerhias'].'</option>';
                    }else
                    echo '<option value="'.$key['tipologia_sinerhias'].'">'.$key['tipologia_sinerhias'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPOLOGI SINERHIAS -->
        
        <button type="submit" class="btn btn-default" name="submit">Actualizar</button>
    </form>
<?php
} else{
  echo "<script>location.href='../index/unidad.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>