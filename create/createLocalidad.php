<?php 
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>

<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Localidad</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="localidad.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    
    <?php
                
      if(isset($_POST['submit'])){
        
        $municipio_id     = $_POST['municipio_id'];
        $nombre           = $_POST['nombre'];
        $clave            = $_POST['clave'];
        
        $query = $mysqli->query("insert into localidades values('',$municipio_id,$clave,'$nombre',NOW(),NOW())");
       
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

        $rowsMunicipio = $mysqli->query("SELECT id, nombre FROM municipios");
    ?>

    <form role="form"  method="post" name="formulario">
      
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. ENSENADA">
        </div>

       <!-- EMPIEZA SELECTO MUNICIPIOS-->
         <div class="form-group">
            <label for="id_municipio">Municipio:</label>
            <select name="id_municipio" class="form-control" >
                <?php foreach ($rowsMunicipio as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
        <div class="form-group" name="modificar">
            <input type="number" class="form-control" id="municipio_id" name="municipio_id" readonly>
        </div>
        <!-- TERMINA SELECT MUNICIPIO-->
        <div class="form-group">
          <label for="clave">Clave de Localidad:</label>
          <input type="number" class="form-control" id="clave" name="clave" placeholder="Ej. 001">
        </div>
    
        <button type="submit" class="btn btn-default" name="submit">Enviar</button>
    
    </form>
  
  </div>
</section>

<?php
  include("../footer.php");
?>