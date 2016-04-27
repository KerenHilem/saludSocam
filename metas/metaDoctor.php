<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10"><?php 
       if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
        echo '<h2>Metas Nivel Jurisdicción</h1>';
      }else if($_SESSION['nivel']==4) 
      echo '<h2>Metas Nivel Unidad</h1>';
        ?>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createCitologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nueva Citología</a></h1>
      </div>

  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
        <th width="100">Mostrar Proceso</th>
          <th width="20">No</th>
          <th>Nombre</th>
          <th>RFC</th>
          <th>Rango 25 A 34</th>
          <th>Rango 35 A 64</th>
          <th>Total</th>
          <th>Mes</th>
          <th>Año</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $unidad_id = $_SESSION['unidad_id'];
      $no = 1;
    if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
      $query = $mysqli->query("SELECT personal.apellido_pat, personal.apellido_mat, personal.nombre, personal.rfc, meta_doctor_citologia.rango1, meta_doctor_citologia.rango2, meta_doctor_citologia.mes, meta_doctor_citologia.ano FROM meta_doctor_citologia, personal WHERE personal.id=meta_doctor_citologia.doctor_id");
    
    }else if($_SESSION['nivel']==4){
      $query = $mysqli->query("SELECT personal.apellido_pat, personal.apellido_mat, personal.nombre, personal.rfc,meta_doctor_citologia.rango1, meta_doctor_citologia.rango2, meta_doctor_citologia.mes, meta_doctor_citologia.ano FROM meta_doctor_citologia, personal WHERE meta_doctor_citologia.unidad_id='$unidad_id' AND personal.id=meta_doctor_citologia.doctor_id");
    }
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td>
            <a href="../resultado/verResultadoCitologia.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
          </td>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['apellido_pat']." ".$row['apellido_mat']." ".$row['nombre'] ?></td>
          <td><?php echo $row['rfc'] ?></td>
          <td><?php echo $row['rango1'] ?></td>
          <td><?php echo $row['rango2'] ?></td>
          <td><?php echo $row['rango1']+$row['rango2'] ?></td>
          <td>
              <?php 
              if ($row['mes']==2) {
               echo 'Febrero';
              }else if ($row['mes']==3) {
                echo 'Marzo';
              }
              ?>
          </td>
          <td><?php echo $row['ano'] ?></td>
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