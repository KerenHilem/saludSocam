<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
 	  <h2 class="col-md-12">Administración Nivel Unidad</h2>
      <div class="col-md-10"> <h3>Resultado Citología</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/citologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php

    if(isset($_POST['submit'])){
  	$type = (array) $_POST["seleccion"]; 
     $lista=implode(',', $type); 
     echo $lista;
  
	$query = $mysqli->query("UPDATE citologia SET estatus='ENTREGADO' WHERE id IN ({$lista})");

   if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Enviados.
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
 <form role="form"  method="post">
     
  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
          <th><span class="glyphicon glyphicon-unchecked"></th>
          <th width="20">No</th>
          <th>Unidad</th>
          <th>Nombre</th>
          <th>Citologia</th>
          <th>RFC Responsable de la muestra</th>
          <th>Fecha de toma de muestra</th>
          <th>Estatus</th>
          <th>Creado</th>
          <th width="100">Mostrar Resultado</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $jurisdiccion=$_SESSION['jurisdiccion'];
      $unidad_id=$_SESSION['unidad_id'];

      if($_SESSION['nivel']==1){
      // $query = $mysqli->query("select distinct  * from citologia where estatus='ENVIO DE RESULTADOS A J y U'");
        $query = $mysqli->query("SELECT DISTINCT citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='ENVIO DE RESULTADOS A J y U' AND citologia.paciente_id = pacientes.id");
      }
      else if($_SESSION['nivel']==2){
              $query = $mysqli->query("SELECT DISTINCT citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='ENVIO DE RESULTADOS A J y U' AND citologia.paciente_id = pacientes.id AND unidades.jurisdiccion_id='$jurisdiccion'");
              }
              else if($_SESSION['nivel']==3 || $_SESSION['nivel']==4){
              $query = $mysqli->query("SELECT DISTINCT  citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='ENVIO DE RESULTADOS A J y U' AND citologia.paciente_id = pacientes.id AND citologia.unidad_id='$unidad_id' AND unidades.jurisdiccion_id='$jurisdiccion'");
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
          <td>
            <a href="../resultado/citologia-formato-online.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    </div>
   <!--  <input type="text" name="prueba"> -->

        <button type="submit" class="btn btn-default col-md-3" name="submit">Marcar Como Entregado</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>