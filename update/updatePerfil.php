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

      $result = $mysqli->query("select * from perfiles where id='$id' limit 0,1");
      $data = $result->fetch_assoc();

 ?>
    <div class="row">
      <div class="col-md-10"> <h3>Actualización de Perfiles</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/perfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      
      $nombre         = $_POST['nombre'];
    
      $query = $mysqli->query("update perfiles set nombre ='$nombre', modificado = NOW() where id='$id'");
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
    ?>
    <br/>
    <form method="post">

        <div class="form-group col-md-12">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre'] ?>">
        </div>

                
        <button type="submit" class="btn btn-default" name="submit">Actualizar</button>
    </form>
<?php
} else{
  echo "<script>location.href='perfil.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>