<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section> 
  <div class="container">
       <div class="col-md-12"><?php 
       if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
        echo '<h2>Metas Nivel Jurisdicción</h1>';
      }else if($_SESSION['nivel']==4) 
      echo '<h2>Metas Nivel Unidad</h1>';
        ?>
      
      </div>
 
  
<div class="table-responsive col-md-12">
  <h4 class="col-md-12">Citología Metas de esta Unidad</h4>
   <table class="table table-hover">
      <thead>
        <tr>
          <th>Rango 25 A 34</th>
          <th>Rango 35 A 64</th>
          <th>Meta 35 A 64</th>
          <th>Total</th>
          <th>Mes</th>
          <th>Año</th>
          <?php 
          if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){ 
            echo '<th>Nombre</th>';
            }
            ?>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
       $unidad_id = $_SESSION['unidad_id'];
    if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
        $query = $mysqli->query("SELECT meta_unidad_citologia.ano, meta_unidad_citologia.mes, meta_unidad_citologia.rango1, meta_unidad_citologia.rango2, unidades.nombre FROM meta_unidad_citologia, unidades WHERE meta_unidad_citologia.unidad_id=unidades.id ORDER BY meta_unidad_citologia.mes, unidades.nombre");
    
    }else if($_SESSION['nivel']==4){
        $query = $mysqli->query("SELECT * FROM meta_unidad_citologia WHERE meta_unidad_citologia.unidad_id='$unidad_id'");
    }
      while($row = $query->fetch_assoc()){
      ?>
        <tr class="success">
          <td><?php echo $row['rango1'] ?></td>
          <td></td>
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
          <?php 
           if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){ 
             echo "<td>".$row['nombre']."</td>" ;
            }
            ?>
        </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    </div> <!-- responsive table -->
    <?php  if ($_SESSION['nivel']==4) {
      # code...
     
  echo '<div class="table-responsive col-md-12">
     <table class="table table-hover">
        <thead>
          <tr>
            <th width="20">No</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombre</th>
            <th>Rango 25 A 34</th>
            <th>Rango 35 A 64</th>
            <th>Total</th>
            <th>Mes</th>
            <th>Año</th>
          </tr>
        </thead>
        <tbody>';}
        ?>
        <?php
      $unidad_id = $_SESSION['unidad_id'];
      $no = 1;
    if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){
      $query = $mysqli->query("SELECT personal.apellido_pat, personal.apellido_mat, personal.nombre, meta_doctor_citologia.rango1, meta_doctor_citologia.rango2, meta_doctor_citologia.mes, meta_doctor_citologia.ano FROM meta_doctor_citologia, personal WHERE meta_doctor_citologia.unidad_id='$unidad_id' AND personal.id=meta_doctor_citologia.doctor_id");
    
    }else if($_SESSION['nivel']==4){
      $query = $mysqli->query("SELECT personal.apellido_pat, personal.apellido_mat, personal.nombre, meta_doctor_citologia.rango1, meta_doctor_citologia.rango2, meta_doctor_citologia.mes, meta_doctor_citologia.ano FROM meta_doctor_citologia, personal WHERE meta_doctor_citologia.unidad_id='$unidad_id' AND personal.id=meta_doctor_citologia.doctor_id");
    }
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['apellido_pat'] ?></td>
          <td><?php echo $row['apellido_mat'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
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
    </div> <!-- table responsive col -->

  </div> <!-- conteiner -->
</section>
<?php
  include("../footer.php");
?>