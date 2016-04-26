<?php
 
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Personal</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createPersonal.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nuevo Personal</a></h1>
      </div>
   <div class="table-responsive col-md-12">
   <table class="table table-hover table table-condensed">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Unidad</th>
          <th>Nombre</th>
          <th>Ape P.</th>
          <th>Ape M.</th>
          <th>RFC</th>
          <th>Cédula</th>
          <th>Puesto</th>
          <th>Contrato</th>
          <th>Correo</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $query = $mysqli->query("<SE></SE>LECT DISTINCT personal.id, personal.rfc, personal.clues_unidad, personal.nombre, personal.apellido_pat, personal.apellido_mat, personal.cedula, personal.puesto, personal.tipo_contrato, personal.correo FROM unidades, personal WHERE unidades.jurisdiccion_id = 1 ORDER BY personal.id DESC"); 

      if (empty($query)) {
          echo '<div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Alerta!</strong> Esta alerta indica que no hay datos en la base de datos que mostrar.!
                    </div>';
        }
        while($row = $query->fetch_assoc()){      
          ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['clues_unidad'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['apellido_pat'] ?></td>
          <td><?php echo $row['apellido_mat'] ?></td>
          <td><?php echo $row['rfc'] ?></td>
          <td><?php echo $row['cedula'] ?></td>
          <td><?php echo $row['puesto'] ?></td>
          <td><?php echo $row['tipo_contrato'] ?></td>
          <td><?php echo $row['correo'] ?></td>
          <td>
            <a href="../update/updatePersonal.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick="return confirm('¿Seguro que quieres eliminar los datos?')" href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    </div> <!-- class="table-responsive col-md-12" -->
  </div>
</section>

<?php
  include("../footer.php");
?>