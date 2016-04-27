<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Citologia</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createCitologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nueva Citología</a></h1>
      </div>

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
      if($_SESSION['nivel']==1){
      $query = $mysqli->query("select distinct  * from citologia where estatus='ENTREGADO'");
      }
      else if($_SESSION['nivel']==4){
      $query = $mysqli->query("SELECT DISTINCT  citologia.id, unidades.nombre AS unidades_nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.citologia, citologia.rfc_responsable, citologia.fecha_toma_muestra, citologia.estatus, citologia.creado FROM jurisdicciones,pacientes, citologia INNER JOIN unidades ON citologia.unidad_id = unidades.id WHERE citologia.estatus='ENTREGADO' AND citologia.paciente_id = pacientes.id AND citologia.unidad_id='$unidad_id' AND unidades.jurisdiccion_id='$jurisdiccion''");
      }
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
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
  </div>
</section>
<?php
  include("../footer.php");
?>