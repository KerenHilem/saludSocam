<?php
 
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
  
?>

<section> 
  <div class="container">
       <div class="col-md-10">
        <h2>Unidades</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../create/createUnidad.php" class="btn btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Agregar Nueva Unidad</a></h1>
      </div>

  <div class="table-responsive col-md-12">
   <table class="table table-hover">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Clues</th>
          <th>Jurisdición</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Tipo de Establecimiento</th>
          <th>Tipología</th>
          <th>Tipología SINERHIAS</th>
        </tr>
      </thead>
      <tbody>
        <?php
      $no = 1;
      $jurisdiccion=$_SESSION["jurisdiccion"];

       if ($_SESSION['nivel']==1) {
        $query = $mysqli->query("SELECT DISTINCT unidades.clues, jurisdicciones.nombre AS jurisdicciones_nombre, unidades.nombre, unidades.direccion, unidades.telefono, unidades.tipo_establecimiento, unidades.tipologia, unidades.tipologia_sinerhias FROM unidades, jurisdicciones ORDER BY jurisdicciones.nombre");
       }
       else  if ($_SESSION['nivel']==2 || $_SESSION['nivel']==3 ||$_SESSION['nivel']==4) {
        $query = $mysqli->query("SELECT DISTINCT unidades.clues, jurisdicciones.nombre AS jurisdicciones_nombre, unidades.nombre, unidades.direccion, unidades.telefono, unidades.tipo_establecimiento, unidades.tipologia, unidades.tipologia_sinerhias FROM unidades, jurisdicciones WHERE unidades.jurisdiccion_id='$jurisdiccion' AND jurisdicciones.id='$jurisdiccion' ORDER BY jurisdicciones.nombre");
      }
      while($row = $query->fetch_assoc()){
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $row['clues'] ?></td>
          <td><?php echo $row['jurisdicciones_nombre'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['direccion'] ?></td>
          <td><?php echo $row['telefono'] ?></td>
          <td><?php echo $row['tipo_establecimiento'] ?></td>
          <td><?php echo $row['tipologia'] ?></td>
          <td><?php echo $row['tipologia_sinerhias'] ?></td>
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