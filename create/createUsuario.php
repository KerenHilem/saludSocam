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

      $existe_usuario = $mysqli->query("SELECT * FROM usuarios WHERE correo='$correo'");

      if (mysqli_num_rows($existe_usuario)>0)
      {
        // echo 'Exite al menos un registro';
        
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Ya Existe este correo eléctronico intente con otro!</strong> Error.
              </div>';
       
      }else {
         
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
                <strong>Alerta!</strong> No se guardo la información del usuario!
              </div>
              <?php
            }
    }
  }
      $jurisdiccion=$_SESSION['jurisdiccion'];

      $rowsJurisdiccion     = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
      $rowsPerfiles         = $mysqli->query("SELECT id, nombre FROM perfiles ORDER by nombre");

     
      if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }
      else if($_SESSION['nivel']==2 || $_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
        }
      
    ?>

    <form role="form"  method="post" name="formulario">
        
        <div class="form-group col-md-4">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Jorge">
        </div>

         <div class="form-group col-md-4">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" placeholder="Ej. Ruíz">
        </div>

         <div class="form-group col-md-4">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" placeholder="Ej. Jaramillo">
        </div>

        <div class="form-group col-md-6">
          <label for="correo">Correo para entrar al sistema:</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej. jorg3@gmail.com" required>
        </div>
        
        <div class="form-group col-md-6">
          <label for="contrasena">Contraseña para entrar al sistema:</label>
          <input type="text" class="form-control" id="contrasena" name="contrasena" required value="123">
        </div>

        <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-4">
            <label for="unidad_id">Unidad:</label>
            <select class="form-control" name="unidad_id" id="unidad_id">
              <option value="-1">SELECCIONA UNIDAD</option>';
                <?php foreach ($rowsUnidad as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

        <div class="form-group col-md-4">
            <label for="jurisdiccion_id">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
                <?php foreach ($rowsJurisdiccion as $key) {
                  if($key['id']==$jurisdiccion){
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                    }else {
                      echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                    }
                }?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="perfil_id">Perfil:</label>
            <select name="perfil_id" class="form-control" >
                <?php foreach ($rowsPerfiles as $key) {
                  if($key['id']=='4'){
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else {
                    echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                  }
                }
                ?>
            </select>
        </div> 
        
        <button type="submit" class="btn btn-default" name="submit">Enviar</button>
    </form>
  
  </div>
</section>
<?php
  include("../footer.php");
?>