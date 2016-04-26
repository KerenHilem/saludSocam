<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
  
?>

<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Exploración Clínica</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createExploracionClinica.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nueva Exploración Clínica</a></h1>
      </div>

  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>ID</th>
          <th>Unidad</th>
          <th>Paciente</th>
          <th>Fecha de atención</th>
          <th>Edad de presentación de la menarca</th>
          <th>En que familiares tiene antecedentes de cáncer mamario</th>
          <th>Edad de presentación de la menopausia</th>
          <th>Otros factores de riesgo</th>
          <th>Signos clínicos</th>
          <th>Fecha de inicio del primer síntoma o signo</th>
          <th>Localización</th>
          <th>Cédula profesional de quién realizó el estudio</th>
          <th>Conducta a seguir</th>
          <th>Motivo de la referencia</th>
          <th>Fecha de referencia</th>
          <th>Creado</th>
          <th>Modificado</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $query = $mysqli->query("select distinct  * from exploracion_clinica");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['unidad_id'] ?></td>
          <td><?php echo $row['paciente_id'] ?></td>
          <td><?php echo $row['fecha_atencion'] ?></td>
          <td><?php echo $row['edad_presentacion_menarca'] ?></td>
          <td><?php echo $row['antecedentes_familiares'] ?></td>
          <td><?php echo $row['edad_presentacion_menopausia'] ?></td>
          <td><?php echo $row['otros_factores'] ?></td>
          <td><?php echo $row['signos_clinicos'] ?></td>
          <td><?php echo $row['fecha_inicio_primer_signo'] ?></td>
          <td><?php echo $row['localizacion'] ?></td>
          <td><?php echo $row['cedula_realizo_estudio'] ?></td>
          <td><?php echo $row['conducta_seguir'] ?></td>
          <td><?php echo $row['motivo_referencia'] ?></td>
          <td><?php echo $row['fecha_referencia'] ?></td>
          <td><?php echo $row['creado'] ?></td>
          <td><?php echo $row['modificado'] ?></td>
          <td>
            <a href="../update/updateExploracionClinica.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick="return confirm('¿Seguro que quieres eliminar los datos?')" href="deleteUnidad.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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