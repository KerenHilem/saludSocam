<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Laboratorios</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createLaboratorio.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nuevo Laboratorio</a></h1>
      </div>

  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
        <th width="100">Action</th>
          <th width="20">No</th>
          <th>Id</th>
          <th>Nombre</th>
          <th>Jurisdicción</th>
          <th>Teléfono</th>
          <th>Dirección</th>
          <th>Estatus</th>
          <th>Creado</th>
          <th>Modificado</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $query = $mysqli->query("SELECT DISTINCT laboratorios.id, laboratorios.nombre, jurisdicciones.nombre AS jurisdicciones_nombre, laboratorios.telefono, laboratorios.direccion, laboratorios.estatus, laboratorios.creado, laboratorios.modificado FROM laboratorios, jurisdicciones WHERE laboratorios.jurisdiccion_id=jurisdicciones.id ORDER BY estatus");
      // $query = $mysqli->query("select distinct  * from laboratorios ORDER BY estatus");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td>
            <a href="../update/updateLaboratorio.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
          </td>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['jurisdicciones_nombre'] ?></td>
          <td><?php echo $row['telefono'] ?></td>
          <td><?php echo $row['direccion'] ?></td>
          <td><?php echo $row['estatus'] ?></td>
          <td><?php echo $row['creado'] ?></td>
          <td><?php echo $row['modificado'] ?></td>
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