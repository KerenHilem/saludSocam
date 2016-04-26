
<?php
    //variables de sesion
    
    if(isset($_POST['submit'])){
      
    //post para paciente
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
      $entidad_federativa   = $_POST['entidad_federativa'];//BAJA CALIFORNIA por default, escondido
      $jurisdiccion_id      = $_POST['jurisdiccion_id'];
      $telefono             = $_POST['telefono'];
      $correo               = $_POST['correo'];
      $tiempo_residencia    = $_POST['tiempo_residencia'];
      $estado_civil         = $_POST['estado_civil'];
      $escolaridad          = $_POST['escolaridad'];
      $ocupacion            = $_POST['ocupacion'];
      $afiliacion           = $_POST['afiliacion'];
      $num_poliza           = $_POST['num_poliza'];//número de afiliación o póliza
      $num_expediente_elect = $_POST['afiliacion_otro'];
      $es_indigena          = $_POST['es_indigena'];
      $grupo_etnico         = $_POST['grupo_etnico'];
      $habla_lengua_indigena= $_POST['habla_lengua_indigena'];
      $cual_lengua          = $_POST['cual_lengua'];

      $calle_contacto       = $_POST['calle_contacto'];
      $numero_calle_contacto= $_POST['numero_calle_contacto'];
      $colonia_contacto     = $_POST['colonia_contacto'];
      $otro_telefono        = $_POST['otro_telefono'];
    
      //verifica si existe el paciente o no
      $existe_paciente = $mysqli->query("SELECT * FROM pacientes WHERE nombre='$nombre'AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' AND fecha_nacimiento='$fecha_nacimiento'");

      if (mysqli_num_rows($existe_paciente)>0) //ya existe el paciente
      {
        $idPaciente = $mysqli->query("SELECT id FROM pacientes WHERE nombre='$nombre'AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' AND fecha_nacimiento='$fecha_nacimiento'");
        $id_paciente = $idPaciente->fetch_assoc();
       
        $idPaciente=$id_paciente['id'];
        echo $idPaciente;

        echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Información! Paciente agregado anteriormente a la base de pacientes.</strong>.
        </div>';
        echo var_dump($idPaciente);
       
      }
       else {//si no existe el paciente lo da de alta en la base de datos
     
        $query=$mysqli->query("INSERT INTO pacientes VALUES('','$cicam_clave', '$nombre', '$apellido_pat', '$apellido_mat', '$entidad_nacimiento', '$municipio_nacimiento', '$fecha_nacimiento', '$edad', '$curp', '$calle', '$numero_calle', '$colonia', '$localidad', '$municipio', '$delegacion', '$cp', '$entidad_federativa', '$jurisdiccion_id', '$telefono', '$calle_contacto', '$numero_calle_contacto', '$colonia_contacto', '$otro_telefono', '$correo', '$tiempo_residencia', '$estado_civil', '$escolaridad', '$ocupacion', '$afiliacion', '$num_poliza', '$afiliacion_otro', '$es_indigena', '$grupo_etnico', '$habla_lengua_indigena', '$cual_lengua', NOW(), NOW())");
        if($query){ //si se dió de alta correctamente

          $idPaciente = $mysqli->query("SELECT id FROM pacientes WHERE nombre='$nombre'AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' AND fecha_nacimiento='$fecha_nacimiento'");
        $id_paciente = $idPaciente->fetch_assoc();
       
        $idPaciente=$id_paciente['id'];
        echo $idPaciente.' paciente nuevo';

        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Paciente Nuevo Añadido.
        </div>
        <?php
      } else{ //si no fue exitosa la alta
        $idPaciente=0;//0 si el paciente no se pudo dar de alta correctamente
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Error, no se pudo dar de alta al paciente!</strong> Error.
        </div>
        <?php
      }
      }

      $edad = $_POST['edad'];// variable global
       
       if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){  
          $unidad_id= $_POST['unidad_id'];
        }
       
      //VARIABLES PARA SECCION VPH
      $tipo_prueba = $_POST['tipo_prueba'];
      $visita = $_POST['visita'];
      $fecha_estudio_anterior = $_POST['fecha_estudio_anterior'];
      $fecha_toma = $_POST['fecha_toma'];
      //Motivo de detección
      $tamizaje = (array) $_POST['tamizaje'];
      $array_tamizaje=implode(', ', $tamizaje);
      $seguimiento = (array) $_POST['seguimiento'];
      $array_seguimiento=implode(', ', $seguimiento);
      $muestra_envio_laboratorio = $_POST['muestra_envio_laboratorio'];
      $motivo_deteccion= $array_tamizaje . ", " . $array_seguimiento;
      //laboratorio
      $muestra_adecuada_analisis = $_POST['muestra_adecuada_analisis'];
      $resultado = $_POST['resultado'];
      $genotipificacion_pcr = $_POST['genotipificacion_pcr'];
      $fecha_analisis = $_POST['fecha_analisis'];
      $fecha_envio = $_POST['fecha_envio_resultado_sicam'];

      //VARIABLES PARA SECCION CITOLOGIA COMPLEMENTARIA
      $tipo_citologia = $_POST['tipo_citologia'];
      $caracteristicas_muestra = $_POST['caracteristicas_muestra'];
      $especificar = $_POST['especificar'];
      $diagnostico_citologico = $_POST['diagnostico_citologico'];
      $otros_hallazgos_citologicos = $_POST['otros_hallazgos'];
      $cedula_citotecnologo = $_POST['cedula_citotecnologo'];
      $muestra_revisada_patologo = $_POST['muestra_revisada_patologo'];
      $diagnostico_patologo = $_POST['diagnostico_patologo'];
      $otros_hallazgos_patologo = $_POST['otros_hallazgos_patologo'];
      $cedula_patologo = $_POST['cedula_patologo'];

      //SECCION PARA EL MONITOREO DE LAS METAS DEL CITOTECNOLOGO Y PATOLOGO
      //variables para metas del citotecnólogo
      $extraerIdCitotecnologo = $mysqli->query("SELECT id FROM personal WHERE cedula='$cedula_citotecnologo'");
      $citotecnologo = $extraerIdCitotecnologo->fetch_assoc();
      $idCitotecnologo=$citotecnologo['id'];
      $mesCitotecnologo=date("n");
      $anoCitotecnologo=date("Y");

      //verifica si existe registro de las metas previas del citotecnologo
       $existe_doctor_citotecnologo = $mysqli->query("SELECT * FROM meta_doctor_citologia WHERE doctor_id='$idCitotecnologo' AND ano='$anoCitotecnologo' AND mes='$mesCitotecnologo'");

       if (mysqli_num_rows($existe_doctor_citotecnologo)>0){//si ya existe una meta
         if($edad>24 && $edad<=35){
           $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango1=rango1+1 WHERE doctor_id = '$idCitotecnologo' AND ano='$anoCitotecnologo' AND mes='$mesCitotecnologo'");
         }else if($edad>=36 && $edad <= 65){
           $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango2=rango2+1 WHERE doctor_id = '$idCitotecnologo' AND ano='$anoCitotecnologo' AND mes='$mesCitotecnologo'");
         }

         if(mysqli_num_rows($actualizar)>0){
         echo '<div class="alert alert-success alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Felicidades!</strong> Doctor se le ha añadido una meta más de Cítología.
         </div>';
          }else{
         echo '<div class="alert alert-danger alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Error, no se pudo añadir meta de citología!</strong> Error.
         </div>';
          }
        
       }else {//si no existe registro de metas previas del citotecnologo
         if($edad>=24 && $edad<=35){
         $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$idCitotecnologo','$unidad_id' ,'$anoCitotecnologo', '$mesCitotecnologo', '1', '0', '0', NOW(), NOW())");
          }else if($edad>=36 && $edad <= 65){
           $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$idCitotecnologo','$unidad_id' ,'$anoCitotecnologo', '$mesCitotecnologo', '0', '1', '0', NOW(), NOW())");
         }else{//si la edad de la paciente no entra dentro del rango, despliega mensaje
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Error, la edad de la paciente no entra en el rango para metas de citología!</strong> Error.
            </div>';  
         }

         if(mysqli_num_rows($crearRegistro)>0){
            echo '<div class="alert alert-success alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Felicidades!</strong> Doctor se le ha creado una nueva meta de Cítología.
            </div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Error, no se pudo dar de alta la meta de citología!</strong> Error.
            </div>';
          }
         
       }

      //variables para metas del patologo
      $extraerIdPatologo = $mysqli->query("SELECT id FROM personal WHERE cedula='$cedula_patologo'");
      $patologo = $extraerIdPatologo->fetch_assoc();
      $idPatologo=$patologo['id'];
      $mesPatologo=date("n");
      $anoPatologo=date("Y");

      //verifica si existe registro de las metas previas del patologo
      $existe_doctor_patologo = $mysqli->query("SELECT * FROM meta_doctor_vph WHERE doctor_id='$idPatologo' AND ano='$anoPatologo' AND mes='$mesPatologo'");

      if (mysqli_num_rows($existe_doctor_patologo)>0)//si ya existe una meta
      {
        if($edad>=25 && $edad<=64){
          $actualizar = $mysqli->query("UPDATE meta_doctor_vph SET rango=rango+1 WHERE doctor_id = '$idPatologo' AND ano='$anoPatologo' AND mes='$mesPatologo'");
        }
        if(mysqli_num_rows($actualizar)>0){
          echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Felicidades!</strong> Doctor se le ha añadido una meta más de VPH.
        </div>';
        }  
      }
       else {//si no existe registro de metas previas del patologo
        if($edad>=25 && $edad<=64){
        $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_vph VALUES('', '$idPatologo','$unidad_id' ,'$anoPatologo', '$mesPatologo', '1', '0', '0', NOW(), NOW())");
         }
         if(mysqli_num_rows($crearRegistro)>0){
            echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Felicidades!</strong> Doctor se le ha creado una nueva meta de VPH.
            </div>';
        }
      }
      //Sección para el monitoreo de metas de la unidad (REVISAR CON VERONICA)
      // $existe_meta_unidad = $mysqli->query("SELECT * FROM meta_unidad_vph WHERE unidad_id='$unidad_id' AND ano=$anoPatologo AND mes=$mesPatologo");

      // if (mysqli_num_rows($existe_meta_unidad)>0)
      // {
      //   if($edad>=24 && $edad<=64){
      //     $actualizar = $mysqli->query("UPDATE meta_unidad_vph SET rango=rango+1 WHERE unidad_id = '$unidad_id'");
      //   }
      // }
      //  else {
      //   echo '<div class="alert alert-success alert-dismissible" role="alert">
      //     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      //     <strong>Éxito!</strong> se acaba de crear una nueva meta para unidad.
      //   </div>';
      //    if($edad>=24 && $edad<=35){
      //   $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '1', '0', '0', NOW(), NOW())");
      //    }else if($edad>=36 && $edad <= 65){
      //     $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '0', '1', '0', NOW(), NOW())");
      //   }
      // }
        
      //QUERY PARA INSERTAR VPH A LA BASE DE DATOS
      echo 'antes de insertar a la tabla vph id de paciente:'. $idPaciente;
      $query = $mysqli->query("INSERT INTO vph VALUES('', '$unidad_id', '$idPaciente', '$tipo_prueba', '$visita', '$fecha_estudio_anterior', '$fecha_toma', '$motivo_deteccion', '$muestra_envio_laboratorio', '$muestra_adecuada_analisis', '$resultado', '$genotipificacion_pcr', '$fecha_analisis', '$fecha_envio_resultado_sicam','PENDIENTE', NOW(), NOW())");  


   if($query){//si el vph se insertó con éxito
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> VPH agregado a la unidad.
        </div>
        <?php

        //obtener id de vph actual para uso posterior
   $idVph = $mysqli->query("SELECT id from vph WHERE unidad_id='$unidad_id' AND paciente_id='$idPaciente' AND tipo_prueba='$tipo_prueba' AND visita='$visita' AND fecha_estudio_anterior='$fecha_estudio_anterior' AND fecha_toma='$fecha_toma' AND motivo_deteccion='$motivo_deteccion' AND muestra_envio_laboratorio='$muestra_envio_laboratorio' AND muestra_adecuada_analisis='$muestra_adecuada_analisis' AND resultado='$resultado' AND genotipificacion_pcr='$genotipificacion_pcr' AND fecha_analisis='$fecha_analisis' AND fecha_envio_resultado_sicam='$fecha_envio_resultado_sicam'");
   echo $idVph;
   echo 'valor de vpd su id: para optener su id actual uso posterior:'.$idVph;

      } else{//si no se insertó con éxito
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Error al agregar VPH.
        </div>
        <?php

        $idVph=0;
        echo 'valor de vpd su id: para optener su id actual uso posterior:'.$idVph;
      }
    }

    //USO POSTERIOR
      $establecerFecha = $mysqli->query("INSERT INTO envios_fechas_vph VALUES ('', '$idVph', NOW(),NULL, NULL,NULL,NULL)");

      if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }
      else if($_SESSION['nivel']==2 || $_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
    }

     $unidadesDatos = $mysqli->query("SELECT unidades.nombre, unidades.clues, municipios.nombre AS municipios_nombre, jurisdicciones.nombre AS jurisdicciones_nombre FROM unidades, jurisdicciones, municipios WHERE unidades.id='$unidad_id' AND jurisdicciones.id=unidades.jurisdiccion_id AND jurisdicciones.municipio_id=municipios.id");
      
      $dataUnidad = $unidadesDatos->fetch_assoc();

      $rowsJurisdiccion     = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
      $rowsMunicipio        = $mysqli->query("SELECT id, nombre FROM municipios ORDER by nombre");
      $rowsLocalidad        = $mysqli->query("SELECT id, nombre FROM localidades ORDER by nombre");
      
      if($_SESSION['nivel']==1){
          $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }else  if($_SESSION['nivel']==2){
         $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
       }


    ?>

