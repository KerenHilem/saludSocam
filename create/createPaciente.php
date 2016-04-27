  <?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php"); 
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Paciente</h3> </div>
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
      $municipio            = $_POST['municipio_id'];
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
      $num_poliza           = $_POST['num_poliza'];


      $existe_paciente = $mysqli->query("SELECT * FROM pacientes WHERE nombre='$nombre'AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' AND fecha_nacimiento='$fecha_nacimiento'");

      if (mysqli_num_rows($existe_paciente)>0)
      {
        // echo 'Exite al menos un registro';
        
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Ya Existe el Paciente Verique los Datos!</strong> Error.
              </div>';
       
      }
       else {
        // echo ' No existe, crear registro ';
       
        $query = $mysqli->query("insert into pacientes values('','$cicam_clave','$nombre','$apellido_pat','$apellido_mat','$entidad_nacimiento','$municipio_nacimiento','$fecha_nacimiento','$edad', '$curp', '$calle', '$numero', '$colonia', '$telefono', '$otro_telefono', '$correo', '$localidad', '$municipio', '$delegacion', '$cp', '$entidad_federativa', '$jurisdiccion_id', '$tiempo_residencia', '$estado_civil', '$escolaridad', '$ocupacion', '$afiliacion','$num_poliza', '$afiliacion_otro', NOW(), NOW())");
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
          <strong>Se produjo un error en la base de datos!</strong> Error.
        </div>
        <?php
      }
      }//
    }
      $rowsJurisdiccion     = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
      $rowsMunicipio        = $mysqli->query("SELECT id, nombre FROM municipios ORDER by nombre");
      // $rowsLocalidad        = $mysqli->query("SELECT id, nombre FROM localidades ORDER by nombre");
    ?>

  <form role="form"  method="post">
     
        <div class="form-group col-md-3 hidden">
          <label for="cicam_clave">Clave Cicam:</label>
          <input type="text" class="form-control" id="cicam_clave" name="cicam_clave" placeholder="">
        </div>
        <div class="form-group col-md-3">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Juan" required>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" placeholder="Ej. Ruíz" required>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" placeholder="Ej. Jaramillo" required>
        </div>

        <div class="form-group col-md-3">
          <label for="entidad_nacimiento">Entidad de nacimiento:</label>
          <select name="entidad_nacimiento" id="entidad_nacimiento" class="form-control" >
            <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option>
            <option value="AGUASCALIENTES">AGUASCALIENTES</option>
            <option value="BAJA CALIFORNIA NORTE" selected>BAJA CALIFORNIA NTE.</option>
            <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
            <option value="CAMPECHE">CAMPECHE</option>
            <option value="COAHUILA">COAHUILA </option>
            <option value="COLIMA">COLIMA </option>
            <option value="CHIAPAS">CHIAPAS</option>
            <option value="CHIHUAHUA">CHIHUAHUA</option>
            <option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
            <option value="DURANGO">DURANGO</option>
            <option value="GUANAJUATO">GUANAJUATO</option>
            <option value="GUERRERO">GUERRERO</option>
            <option value="HIDALGO">HIDALGO</option>
            <option value="JALISCO">JALISCO</option>
            <option value="MEXICO">MEXICO</option>
            <option value="MICHOACAN">MICHOACAN</option>
            <option value="MORELOS">MORELOS</option>
            <option value="NAYARIT">NAYARIT</option>
            <option value="NUEVO LEON">NUEVO LEÓN</option>
            <option value="OAXACA">OAXACA</option>
            <option value="PUEBLA">PUEBLA</option>
            <option value="QUERETARO">QUERETARO</option>
            <option value="QUINTANA ROO">QUINTANA ROO</option>
            <option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
            <option value="SINALOA">SINALOA</option>
            <option value="SONORA">SONORA</option>
            <option value="TABASCO">TABASCO</option>
            <option value="TAMAULIPAS">TAMAULIPAS</option>
            <option value="TLAXCALA">TLAXCALA</option>
            <option value="VERACRUZ">VERACRUZ</option>
            <option value="YUCATAN">YUCATAN</option>
            <option value="ZACATECAS">ZACATECAS</option>
            <option value="SERV. EXTERIOR MEXICANO">SERV. EXTERIOR MEXICANO </option>
            <option value="NACIDO EN EL EXTRANJERO">NACIDO EN EL EXTRANJERO </option>
          </select>
        </div>
        
        <div class="form-group col-md-3">
          <label for="municipio_nacimiento">Municipio de Nacimiento:</label>
          <input type="text" class="form-control" id="municipio_nacimiento" name="municipio_nacimiento" placeholder="MEXICALI" required>
        </div>

        <div class="form-group col-md-3">
          <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" onchange="edadCalcular(this.value)">
        </div>

        <div class="form-group col-md-3">
          <label for="edad">Edad:</label>
          <input type="number" class="form-control" id="edad" name="edad" >
        </div>

        <div class="form-group col-md-3">
          <label for="curp">Curp:</label>
          <input type="text" class="form-control" id="curp" name="curp" placeholder="" required>
        </div>

        <div class="form-group col-md-4">
          <label for="calle">Calle:</label>
          <input type="text" class="form-control" id="calle" name="calle" placeholder="Río Chico">
        </div>

        <div class="form-group col-md-4">
          <label for="numero">Número:</label>
          <input type="number" class="form-control" min="0" id="numero" name="numero" placeholder="SIN NUMERO">
        </div>
        
        <div class="form-group col-md-4">
          <label for="colonia">Colonia:</label>
          <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Ej. Insurgentes Este" required>
        </div>

        <div class="form-group col-md-4">
          <label for="telefono">Teléfono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ej. 68662272024" required>
        </div>

        <div class="form-group col-md-4">
          <label for="otro_telefono">Otro Teléfono:</label>
          <input type="tel" class="form-control" id="otro_telefono" name="otro_telefono" placeholder="Ej. 68662272024">
        </div>
        
        <div class="form-group col-md-4">
          <label for="correo">Correo:</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej. Juan21@gmail.com">
        </div>

      <!-- COMINEZA SELECT PARA LOCALIDAD -->
        <div class="form-group col-md-3 hidden">
            <label for="localidad">Localidad:</label>
            <select name="localidad" class="form-control" >
              <option value="29">SELECCIONE OPCION</option>
               
            </select>
        </div>
      <!-- FIN DEL SELECT PARA LOCALIDAD -->
        
      <!-- EMPIEZA SELECTO MUNICIPIOS-->
        <div class="form-group col-md-3">
            <label for="municipio_id">Municipio:</label>
            <select name="municipio_id" class="form-control" >
                <?php foreach ($rowsMunicipio as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- TERMINA SELECT MUNICIPIO-->

        <div class="form-group col-md-3">
          <label for="delegacion">Delegación:</label>
          <input type="text" class="form-control" id="delegacion" name="delegacion" placeholder="Ej. Estación Delta" required>
        </div>

        <div class="form-group col-md-3">
          <label for="cp">C.P:</label>
          <input type="number" class="form-control" min="0" id="cp" name="cp" value="NO CAPTURADO" >
        </div>

        <div class="form-group col-md-3">
          <label for="entidad_federativa">Entidad Federativa (Estado):</label>
            <select name="entidad_federativa" id="entidad_federativa" class="form-control" >
            <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option>
            <option value="AGUASCALIENTES">AGUASCALIENTES</option>
            <option value="BAJA CALIFORNIA NORTE" selected>BAJA CALIFORNIA NTE.</option>
            <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
            <option value="CAMPECHE">CAMPECHE</option>
            <option value="COAHUILA">COAHUILA </option>
            <option value="COLIMA">COLIMA </option>
            <option value="CHIAPAS">CHIAPAS</option>
            <option value="CHIHUAHUA">CHIHUAHUA</option>
            <option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
            <option value="DURANGO">DURANGO</option>
            <option value="GUANAJUATO">GUANAJUATO</option>
            <option value="GUERRERO">GUERRERO</option>
            <option value="HIDALGO">HIDALGO</option>
            <option value="JALISCO">JALISCO</option>
            <option value="MEXICO">MEXICO</option>
            <option value="MICHOACAN">MICHOACAN</option>
            <option value="MORELOS">MORELOS</option>
            <option value="NAYARIT">NAYARIT</option>
            <option value="NUEVO LEON">NUEVO LEÓN</option>
            <option value="OAXACA">OAXACA</option>
            <option value="PUEBLA">PUEBLA</option>
            <option value="QUERETARO">QUERETARO</option>
            <option value="QUINTANA ROO">QUINTANA ROO</option>
            <option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
            <option value="SINALOA">SINALOA</option>
            <option value="SONORA">SONORA</option>
            <option value="TABASCO">TABASCO</option>
            <option value="TAMAULIPAS">TAMAULIPAS</option>
            <option value="TLAXCALA">TLAXCALA</option>
            <option value="VERACRUZ">VERACRUZ</option>
            <option value="YUCATAN">YUCATAN</option>
            <option value="ZACATECAS">ZACATECAS</option>
          </select>
        </div>

        
      <!-- COMINEZA SELECT PARA JURISDICCION -->
        
        <div class="form-group col-md-3">
            <label for="jurisdiccion_id">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
                <?php foreach ($rowsJurisdiccion as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>

      <!-- FIN DEL SELECT PARA JURISDICCION -->

        <div class="form-group col-md-3">
          <label for="tiempo_residencia">Tiempo de Residencia:</label>
          <input type="number" class="form-control" id="tiempo_residencia" min="0" name="tiempo_residencia" value="1" required>
        </div>

        <div class="form-group col-md-3">
          <label for="estado_civil">Estado Civil:</label>
          <select name="estado_civil" class="form-control">
            <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option>
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
                  <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option>
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
          <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="NO CAPTURADO" >
        </div>

        <div class="form-group col-md-3">
          <label for="afiliacion">Afiliación:</label>
          <select name="afiliacion" class="form-control">
            <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option>
            <option value="SEGURO POPULAR">Seguro Popular(a)</option>
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
          <label for="num_poliza">Número de Afiliación o Poliza:</label>
          <input type="number" class="form-control" id="num_poliza" name="num_poliza" min="0" value="NO CAPTURADO" >
        </div>

        <div class="form-group col-md-3">
          <label for="afiliacion_otro">Afilición Otro:</label>
          <input type="text" class="form-control" id="afiliacion_otro" name="afiliacion_otro" value="NO CAPTURADO">
        </div>

       
        <button type="submit" class="btn btn-default col-md-3" name="submit">Enviar</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>