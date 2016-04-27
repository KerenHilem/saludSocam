<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-12">
        <h2>Muestras Enviadas de Unidades</h1>
      </div>


  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
          <th width="100">Action</th>
          <th width="20">No</th>
          <th>ID</th>
          <th>Nombre</th>
          <th>Número Citológico</th>
          <th>Unidad</th>
          <th>Creada</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $jurisdiccion=$_SESSION['jurisdiccion'];

        $no = 1;
        if ($_SESSION['nivel']==1) {
         $query = $mysqli->query("SELECT DISTINCT citologia.id,citologia.creado, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.numero_citologico, unidades.nombre AS unidades_nombre FROM pacientes, unidades, citologia WHERE pacientes.id=citologia.paciente_id AND unidades.id=citologia.unidad_id AND citologia.estatus='ENVIO DE MUESTRAS A JURISDICCION' AND citologia.repetir_estudio<>'SI'");
        }else if ($_SESSION['nivel']==2) {
        $query = $mysqli->query("SELECT DISTINCT citologia.id, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.numero_citologico, unidades.nombre AS unidades_nombre FROM pacientes, unidades, citologia WHERE pacientes.id=citologia.paciente_id AND unidades.id=citologia.unidad_id AND citologia.estatus='ENVIO DE MUESTRAS A JURISDICCION' AND unidades.jurisdiccion_id='$jurisdiccion'");
      }
      while($row = $query->fetch_assoc()){
      ?>
      <tr>
          <td>
            <a href="updateCitologia.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          </td>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['apellido_pat']." ".$row['apellido_mat']." ".$row['nombre'] ?></td>
          <td><?php echo $row['numero_citologico'] ?></td>
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