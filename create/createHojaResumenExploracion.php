<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Hoja de Resumen</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/hojaResumenCitologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
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
          
      $query = $mysqli->query("insert into hoja_resumen_citologia values('','$unidad_id','$total_muestras','$muestras_rango1','$muestras_rango2','$muestras_inadecuadas','$muestras_fuera_rango', NOW(), NOW())");
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
          <strong>Alerta!</strong> Error.
        </div>
        <?php
      }
    }

      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
    ?>
        <form role="form"  method="post"> 
        <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-12">
            <label for="unidad_id">Unidad:</label>
            <select name="unidad_id" class="form-control" >
              <option value="-1">SELECCIONA UNIDAD</option>';
                <?php foreach ($rowsUnidad as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->
  
    
     <h3>Exploración Clínica</h3>
        <div class="form-group col-md-12">
          <label for="total_muestras">Total de muestras:</label>
          <input type="number" min="0" class="form-control" id="total_muestras" name="total_muestras" placeholder="Ingresa Número">
        </div>

         <div class="form-group col-md-12">
          <label for="muestras_rango1">Muestras Rango 1 de 25 a 39 años:</label>
          <input type="number" min="0" class="form-control" id="muestras_rango1" name="muestras_rango1" placeholder="Ingresa Número">
        </div>

         <div class="form-group col-md-12">
          <label for="muestras_rango2">Muestras Rango 2 de 40 a 69 años:</label>
          <input type="number" min="0" class="form-control" id="muestras_rango2" name="muestras_rango2" placeholder="Ingresa Número">
        </div>

        <div class="form-group col-md-12">
          <label for="muestras_inadecuadas">Fuera de Rango:</label>
          <input type="number" min="0" class="form-control" id="muestras_inadecuadas" name="muestras_inadecuadas" placeholder="Ingresa Número">
        </div>

        <button type="submit" class="btn btn-default" name="submit">Enviar</button>   
    </form>
    </div><!--div dividir formulario  -->
  </div>
</section>
<?php
  include("../footer.php");
?>