<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
 <img src="../plantilla/images/logo.png" alt="" class="col-xs-12 col-md-12 visible-print-block">
<?php 
  if ($_SESSION['nivel']==1) {
    echo '<h2 class="col-md-12 hidden-print">Administración Nivel Administración</h2>';
  }else if($_SESSION['nivel']==2){
    echo '<h2 class="col-md-12 hidden-print">Administración Nivel Jurisdicción</h2>';
  }elseif ($_SESSION['nivel']==3) {
    echo '<h2 class="col-md-12 hidden-print">Administración Nivel Laboratorio</h2>';
  }else {
    echo '<h2 class="col-md-12 hidden-print">Administración Nivel Unidad</h2>';
  }
  
?>

<!-- esto es para cuando le den imprimir salga este titulo -->
<h5 class="col-md-12 col-xs-12 text-right">Fecha de envio:  <span class="glyphicon glyphicon-send">  <u><?php echo date('Y-m-d');?></u></span></h5>


    <h1><a href="" class="btn btn-primary  col-xs-offset-10 col-md-offset-11 col-md-1 col-xs-2 text-right hidden-print" onclick="imprimir()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir</a></h1>

<h4 class="col-md-12 col-xs-12 visible-print-block">Lista de Citologías enviadas a Jurisdicción</h4>


  
</div> <!-- class row -->
    <?php

    if(isset($_POST['submit'])){
     $type = (array) $_POST["seleccion"]; 
     $lista=implode(',', $type); 
     
     $jurisdiccion=$_SESSION['jurisdiccion'];

     $establecerFecha = $mysqli->query("UPDATE  envios_fechas SET unidad_a_jurisdiccion= NOW() WHERE citologia_id IN ({$lista})");

     $query = $mysqli->query("UPDATE citologia SET estatus='ENVIO DE MUESTRAS A JURISDICCION' WHERE id IN ({$lista})");

   if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><a href="citologiaImpresionesAJurisdiccion.php"></a></button>
          <strong>Éxito!</strong> Impresion click aquí.
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

    ?>
    <form role="form"  method="post" name="f1">
      <div class="table-responsive col-md-12 col-sx-12">
         <table class="table table-hover">
            <thead>
              <tr>
                <th><a id="checkbox_auto_des_completar" class="hidden-print"><span class="glyphicon glyphicon-unchecked"></a></th>
                <th width="20">No</th>
                <th>Unidad</th>
                <th>Nombre</th>
                <th>Citologia</th>
                <th>RFC Responsable de la muestra</th>
                <th>Fecha de toma de muestra</th>
              <!--   <th>Estatus</th> -->
                <th>Creada</th>
              </tr>
            </thead>
            <tbody>
              <?php
            $no = 1;
            $unidad_id = $_SESSION['unidad_id'];
            $jurisdiccion=$_SESSION['jurisdiccion'];
            if ($_SESSION['nivel']==1) {
              $query = $mysqli->query("SELECT DISTINCT citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='ENVIO DE MUESTRAS A JURISDICCION IMPRESION' AND citologia.paciente_id = pacientes.id");
            }

              if($_SESSION['nivel']==2){
                $query = $mysqli->query("SELECT DISTINCT citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='ENVIO DE MUESTRAS A JURISDICCION IMPRESION' AND citologia.paciente_id = pacientes.id AND unidades.jurisdiccion_id='$jurisdiccion'");
              }
              else if($_SESSION['nivel']==3 || $_SESSION['nivel']==4){
                $query = $mysqli->query("SELECT DISTINCT  citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='ENVIO DE MUESTRAS A JURISDICCION IMPRESION' AND citologia.paciente_id = pacientes.id AND citologia.unidad_id='$unidad_id' AND unidades.jurisdiccion_id='$jurisdiccion'");
              }


            // $query = $mysqli->query("SELECT DISTINCT  citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.paciente_id = unidades.id WHERE citologia.estatus='DETECCION' AND citologia.paciente_id = pacientes.id");
            while($row = $query->fetch_assoc()){
            ?>
              <tr>
                <td><input type="checkbox" name="seleccion[]" class="hidden-print" value="<?php echo $row['id'] ?>"/></td>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['unidades_nombre'] ?></td>
                <td><?php echo $row['apellido_pat']." ".$row['apellido_mat']." ".$row['nombre'] ?></td>
                <td><?php echo $row['citologia'] ?></td>
                <td><?php echo $row['rfc_responsable'] ?></td>
                <td><?php echo $row['fecha_toma_muestra'] ?></td>
                <!-- <td> --><?php /*echo $row['estatus']*/ ?><!-- </td> -->
                <td><?php echo $row['creado'] ?></td>
              </tr>
            <?php
            }
            ?>
            </tbody>
          </table>
        </div>

          <div class="form-group col-md-4 col-xs-4">              
               <input type="text" class="form-control" id="" name="" placeholder="Nombre del responsable">
          </div>     

          <div class="form-group col-md-4 col-xs-4 hidden-print">
               <button type="submit" class="btn btn-default" name="submit" onclick="return confirm('Asegurarse de haber impreso antes de enviar, Aceptar para enviar')">Enviar a Jurisidicción</button> 
          </div>

          <script>
          function imprimir() {
              window.print();
          }
          </script>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>