<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Laboratorio Citologías</h1>
      </div>
      <div class="col-md-2 text-right hidden">
        <h1><a href="../create/createCitologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nueva Citología</a></h1>
      </div>

  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
          <th width="100">Action</th>
          <th width="20">No</th>
          <th>Nombre</th>
          <th>Folio</th>
          <th>Muestra Repetida</th>
          <th>Motivo De La Repetición</th>
          <th>Unidad</th>
          <th>Creado</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $jurisdiccion=$_SESSION['jurisdiccion'];
      $no = 1;
       if ($_SESSION['nivel']==1) {
         $query = $mysqli->query("SELECT citologia.creado, citologia.id, citologia.repetir_estudio,citologia.motivo_repeticion, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.numero_citologico, unidades.nombre AS unidades_nombre FROM pacientes, unidades, citologia WHERE estatus='ENVIO DE MUESTRAS A LABORATORIO' AND citologia.paciente_id=pacientes.id AND citologia.unidad_id=unidades.id");
   }else if ($_SESSION['nivel']==2 || $_SESSION['nivel']==3) {
        $query = $mysqli->query("SELECT citologia.creado, citologia.id, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.numero_citologico, unidades.nombre AS unidades_nombre FROM pacientes, unidades, citologia WHERE estatus='ENVIO DE MUESTRAS A LABORATORIO' AND citologia.paciente_id=pacientes.id AND citologia.unidad_id=unidades.id AND unidades.jurisdiccion_id='$jurisdiccion'");
    }
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td>
            <a href="updateCitologia.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          </td>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['apellido_pat']." ".$row['apellido_mat']." ".$row['nombre'] ?></td>
          <td><?php echo $row['numero_citologico'] ?></td>
          <td><?php echo $row['repetir_estudio'] ?></td>
           <td><?php echo $row['motivo_repeticion'] ?></td>
          <td><?php echo $row['unidades_nombre'] ?></td>
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