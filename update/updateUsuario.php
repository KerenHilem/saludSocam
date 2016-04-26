<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>

  
<section>
  <div class="container">
  <?php
   $id = $_GET['id'];
if(isset($id)){
        $result = $mysqli->query("select * from usuarios where id='$id' limit 0,1");
        $data = $result->fetch_assoc();
?>
    <div class="row">
      <div class="col-md-10">
        <h1>Actualización de Datos</h1>
      </div>
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

      $query = $mysqli->query("update usuarios set nombre='$nombre', apellido_pat ='$apellido_pat', apellido_mat ='$apellido_mat', correo='$correo' , contrasena='$contrasena' , jurisdiccion_id='$jurisdiccion_id' , perfil_id='$perfil_id' , modificado = NOW() where id='$id'");
        if($query){   
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Actualizados.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Faltan Datos.
        </div>
        <?php
      }
    }

      $rowsJurisdiccion     = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
      $rowsPerfiles         = $mysqli->query("SELECT id, nombre FROM perfiles ORDER by nombre");
    ?>
    <br/>
    <form method="post">
      
        <div class="form-group col-md-4">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre'] ?>">
        </div>

         <div class="form-group col-md-4">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" value="<?php echo $data['apellido_pat'] ?>">
        </div>

         <div class="form-group col-md-4">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" value="<?php echo $data['apellido_mat'] ?>">
        </div>

        <div class="form-group col-md-6">
          <label for="correo">Correo para entrar al sistema:</label>
          <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $data['correo'] ?>">
        </div>
        
        <div class="form-group col-md-6">
          <label for="contrasena">Contraseña para entrar al sistema:</label>
          <input type="text" class="form-control" id="contrasena" name="contrasena" value="<?php echo $data['contrasena'] ?>">
        </div>

        <div class="form-group col-md-6">
            <label for="jurisdiccion_id">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
                <?php foreach ($rowsJurisdiccion as $key) {
                  if ($key['id']==$data['jurisdiccion_id']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="perfil_id">Perfil:</label>
            <select name="perfil_id" class="form-control" >
                <?php foreach ($rowsPerfiles as $key) {
                  if ($key['id']==$data['perfil_id']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div> 
        
        <button type="submit" class="btn btn-default" name="submit">Actualizar</button>
    </form>
<?php
} else{
  echo "<script>location.href='../index/usuario.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>