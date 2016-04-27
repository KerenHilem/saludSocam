<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Laboratorio</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/laboratorio.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php

    if(isset($_POST['submit'])){
      
      $nombre               = $_POST['nombre'];
      $jurisdiccion_id      = $_POST['jurisdiccion_id'];
      $direccion            = $_POST['direccion'];
      $telefono             = $_POST['telefono'];
      $estatus              = $_POST['estatus'];
           
      $query = $mysqli->query("INSERT INTO laboratorios VALUES('',' $nombre', '$jurisdiccion_id', '$telefono', '$direccion', '$estatus', NOW(), NOW())");
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
$rowsJurisdiccion = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
// $rowsMunicipio = $mysqli->query("SELECT id, nombre FROM municipios");
// $rowsLocalidad = $mysqli->query("SELECT id, nombre FROM localidades ORDER by nombre");
// $rowsTipoDeEstablecimiento = $mysqli->query("SELECT DISTINCT tipo_establecimiento FROM unidades ORDER by tipo_establecimiento");
// $rowsTipologia = $mysqli->query("SELECT DISTINCT tipologia FROM unidades");
// $rowsTipologiaSinerhias = $mysqli->query("SELECT DISTINCT tipologia_sinerhias FROM unidades ORDER by tipologia_sinerhias");
   ?>

    <form role="form"  method="post">

        <div class="form-group col-md-12">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. UNIDAD MÓVIL NO. 2">
        </div>

        <div class="form-group col-md-12">
          <label for="direccion">Dirección:</label>
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej. Calzada Independencia">
        </div>

        <div class="form-group col-md-12">
          <label for="telefono">Telefono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ej. 6862287520">
        </div>

        <div class="form-group col-md-6">
          <label for="estatus">Estatus:</label>
          <select name="estatus" id="estatus" class="form-control">
            <option value="ACTIVO">ACTIVO</option>
            <option value="INACTIVO">INACTIVO</option>
          </select>
        </div>

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

        <button type="submit" class="btn btn-default col-md-3" name="submit">Capturar</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>