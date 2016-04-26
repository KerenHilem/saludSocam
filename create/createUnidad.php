<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Unidad</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/unidad.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php

    if(isset($_POST['submit'])){
      $clues                = $_POST['clues'];
      $jurisdiccion_id      = $_POST['jurisdiccion_id'];
      $nombre               = $_POST['nombre'];
      $direccion            = $_POST['direccion'];
      $telefono             = $_POST['telefono'];
      $id_localidad         = $_POST['id_localidad'];
      $tipo_establecimiento = $_POST['tipo_establecimiento'];
      $tipologia            = $_POST['tipologia'];
      $tipologia_sinerhias  = $_POST['tipologia_sinerhias'];
      
      $query = $mysqli->query("insert into unidades values('','$clues',$jurisdiccion_id, '$nombre','$direccion','$telefono', '$id_localidad','$tipo_establecimiento','$tipologia','$tipologia_sinerhias',NOW(),NOW())");
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
          <strong>Alerta!</strong>.
        </div>
        <?php
      }
    }
$rowsJurisdiccion = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by id");
$rowsMunicipio = $mysqli->query("SELECT id, nombre FROM municipios");
$rowsLocalidad = $mysqli->query("SELECT id, nombre FROM localidades ORDER by nombre");
$rowsTipoDeEstablecimiento = $mysqli->query("SELECT DISTINCT tipo_establecimiento FROM unidades ORDER by tipo_establecimiento");
$rowsTipologia = $mysqli->query("SELECT DISTINCT tipologia FROM unidades");
$rowsTipologiaSinerhias = $mysqli->query("SELECT DISTINCT tipologia_sinerhias FROM unidades ORDER by tipologia_sinerhias");
   ?>

    <form role="form"  method="post">

        <div class="form-group col-md-6">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="UNIDAD MÓVIL NO. 2" onKeyUp="this.value=this.value.toUpperCase();" required>
        </div>

        <div class="form-group col-md-6">
          <label for="clues">Clues:</label>
          <input type="text" class="form-control" id="clues" name="clues" placeholder="BCSSA018326" onKeyUp="this.value=this.value.toUpperCase();" required>
        </div>

        <div class="form-group col-md-6">
          <label for="direccion">Dirección:</label>
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calzada Independencia" onKeyUp="this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group col-md-6">
          <label for="telefono">Telefono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="6862287520">
        </div>

      

        <!-- COMINEZA SELECT PARA TIPOLOGI LOCALIDAD -->
        <div class="form-group col-md-6">
            <label for="id_localidad">Localidad:</label>
            <select name="id_localidad" class="form-control" >
                <?php foreach ($rowsLocalidad as $key) {
                  if ($key['id']==0) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else{
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                  }
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPOLOGI LOCALIDAD -->

        <!-- COMINEZA SELECT PARA JURISDICCION -->
        <div class="form-group col-md-6">
            <label for="jurisdiccion_id">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
                <?php foreach ($rowsJurisdiccion as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            
            </select>
        </div>
      <!-- FIN DEL SELECT PARA JURISDICCION -->
        
      <!-- COMINEZA SELECT PARA TIPO ESTABLECIMIENTO -->
        <div class="form-group col-md-4">
            <label for="tipo_establecimiento">Tipo de Establecimiento:</label>
            <select name="tipo_establecimiento" class="form-control" >
                <?php foreach ($rowsTipoDeEstablecimiento as $key) {
                  echo '<option value="'.$key['tipo_establecimiento'].'">'.$key['tipo_establecimiento'].'</option>';
                }?>
                <option value="" selected>NINGUNA</option>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPO ESTABLECIMIENTO -->

      <!-- COMINEZA SELECT PARA TIPOLOGIA -->
        <div class="form-group col-md-4">
            <label for="tipologia">Tipología:</label>
            <select name="tipologia" class="form-control" >
                <?php foreach ($rowsTipologia as $key) {
                  echo '<option value="'.$key['tipologia'].'">'.$key['tipologia'].'</option>';
                }?>
                <option value="" selected>NINGUNA</option>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPOLOGIA -->

      <!-- COMINEZA SELECT PARA TIPOLOGI SINERHIAS -->
        <div class="form-group col-md-4">
            <label for="tipologia_sinerhias">Tipología Sinerhias:</label>
            <select name="tipologia_sinerhias" class="form-control" >
                <?php foreach ($rowsTipologiaSinerhias as $key) {
                  echo '<option value="'.$key['tipologia_sinerhias'].'">'.$key['tipologia_sinerhias'].'</option>';
                }?>
              <option value="" selected>NINGUNA</option>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA TIPOLOGI SINERHIAS -->

        <button type="submit" class="btn btn-default col-md-3" name="submit">Guardar</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>