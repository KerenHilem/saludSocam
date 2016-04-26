<?php
  
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Pacientes</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createPaciente.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nuevo Paciente</a></h1>
      </div>
   <div class="table-responsive col-md-12">
   <table class="table table-hover table table-condensed">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Nombre</th>
          <th>Curp</th>
          <th>Fecha Nacimiento</th>
          <th>Edad</th>
          <th>Teléfono</th>
          <th>Correo</th>
          <th>Colonia</th>
          <th>Jurisdicción</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $query = $mysqli->query("SELECT pacientes.id, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, pacientes.curp, pacientes.fecha_nacimiento, pacientes.edad, pacientes.telefono,pacientes.correo, pacientes.colonia, jurisdicciones.nombre AS jurisdicciones_nombre FROM pacientes, jurisdicciones WHERE jurisdicciones.id=pacientes.jurisdiccion_id ORDER BY pacientes.apellido_pat");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['apellido_pat'] ?></td>
          <td><?php echo $row['apellido_mat'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['curp'] ?></td>
          <td><?php echo $row['fecha_nacimiento'] ?></td>
          <td><?php echo $row['edad'] ?></td>
          <td><?php echo $row['telefono'] ?></td>
          <td><?php echo $row['correo'] ?></td>
          <td><?php echo $row['colonia'] ?></td>
          <td><?php echo $row['jurisdicciones_nombre'] ?></td>
          <td>
            <a href="../update/updatePaciente.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick="return confirm('¿Seguro que quieres eliminar los datos?')" href="../delete/deletePaciente.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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