<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
  //date_default_timezone_set('America/Los_Angeles');
  date_default_timezone_set('America/Argentina/Buenos_Aires');  
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Hoja de Resumen de Citología</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/hojaResumenCitologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php

    if(isset($_POST['submit'])){

      $unidad_id                        = $_POST['unidad_id'];
      
      $total_muestras_citologia         = $_POST['total_muestras_citologia'];
      $muestras_rango1_citologia        = $_POST['muestras_rango1_citologia'];
      $muestras_rango2_citologia        = $_POST['muestras_rango2_citologia'];
      $muestras_inadecuadas_citologia   = $_POST['muestras_inadecuadas_citologia'];
      $muestras_fuera_rango_citologia   = $_POST['muestras_fuera_rango_citologia'];
          
          
    $query = $mysqli->query("insert into hoja_resumen_citologia values('','$unidad_id','$total_muestras_citologia','$muestras_rango1_citologia','$muestras_rango2_citologia','$muestras_inadecuadas_citologia','$muestras_fuera_rango_citologia','NO',NOW(), NOW())");
   if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Añadidos en Citología.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Error al intentar añadir datos en Citología.
        </div>
        <?php
      }

    }
   
   $jurisdiccion=$_SESSION['jurisdiccion'];
   
       if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }
      else if($_SESSION['nivel']==2 || $_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
      }
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
  

    <div class="col-md-6">
     <h3>Citología Cervical</h3>
        <div class="form-group col-md-12">
          <label for="total_muestras_citologia">Total de muestras:</label>
          <input type="number" min="0" class="form-control" id="total_muestras_citologia" name="total_muestras_citologia" placeholder="Ingresa Número">
        </div>

         <div class="form-group col-md-12">
          <label for="muestras_rango1_citologia">Muestras Rango 1 de 25 a 34 años:</label>
          <input type="number" min="0" class="form-control" id="muestras_rango1_citologia" name="muestras_rango1_citologia" placeholder="Ingresa Número">
        </div>

         <div class="form-group col-md-12">
          <label for="muestras_rango2_citologia">Muestras Rango 2 de 35 a 64 años:</label>
          <input type="number" min="0" class="form-control" id="muestras_rango2_citologia" name="muestras_rango2_citologia" placeholder="Ingresa Número">
        </div>

        <div class="form-group col-md-12">
          <label for="muestras_inadecuadas_citologia">Fuera de Rango:</label>
          <input type="number" min="0" class="form-control" id="muestras_inadecuadas_citologia" name="muestras_inadecuadas_citologia" placeholder="Ingresa Número" value="0">
        </div>
        
        <div class="form-group col-md-12">
          <label for="muestras_fuera_rango_citologia">Lamina Inadecuada para envío al laboratorio:</label>
          <input type="number" min="0" class="form-control" id="muestras_fuera_rango_citologia" name="muestras_fuera_rango_citologia" placeholder="Ingresa Número" value="0">
        </div>
      </div> <!-- hoja de resumen citologia -->
                
    <button type="submit" class="btn btn-default col-md-3 col-md-offset-4" name="submit">Capturar</button>
        
  </form>
  
     
</section>
<?php
  include("../footer.php");
?>