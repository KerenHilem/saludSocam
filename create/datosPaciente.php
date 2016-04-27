      <?php
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
      $numero_calle         = $_POST['numero_calle'];
      $colonia              = $_POST['colonia'];
      $localidad            = $_POST['localidad'];
      $municipio            = $_POST['municipio_id'];
      $delegacion           = $_POST['delegacion'];
      $cp                   = $_POST['cp'];
      $entidad_federativa   = $_POST['entidad_federativa'];
      $jurisdiccion_id      = $_POST['jurisdiccion_id'];
      $telefono             = $_POST['telefono'];
      $calle_contacto       = $_POST['calle_contacto'];
      $numero_calle_contacto= $_POST['numero_calle_contacto'];
      $colonia_contacto     = $_POST['colonia_contacto'];
      $otro_telefono        = $_POST['otro_telefono'];
      $correo               = $_POST['correo'];
      $tiempo_residencia    = $_POST['tiempo_residencia'];
      $estado_civil         = $_POST['estado_civil'];
      $escolaridad          = $_POST['escolaridad'];
      $ocupacion            = $_POST['ocupacion'];
      $afiliacion           = $_POST['afiliacion'];
      $afiliacion_otro      = $_POST['afiliacion_otro'];
      $num_poliza           = $_POST['num_poliza'];
      $es_indigena          = $_POST['es_indigena'];
      $grupo_etnico         = $_POST['grupo_etnico'];
      $habla_lengua_indigena= $_POST['habla_lengua_indigena'];
      $cual_lengua          = $_POST['cual_lengua'];
      $es_indigena          = $_POST['es_indigena'];

      $existe_paciente = $mysqli->query("SELECT * FROM pacientes WHERE nombre='$nombre'AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' AND fecha_nacimiento='$fecha_nacimiento'");
      
      if (mysqli_num_rows($existe_paciente)>0){//si existe el paciente
        echo '<div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Información! Paciente agregado anteriormente a la base de pacientes.</strong>.
        </div>';
      }else {//sino lo agrega a la base de datos
        $query=$mysqli->query("INSERT INTO pacientes VALUES('','$cicam_clave', '$nombre', '$apellido_pat', '$apellido_mat', '$entidad_nacimiento', '$municipio_nacimiento', '$fecha_nacimiento', '$edad', '$curp', '$calle', '$numero_calle', '$colonia', '$localidad', '$municipio', '$delegacion', '$cp', '$entidad_federativa', '$jurisdiccion_id', '$telefono', '$calle_contacto', '$numero_calle_contacto', '$colonia_contacto', '$otro_telefono', '$correo', '$tiempo_residencia', '$estado_civil', '$escolaridad', '$ocupacion', '$afiliacion', '$num_poliza', '$afiliacion_otro', '$es_indigena', '$grupo_etnico', '$habla_lengua_indigena', '$cual_lengua', NOW(), NOW())");
        if($query){//si el paciente se agregó correctamente despliega mensaje
        echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Paciente Nuevo Añadido.
        </div>';
      } else{//sino se agregó correctamente despliega mensaje de error
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Ya existia el usuario pero se agrego al registro de Citología!</strong> Error.
        </div>';
      }
    }
    ?>