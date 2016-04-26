<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
<?php 
  if ($_SESSION['nivel']==1) {
    echo '<h2 class="col-md-12">Administración Nivel Administración</h2>';
  }else if($_SESSION['nivel']==2){
    echo '<h2 class="col-md-12">Administración Nivel Jurisdicción</h2>';
  }elseif ($_SESSION['nivel']==3) {
    echo '<h2 class="col-md-12">Administración Nivel Laboratorio</h2>';
  }else {
    echo '<h2 class="col-md-12">Administración Nivel Unidad</h2>';
  }
  
?>
      <div class="col-md-10"> <h3>Agregar Citología</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/citologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php

    if(isset($_POST['submit'])){
  	 $type = (array) $_POST["seleccion"]; 
     $lista=implode(',', $type); 

    $jurisdiccion=$_SESSION['jurisdiccion'];
    
    $establecerFecha = $mysqli->query("UPDATE  envios_fechas SET unidad_a_jurisdiccion= NOW() WHERE citologia_id IN ({$lista})");

	   $query = $mysqli->query("UPDATE citologia SET estatus='ENVIO DE MUESTRAS A JURISDICCION IMPRESION' WHERE id IN ({$lista})");

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
      <div class="table-responsive col-md-12">
         <table class="table table-hover">
            <thead>
              <tr>
                <th><a id="checkbox_auto_des_completar"><span class="glyphicon glyphicon-unchecked"></a></th>
                <th width="20">No</th>
                <th>Unidad</th>
                <th>Nombre</th>
                <th>Citologia</th>
                <th>RFC Responsable de la muestra</th>
                <th>Fecha de toma de muestra</th>
                <th>Estatus</th>
                <th>Creado</th>
              </tr>
            </thead>
            <tbody>
              <?php
            $no = 1;
            $unidad_id = $_SESSION['unidad_id'];
            $jurisdiccion=$_SESSION['jurisdiccion'];

            if ($_SESSION['nivel']==1) {
               $query = $mysqli->query("SELECT DISTINCT citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='DETECCION' AND citologia.paciente_id = pacientes.id");
            }

              if($_SESSION['nivel']==2){
              $query = $mysqli->query("SELECT DISTINCT citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='DETECCION' AND citologia.paciente_id = pacientes.id AND unidades.jurisdiccion_id='$jurisdiccion'");
              }
              else if($_SESSION['nivel']==3 || $_SESSION['nivel']==4){
              $query = $mysqli->query("SELECT DISTINCT  citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='DETECCION' AND citologia.paciente_id = pacientes.id AND citologia.unidad_id='$unidad_id' AND unidades.jurisdiccion_id='$jurisdiccion'");
              }

            while($row = $query->fetch_assoc()){
            ?>
              <tr>
                <td><input type="checkbox" name="seleccion[]" value="<?php echo $row['id'] ?>"/></td>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['unidades_nombre'] ?></td>
                <td><?php echo $row['apellido_pat']." ".$row['apellido_mat']." ".$row['nombre'] ?></td>
                <td><?php echo $row['citologia'] ?></td>
                <td><?php echo $row['rfc_responsable'] ?></td>
                <td><?php echo $row['fecha_toma_muestra'] ?></td>
                <td><?php echo $row['estatus'] ?></td>
                <td><?php echo $row['creado'] ?></td>
              </tr>
            <?php
            }
            ?>
            </tbody>
          </table>
        </div>
        <button type="submit" class="btn btn-default col-md-3" name="submit">Enviar a Imprimir</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>