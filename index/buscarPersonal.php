<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Usuario</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/usuario.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>

    <?php
    if(isset($_POST['submit'])){
     
      $nombre             = $_POST['nombre'];
      $apellido_pat       = $_POST['apellido_pat'];
      $apellido_mat       = $_POST['apellido_mat'];
      $correo             = $_POST['correo'];
      $contrasena         = $_POST['contrasena'];
      $jurisdiccion_id    = $_POST['jurisdiccion_id'];
      $perfil_id          = $_POST['perfil_id'];
      $unidad_id          = $_POST['unidad_id'];
         
       $query = $mysqli->query("insert into usuarios values('','$nombre','$apellido_pat','$apellido_mat','$correo','$contrasena',$jurisdiccion_id,'$perfil_id',' $unidad_id ',NOW(),NOW())");

   if($query){ 
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Añadidos.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Error!
        </div>
        <?php
      }
    }
      $jurisdiccion=$_SESSION['jurisdiccion'];
      $rowsJurisdiccion     = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
      $rowsPerfiles         = $mysqli->query("SELECT id, nombre FROM perfiles ORDER by nombre");

      $jurisdiccion=$_SESSION['jurisdiccion'];
      if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }
      else if($_SESSION['nivel']==2 || $_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      
      $rowsUnidad = $mysqli->query("SELECT id, nombre, clues FROM unidades ORDER by clues");
    }
      
    ?>

    <form role="form"  method="post" name="formulario">
        
       
        <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-4">
            <label for="unidad_id">Unidad:</label>
            <select class="form-control" name="unidad_id" id="unidad_id">
              <option value="-1">SELECCIONA UNIDAD</option>';
                <?php foreach ($rowsUnidad as $key) {
                  echo '<option value="'.$key['clues'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

        <div class="form-group col-md-4">
            <label for="jurisdiccion_id">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
                <?php foreach ($rowsJurisdiccion as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>

      <br>
        <button type="submit" class="btn btn-default col-md-4" name="submit">Buscar</button>
    </form>
  
  </div>
</section>
<?php
  include("../footer.php");
?>>