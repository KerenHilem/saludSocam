<?php

  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>

<section> 
  <div class="container">
    <div class="col-md-10 col-xs-10 text-left">
      <h2>Hojas De Resumen Citología</h1>
    </div>
   
   <!--  botón para imprimir -->
    <div class="col-md-2 col-xs-2 text-right">
      <h1><a class="btn btn-primary hidden-print" onclick="imprimir()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>Imprimir</a></h1>
    </div>
  <!--    fin del botón para imprimir -->
     <?php

    if(isset($_POST['submit'])){
    
    $query = $mysqli->query("UPDATE hoja_resumen_citologia SET impreso='SI'");

   if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><a href=""></a></button>
          <strong>Éxito!</strong> Lista Limpiada.
        </div>

        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> No se pudo borrar la lista.
        </div>
        <?php
      }
    }

    ?>
  <div class="scrollable-table">
   <table class="table table-striped table-header-rotated table-hover table">
      <thead>
        <tr>
          <th width="20" class="rotate-45"><div><span>No.</span></div></th>
          <th class="rotate-45"><div><span>Número de muestra</span></div></th>
          <th class="rotate-45"><div><span>Nombre</span></div></th>
          <th class="rotate-45"><div><span>Total De Muestras</span></div></th>
          <th class="rotate-45"><div><span>Rango de <br>25 a 34</span></div></th></th>
          <th class="rotate-45"><div><span>Rango de <br>35 a 64</span></div></th></th>
          <th class="rotate-45"><div><span>Muestras Inadecua-<br>das</span></div></th></th>
          <th class="rotate-45"><div><span>Muestras Fuera De Rango</span></div></th></th>
          <th class="rotate-45"><div><span>Creado</span></div></th></th>
        </tr>
      </thead>
      <tbody>
       <?php

      $no = 1;

      $jurisdiccion=$_SESSION['jurisdiccion'];
      if($_SESSION['nivel']==1){
      $query = $mysqli->query("SELECT DISTINCT unidades.nombre, hoja_resumen_citologia.id, hoja_resumen_citologia.total_muestras, hoja_resumen_citologia.muestras_rango1, hoja_resumen_citologia.muestras_rango2, hoja_resumen_citologia.muestras_inadecuadas, hoja_resumen_citologia.muestras_fuera_rango,hoja_resumen_citologia.muestras_inadecuadas, date_format(hoja_resumen_citologia.creado,'%d/%m/%Y') AS creado FROM hoja_resumen_citologia, unidades WHERE unidades.id=hoja_resumen_citologia.unidad_id AND hoja_resumen_citologia.impreso='NO' ORDER BY hoja_resumen_citologia.id");
    }else if($_SESSION['nivel']==2){
      $query = $mysqli->query("SELECT distinct unidades.nombre, hoja_resumen_citologia.id, hoja_resumen_citologia.total_muestras, hoja_resumen_citologia.muestras_rango1, hoja_resumen_citologia.muestras_rango2, hoja_resumen_citologia.muestras_inadecuadas, hoja_resumen_citologia.muestras_fuera_rango,hoja_resumen_citologia.muestras_inadecuadas, date_format(hoja_resumen_citologia.creado,'%d/%m/%Y') AS creado FROM hoja_resumen_citologia, unidades WHERE unidades.id=hoja_resumen_citologia.unidad_id AND hoja_resumen_citologia.impreso='NO' AND unidades.jurisdiccion_id='$jurisdiccion' ORDER BY hoja_resumen_citologia.id");
    }

      $sumatoria_total_muestas=0;
      $rango1=0;
      $rango2=0;
      $muestras_inadecuadas=0;
      $muestras_fuera_rango=0;
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['total_muestras']; $sumatoria_total_muestas+=$row['total_muestras'];?></td>
          <td><?php echo $row['muestras_rango1']; $rango1+=$row['muestras_rango1'];  ?></td>
          <td><?php echo $row['muestras_rango2']; $rango2+=$row['muestras_rango2'];?></td>
          <td><?php echo $row['muestras_inadecuadas']; $muestras_inadecuadas+=$row['muestras_inadecuadas']; ?></td>
          <td><?php echo $row['muestras_fuera_rango']; $muestras_fuera_rango+=$row['muestras_fuera_rango'];?></td>
          <td><?php echo $row['creado'] ?></td>
        </tr>
        
      <?php
      }
      ?>
      </tbody>
    </table>
    
      <table class="table table-hover table">
        <thead>
          <tr>
            <th>Total De Muestras</th>
            <th>Rango de 25 a 34</th>
            <th>Rango de 35 a 64</th>
            <th>Muestras Inadecuadas</th>
            <th>Muestras Fuera De Rango</th>
          </tr>
        </thead>
        <tr>
            <td><?php echo $sumatoria_total_muestas ?></td>
            <td><?php echo $rango1; ?></td>
            <td><?php echo $rango2; ?></td>
            <td><?php echo $muestras_inadecuadas; ?></td>
            <td><?php echo $muestras_fuera_rango; ?></td>
        </tr>
      </table>
    </div> <!-- responsive table -->
    <script>
      function imprimir() {
          window.print();
       }
    </script>
    
    <form role="form"  method="post">
          <div class="form-group col-md-4 hidden-print">
               <button type="submit" class="btn btn-default" name="submit" onclick="return confirm('¿Seguro que desea Limpiar la lista de impresión?')">Limpiar Lista</button> 
          </div>
    </form>
    <div id="btnArriba"></div>
    <div id="btnAbajo"></div>
  </div>
   
</section>

<?php
  include("../footer.php");
?>