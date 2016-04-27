<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>

<section> 
  <div class="container">
    <div class="col-md-10">
      <h2>Hojas De Resumen</h1>
    </div>
    <div class="col-md-2 text-right">
      <h1><a href="../create/createHojaResumen.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nuevo Usuario</a></h1>
    </div>
  <?php  echo $_POST['foo']; ?>
   <div class="table-responsive col-md-12">
   <table class="table table-hover table table-condensed">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Id</th>
          <th>Unidad ID</th>
          <th>Total De Muestras</th>
          <th>Muestras Rango 1</th>
          <th>Muestras Rango 2</th>
          <th>Muestras Inadecuadas</th>
          <th>Muestras Fuera De Rango</th>
          <th>Creado</th>
          <th>Modificado</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
       <?php

      $no = 1;
      $query = $mysqli->query("select distinct  * from hojas_resumen");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['unidad_id'] ?></td>
          <td><?php echo $row['total_muestras'] ?></td>
          <td><?php echo $row['muestras_rango1'] ?></td>
          <td><?php echo $row['muestras_rango2'] ?></td>
          <td><?php echo $row['muestras_inadecuadas'] ?></td>
          <td><?php echo $row['muestras_fuera_rango'] ?></td>
          <td><?php echo $row['creado'] ?></td>
          <td><?php echo $row['modificado'] ?></td>
          <td>
            <a href="../update/updateHojaResumen.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick="return confirm('¿Seguro que quieres eliminar los datos?')" href="deleteHojaResumen.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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