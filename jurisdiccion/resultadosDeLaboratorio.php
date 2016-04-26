<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
 	  <h2 class="col-md-12">Administración Nivel Jurisdicción</h2>
      <div class="col-md-10"> <h3>Resultados del Laboratorio</h3> </div>
      <!-- <div class="col-md-2 text-right">
        <h1><a href="../index/citologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div> -->
    </div>
    <?php

    if(isset($_POST['submit'])){
  	 $type = (array) $_POST["seleccion"]; 
     $lista=implode(',', $type); 
      $query = $mysqli->query("UPDATE citologia SET estatus='ENTREGA DE RESULTADOS A UNIDAD' WHERE id IN ({$lista})");

   if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Enviados.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Error.
        </div>
        <?php
      }
    }

    ?>
  <form role="form"  method="post">
    
  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
          <th><span class="glyphicon glyphicon-unchecked"></th>
          <th width="20">No</th>
          <th>ID</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Nombre</th>
          <th>Número Citológico</th>
          <th>Diagnostico Citogíco</th>
          <th>Unidad</th>
          <th width="100">Mostrar Resultado</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      // $query = $mysqli->query("select distinct  * from citologia where estatus='ENVIO DE RESULTADOS A JURISDICCION'");
      $query = $mysqli->query("SELECT DISTINCT citologia.id, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.nombre, citologia.numero_citologico, unidades.nombre AS unidades_nombre, citologia.diagnostico_citologico FROM pacientes, unidades, citologia WHERE pacientes.id=citologia.paciente_id AND unidades.id=citologia.unidad_id AND citologia.estatus='ENVIO DE MUESTRAS A LABORATORIO IMPRESION' ORDER BY citologia.creado");
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><input type="checkbox" name="seleccion[]" value="<?php echo $row['id'] ?>"/></td>
         <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['apellido_pat'] ?></td>
          <td><?php echo $row['apellido_mat'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['numero_citologico'] ?></td>
          <td><?php echo $row['diagnostico_citologico'] ?></td>
          <td><?php echo $row['unidades_nombre'] ?></td>
          <td>
            <a href="../resultado/verResultadoCitologia.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
          </td>
          </td>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    </div>

        <button type="submit" class="btn btn-default col-md-3" name="submit">Enviar a la Unidad</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>