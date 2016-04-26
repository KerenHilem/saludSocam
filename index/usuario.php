<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>

<section> 
  <div class="container">
    <div class="col-md-10">
      <h2>Usuarios</h1>
    </div>
    <div class="col-md-2 text-right">
      <h1><a href="../create/createUsuario.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nuevo Usuario</a></h1>
    </div>            

  
<div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Id</th>
          <th>Nombre</th>
          <th>Ape P</th>
          <th>Ape M</th>
          <th>Correo</th>
          <th>Contraseña</th>
          <th>Jurisdicción</th>
          <th>Perfil</th>
          <th>Creado</th>
          <th>Modificado</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
       <?php
      $no = 1;
      $query = $mysqli->query("SELECT usuarios.id, usuarios.nombre, usuarios.apellido_pat, usuarios.apellido_mat, usuarios.correo, usuarios. contrasena, jurisdicciones.nombre AS jurisdicciones_nombre, perfiles.nombre AS perfiles_nombre, usuarios.creado, usuarios.modificado FROM usuarios, jurisdicciones, perfiles WHERE usuarios.jurisdiccion_id=jurisdicciones.id AND usuarios.perfil_id=perfiles.id ORDER BY perfiles.nombre");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['apellido_pat'] ?></td>
          <td><?php echo $row['apellido_mat'] ?></td>
          <td><?php echo $row['correo'] ?></td>
          <td><?php echo $row['contrasena'] ?></td>
          <td><?php echo $row['jurisdicciones_nombre'] ?></td>
          <td><?php echo $row['perfiles_nombre'] ?></td>
          <td><?php echo $row['creado'] ?></td>
          <td><?php echo $row['modificado'] ?></td>
          <td>
            <a href="../update/updateUsuario.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a onclick="return confirm('¿Seguro que quieres eliminar los datos?')" href="deleteUsuario.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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