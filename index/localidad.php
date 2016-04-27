<?php
  
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>

<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Localidades</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createLocalidad.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nueva Localidad</a></h1>
      </div>


   <table class="table table-hover table table-condensed col-md-12">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Jurisdiccion</th>
          <th>Clave de Localidad</th>
          <th>Nombre</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $query = $mysqli->query("select distinct  * from localidades");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['jurisdiccion_id'] ?></td>
          <td><?php echo $row['clave_localidad'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td>
            <a href="../update/updateLocalidad.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick="return confirm('¿Seguro que quieres eliminar los datos?')" href="deleteLocalidad.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
  </div>
</section>

<?php
  include("../footer.php");
?>