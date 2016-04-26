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
    $result = $mysqli->query("select * from hojas_resumen where id='$id' limit 0,1");
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
        <h1>Actualización de Datos</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/hojaResumen.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $unidad_id              = $_POST['unidad_id'];
      $total_muestras         = $_POST['total_muestras'];
      $muestras_rango1        = $_POST['muestras_rango1'];
      $muestras_rango2        = $_POST['muestras_rango2'];
      $muestras_inadecuadas   = $_POST['muestras_inadecuadas'];
      $muestras_fuera_rango   = $_POST['muestras_fuera_rango'];
      
        $query = $mysqli->query("update hojas_resumen set unidad_id='$unidad_id', total_muestras='$total_muestras', muestras_rango1='$muestras_rango1', muestras_rango2='$muestras_rango2' , muestras_inadecuadas = $muestras_inadecuadas,muestras_fuera_rango='$muestras_fuera_rango', modificado = NOW() where id='$id'");
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
          <strong>Alerta!</strong> Faltan Datos.
        </div>
        <?php
      }
    }
$rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades");
    ?>
    <br/>
    <form method="post">

     <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-12">
            <label for="unidad_id">Unidad:</label>
            <select name="unidad_id" class="form-control" >
              <?php foreach ($rowsUnidad as $key) {
                 if ($key['id']==$data['unidad_id']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

        <div class="form-group col-md-12">
          <label for="total_muestras">Total de muestras:</label>
          <input type="number" class="form-control" id="total_muestras" name="total_muestras" value="<?php echo $data['total_muestras'] ?>">
        </div>

         <div class="form-group col-md-12">
          <label for="muestras_rango1">Muestras Rango 1:</label>
          <input type="number" class="form-control" id="muestras_rango1" name="muestras_rango1" value="<?php echo $data['muestras_rango1'] ?>">
        </div>

         <div class="form-group col-md-12">
          <label for="muestras_rango2">Muestras Rango 2:</label>
          <input type="number" class="form-control" id="muestras_rango2" name="muestras_rango2" value="<?php echo $data['muestras_rango2'] ?>">
        </div>

        <div class="form-group col-md-12">
          <label for="muestras_inadecuadas">Muestras Inadecuadas:</label>
          <input type="number" class="form-control" id="muestras_inadecuadas" name="muestras_inadecuadas" value="<?php echo $data['muestras_inadecuadas'] ?>">
        </div>
        
        <div class="form-group col-md-12">
          <label for="muestras_fuera_rango">Muestras Fuera Rango:</label>
          <input type="text" class="form-control" id="muestras_fuera_rango" name="muestras_fuera_rango" value="<?php echo $data['muestras_fuera_rango'] ?>">
        </div>
        
        <button type="submit" class="btn btn-default" name="submit">Actualizar</button>
    </form>
<?php
} else{
  echo "<script>location.href='Doctor.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>