  <!-- Content -->

<div class="container theme-showcase" role="main">
<?php
    if(isset($_POST['submit'])){
     
      $clues             = $_POST['nombre'];
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
      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
    }
      
    ?>

</div> <!-- /container -->