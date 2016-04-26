<?php
 
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>

<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Perfiles</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createPerfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nuevo Perfil</a></h1>
      </div>

  
   <div class="table-responsive col-md-12">
   <table class="table table-hover table table-condensed">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Id</th>
          <th>Nombre</th>
          <th>Creado</th>
          <th>Modificado</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $query = $mysqli->query("select distinct  * from perfiles");
      $no = 1;
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['creado'] ?></td>
          <td><?php echo $row['modificado'] ?></td>
          <td>
            <a href="../update/updatePerfil.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick="return confirm('¿Seguro que quieres eliminar los datos?')" href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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