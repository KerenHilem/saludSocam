<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Meta Unidad</h1>
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
          <th>Rango 1</th>
          <th>Rango 2</th>
          <th>Total</th>
          <th>Mes</th>
          <th>Año</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
       $unidad_id = $_SESSION['unidad_id'];
    if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
        $query = $mysqli->query("SELECT * FROM meta_unidad_citologia");
    
    }else if($_SESSION['nivel']==4){
        $query = $mysqli->query("SELECT * FROM meta_unidad_citologia WHERE meta_unidad_citologia.unidad_id='$unidad_id'");
    }
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td>
            <a href="../resultado/verResultadoCitologia.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
          </td>
          <td><?php echo $no++ ?></td>
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