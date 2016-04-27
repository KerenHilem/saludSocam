<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Resumen de VPHs</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createVphCompleto.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nuevo VPH</a></h1>
      </div>

  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
        <th width="100">Mostrar Proceso</th>
          <th width="20">No</th>
          <th>Id</th>
          <th>Unidad</th>
          <th>Paciente</th>
          <th>Citología</th>
          <th>RFC del responsable</th>
          <th>Fecha de toma de la muestra</th>
          <th>Fecha de interpretacion</th>
          <th>Número Citologico</th>
          <th>Laboratorio</th>
          <th>Cédula del citotecnólogo</th>
          <th>Cédula patologo</th>
          <th>Estatus</th>
          <th>Creada</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $query = $mysqli->query("select distinct  * from citologia ORDER BY estatus");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td>
            <a href="../resultado/verResultadoCitologia.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
          </td>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['unidad_id'] ?></td>
          <td><?php echo $row['paciente_id'] ?></td>
          <td><?php echo $row['citologia'] ?></td>
          <td><?php echo $row['rfc_responsable'] ?></td>
          <td><?php echo $row['fecha_toma_muestra'] ?></td>
          <td><?php echo $row['fecha_interpretacion'] ?></td>
          <td><?php echo $row['numero_citologico'] ?></td>
          <td><?php echo $row['laboratorio'] ?></td>
          <td><?php echo $row['cedula_citotecnologo'] ?></td>
          <td><?php echo $row['cedula_patologo'] ?></td>
          <td><?php echo $row['estatus'] ?></td>
          <td><?php echo $row['creado'] ?></td>
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