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

      $result = $mysqli->query("select * from pacientes where id='$id' limit 0,1");
      $data = $result->fetch_assoc();
?>
    <div class="row">
      <div class="col-md-10">
        <h1>Actualización de Datos</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/paciente.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $cicam_clave          = $_POST['cicam_clave'];
      $nombre               = $_POST['nombre'];
      $apellido_pat         = $_POST['apellido_pat'];
      $apellido_mat         = $_POST['apellido_mat'];
      $entidad_nacimiento   = $_POST['entidad_nacimiento'];
      $municipio_nacimiento = $_POST['municipio_nacimiento'];
      $fecha_nacimiento     = $_POST['fecha_nacimiento'];
      $edad                 = $_POST['edad'];
      $curp                 = $_POST['curp'];
      $calle                = $_POST['calle'];
      $numero               = $_POST['numero'];
      $colonia              = $_POST['colonia'];
      $telefono             = $_POST['telefono'];
      $otro_telefono        = $_POST['otro_telefono'];
      $correo               = $_POST['correo'];
      $localidad            = $_POST['localidad'];
      $municipio_id         = $_POST['municipio_id'];
      $delegacion           = $_POST['delegacion'];
      $cp                   = $_POST['cp'];
      $entidad_federativa   = $_POST['entidad_federativa'];
      $jurisdiccion_id      = $_POST['jurisdiccion_id'];
      $tiempo_residencia    = $_POST['tiempo_residencia'];
      $estado_civil         = $_POST['estado_civil'];
      $escolaridad          = $_POST['escolaridad'];
      $ocupacion            = $_POST['ocupacion'];
      $afiliacion           = $_POST['afiliacion'];
      $afiliacion_otro      = $_POST['afiliacion_otro'];

      $query = $mysqli->query("update pacientes set cicam_clave='$cicam_clave', nombre='$nombre', apellido_pat='$apellido_pat', apellido_pat='$apellido_pat',entidad_nacimiento='$entidad_nacimiento',municipio_nacimiento='$municipio_nacimiento',fecha_nacimiento='$fecha_nacimiento',edad='$edad',curp='$curp',calle='$calle',numero=$numero,colonia='$colonia',telefono='$telefono',otro_telefono='$otro_telefono',correo='$correo',localidad='$localidad',municipio_id='$municipio_id',delegacion='$delegacion',cp='$cp',entidad_federativa='$entidad_federativa',jurisdiccion_id='$jurisdiccion_id',tiempo_residencia='$tiempo_residencia',estado_civil='$estado_civil',escolaridad='$escolaridad',ocupacion='$ocupacion',afiliacion='$afiliacion',afiliacion_otro='$afiliacion_otro', modificado = NOW() where id='$id'");
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
$rowJurisdiccion = $mysqli->query("SELECT id, nombre FROM jurisdicciones");
$rowsMunicipio = $mysqli->query("SELECT id, nombre FROM municipios");
$rowsLocalidad = $mysqli->query("SELECT id, nombre FROM localidades");
    ?>
    <br/>
    <form role="form"  method="post">
     
      
  <div class="form-group col-md-3 hidden">
          <label for="cicam_clave">Clave Cicam:</label>
          <input type="text" class="form-control" id="cicam_clave" name="cicam_clave" value="<?php echo $data['cicam_clave'] ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['nombre'] ?>">
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" value="<?php echo $data['apellido_pat'] ?>">
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" value="<?php echo $data['apellido_mat'] ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="entidad_nacimiento">Entidad de nacimiento:</label>
          <select name="entidad_nacimiento" id="entidad_nacimiento" class="form-control" >
            <option value="AS">AGUASCALIENTES</option>
            <option value="BC">BAJA CALIFORNIA NTE.</option>
            <option value="BS">BAJA CALIFORNIA SUR</option>
            <option value="CC">CAMPECHE</option>
            <option value="CL">COAHUILA </option>
            <option value="CM">COLIMA </option>
            <option value="CS">CHIAPAS</option>
            <option value="CH">CHIHUAHUA</option>
            <option value="DF">DISTRITO FEDERAL</option>
            <option value="DG">DURANGO</option>
            <option value="GT">GUANAJUATO</option>
            <option value="GR">GUERRERO</option>
            <option value="HG">HIDALGO</option>
            <option value="JC">JALISCO</option>
            <option value="MC">MEXICO</option>
            <option value="MN">MICHOACAN</option>
            <option value="MS">MORELOS</option>
            <option value="NT">NAYARIT</option>
            <option value="NL">NUEVO LEON</option>
            <option value="OC">OAXACA</option>
            <option value="PL">PUEBLA</option>
            <option value="QT">QUERETARO</option>
            <option value="QR">QUINTANA ROO</option>
            <option value="SP">SAN LUIS POTOSI</option>
            <option value="SL">SINALOA</option>
            <option value="SR">SONORA</option>
            <option value="TC">TABASCO</option>
            <option value="TS">TAMAULIPAS</option>
            <option value="TL">TLAXCALA</option>
            <option value="VZ">VERACRUZ</option>
            <option value="YN">YUCATAN</option>
            <option value="ZS">ZACATECAS</option>
            <option value="SM">SERV. EXTERIOR MEXICANO </option>
            <option value="NE">NACIDO EN EL EXTRANJERO </option>
          </select>
        </div>
        
        <div class="form-group col-md-3">
          <label for="municipio_nacimiento">Municipio de Nacimiento:</label>
          <input type="text" class="form-control" id="municipio_nacimiento" name="municipio_nacimiento" value="<?php echo $data['municipio_nacimiento'] ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $data['fecha_nacimiento'] ?>" onchange="edadCalcular(this.value)">
        </div>

         <div class="form-group col-md-3">
          <label for="edad">Edad:</label>
          <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $data['edad'] ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="curp">Curp:</label>
          <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $data['curp'] ?>">
        </div>

        <div class="form-group col-md-4">
          <label for="calle">Calle:</label>
          <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $data['calle'] ?>">
        </div>

        <div class="form-group col-md-4">
          <label for="numero">Número:</label>
          <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $data['numero'] ?>">
        </div>
        
        <div class="form-group col-md-4">
          <label for="colonia">Colonia:</label>
          <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo $data['colonia'] ?>">
        </div>

        <div class="form-group col-md-4">
          <label for="telefono">Teléfono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $data['telefono'] ?>">
        </div>

        <div class="form-group col-md-4">
          <label for="otro_telefono">Otro Teléfono:</label>
          <input type="tel" class="form-control" id="otro_telefono" name="otro_telefono" value="<?php echo $data['otro_telefono'] ?>">
        </div>
        
        <div class="form-group col-md-4">
          <label for="correo">Correo:</label>
          <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $data['correo'] ?>">
        </div>

       <!-- EMPIEZA SELECTO LOCALIDAD-->
         <div class="form-group col-md-3">
            <label for="municipio_id">Localidad:</label>
            <select name="localidad" class="form-control" >
                <?php foreach ($rowsLocalidad as $key) {
                  if ($key['id']==$data['localidad']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
        <!-- TERMINA SELECT LOCALIDAD-->
        
       <!-- EMPIEZA SELECTO MUNICIPIOS-->
         <div class="form-group col-md-3">
            <label for="municipio_id">Municipio:</label>
            <select name="municipio_id" class="form-control" >
                <?php foreach ($rowsMunicipio as $key) {
                  if ($key['id']==$data['municipio_id']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
        
        <!-- TERMINA SELECT MUNICIPIO-->
        <div class="form-group col-md-3">
          <label for="delegacion">Delegación:</label>
          <input type="text" class="form-control" id="delegacion" name="delegacion" value="<?php echo $data['delegacion'] ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="cp">C.P:</label>
          <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $data['cp'] ?>">
        </div>

                <div class="form-group col-md-3">
          <label for="entidad_federativa">Entidad Federativa:</label>
          <input type="text" class="form-control" id="entidad_federativa" name="entidad_federativa" value="<?php echo $data['entidad_federativa'] ?>">
        </div>
        <!-- COMINEZA SELECT PARA JURISDICCION -->
        <div class="form-group col-md-3">
            <label for="id_jurisdiccion">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
              <option value="-1">Seleccione Jurisdicción</option>
                <?php foreach ($rowJurisdiccion as $key) {
                  if ($key['id']==$data['jurisdiccion_id']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA JURISDICCION -->

        <div class="form-group col-md-3">
          <label for="tiempo_residencia">Tiempo de Residencia:</label>
          <input type="text" class="form-control" id="tiempo_residencia" name="tiempo_residencia" value="<?php echo $data['tiempo_residencia'] ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="estado_civil">Estado Civil:</label>
            <select name="estado_civil" class="form-control">
              <option value="SOLTERO">Solter(a)</option>
              <option value="CASADO">Casad(a)</option>
              <option value="DIVORSIDO">Divorsiad(a)</option>
              <option value="SEPARADO">Separad(a)</option>
              <option value="UNIÓN LIBRE">Unión Libre</option>
              <option value="VIUDO">Viud(a)</option>
            </select>
        </div>

        <div class="form-group col-md-3">
          <label for="escolaridad">Escolaridad:</label>
            <select name="escolaridad" class="form-control">
                  <option value="ANALFABETA">Analfabeta</option>
                  <option value="PRIMARIA">Primaria</option>
                  <option value="SECUNDARIA">Secundaria</option>
                  <option value="PREPARATORIA">Preparatoria</option>
                  <option value="LICENCIATURA">Licenciatura</option>
                  <option value="POSGRADO">Posgrado(a)</option>
          </select>
        </div>
        
        <div class="form-group col-md-3">
          <label for="ocupacion">Ocupación:</label>
          <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $data['ocupacion'] ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="afiliacion">Afiliación:</label>
          <select name="afiliacion" class="form-control">
            <option value="SEGURO POPULAR">Seguro Popular</option>
            <option value="IMSS">IMSS</option>
            <option value="ISSSTE">ISSSTE</option>
            <option value="PEMEX">PEMEX</option>
            <option value="SEDENA LIBRE">SEDENA LIBRE</option>
            <option value="SEMAR">SEMAR</option>
            <option value="IMMS PROSPERA">IMMS PROSPERA</option>
            <option value="NINGUNO">NINGUNO</option>
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="afiliacion_otro">Afilición Otro:</label>
          <input type="text" class="form-control" id="afiliacion_otro" name="afiliacion_otro" value="<?php echo $data['afiliacion_otro'] ?>">
        </div>

       
        <button type="submit" class="btn btn-default" name="submit">Enviar</button>
    </form>
<?php
} else{
  echo "<script>location.href='../index/paciente.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>