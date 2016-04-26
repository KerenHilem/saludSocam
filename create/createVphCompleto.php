<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
 	  <h2 class="col-md-12">Administración Nivel Unidad</h2>
      <div class="col-md-10"> <h3>Agregar VPH</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/vph.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
  </div>
</div>
<?php
    //variables de sesion
      $jurisdiccion=$_SESSION['jurisdiccion'];//consultar datos de unidades
      $unidad_id=$_SESSION['unidad_id']; //id que se guarda en citología, a su vez sirve para filtrar busquedas
      $idPaciente; //pendiente de obtener
      $idVph;//pendiente de obtener
    
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

    <!-- COMIENZA FORMULARIO VPH -->
    <div class="page-header col-md-12">
      <h2><span class="label label-default">I. Identificación de la Unidad</span></h2>
    </div>

    <form role="form"  method="post">
    <?php  
    if($_SESSION['nivel']==1|| $_SESSION['nivel']==2){
        echo ' <div class="form-group col-md-4 col-xs-6">
                     <label for="unidad_id">Unidad:</label>
                     <select name="unidad_id" class="form-control" id="unidad_id">';
                 foreach ($rowsUnidad as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }
           echo '</select>
                    </div>';
        }
     ?>
    <?php  
    if($_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      echo '<div class="form-group col-md-4 col-xs-6">';
      echo '<label for="">Nombre:</label>';
      echo  '<input type="text" class="form-control" id="" name="" value="'.$dataUnidad['nombre']; echo '"readonly>
       </div>';
    }
    ?>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">CLUES:</label>
      <input type="text" class="form-control" id="clues" name="clues" value="<?php echo $dataUnidad['clues'] ?>" readonly>
    </div>
       
    <div class="form-group col-md-4 col-xs-6">
      <label for="">Institución:</label>
      <input type="text" class="form-control" id="" name="" value="SSA" readonly>
    </div>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">Entidad/Delegación:</label>
      <input type="text" class="form-control" id="" name="" value="Baja California" readonly>
    </div>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">Jurisdicción:</label>
      <input type="text" class="form-control" id="jurisdicciones_nombre" name="jurisdicciones_nombre" value="<?php echo $dataUnidad['jurisdicciones_nombre'] ?>" readonly>
    </div>

    <div class="form-group col-md-4 col-xs-6">
      <label for="">Municipio:</label>
      <input type="text" class="form-control" id="municipios_nombre" name="municipios_nombre" value="<?php echo $dataUnidad['municipios_nombre'] ?>" readonly>
    </div>
    
    <div class="page-header col-md-12">
      <h2><span class="label label-default">II. Identificación del Paciente</span></h2>
    </div>

    <div class="form-group col-md-3 hidden">
      <label for="cicam_clave">Clave Cicam:</label>
      <input type="text" class="form-control" id="cicam_clave" name="cicam_clave" placeholder="">
    </div>
     
    <div class="form-group col-md-3">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-3">
      <label for="apellido_pat">Apellido Paterno:</label>
      <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" onKeyUp="this.value=this.value.toUpperCase();" required>
    </div>

    <div class="form-group col-md-3">
      <label for="apellido_mat">Apellido Materno:</label>
      <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" onKeyUp="this.value=this.value.toUpperCase();" required>
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
      <input type="text" class="form-control" id="municipio_nacimiento" name="municipio_nacimiento" placeholder="MEXICALI" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-3">
      <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" onchange="edadCalcular(this.value)" required>
    </div>

    <div class="form-group col-md-3">
      <label for="edad">Edad:</label>
      <input type="number" class="form-control" id="edad" name="edad" readonly>
    </div>

    <div class="form-group col-md-3">
      <label for="curp">Curp:</label>
      <input type="text" class="form-control" id="curp" name="curp" value="NO CAPTURADO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>
  
    <div class="page-header col-md-12">
      <h3>Domicilio del paciente</h3>
    </div>
    
    <div class="form-group col-md-3">
      <label for="calle">Calle:</label>
      <input type="text" class="form-control" id="calle" name="calle" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-3">
      <label for="numero_calle">Número:</label>
      <input type="number" class="form-control" min="0" id="numero_calle" name="numero_calle">
    </div>
        
    <div class="form-group col-md-3">
      <label for="colonia">Colonia:</label>
      <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Ej. Insurgentes Este"  onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <!-- COMINEZA SELECT PARA LOCALIDAD --> 
    <div class="form-group col-md-3">
      <label for="localidad">Localidad:</label>
       <!--  <select name="localidad" class="form-control" > -->
            <?php /*foreach ($rowsLocalidad as $key) {
              if($key['nombre']== 'NINGUNA LOCALIDAD'){
                echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                }
                else {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                  }
            }*/?>
        <!-- </select>     -->
        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Escribe localidad si no existe dejar en blanco" required onKeyUp="this.value=this.value.toUpperCase();">
    </div>
    <!-- FIN DEL SELECT PARA LOCALIDAD -->
        
    <!-- EMPIEZA SELECTO MUNICIPIOS-->
    <div class="form-group col-md-3">
      <label for="municipio_id">Municipio:</label>
        <select name="municipio_id" class="form-control">
                <?php foreach ($rowsMunicipio as $key) {
                  if ($key['nombre']=='TIJUANA') {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else {
                    echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                  }
                }?>
        </select>
    </div>
    <!-- TERMINA SELECT MUNICIPIO-->

    <div class="form-group col-md-3">
      <label for="delegacion">Delegación:</label>
 <!--      <input type="text" class="form-control" id="delegacion" name="delegacion" onKeyUp="this.value=this.value.toUpperCase();"> -->
      <select name="delegacion" id="delegacion" class="form-control" >
          <option value="Centro">1. Centro</option>
          <option value="Otay Centenario">2. Otay Centenario</option>
          <option value="Playas de Tijuana">3. Playas de Tijuana</option>
          <option value="La Mesa">4. La Mesa</option>
          <option value="San Antonio de los Buenos">5. San Antonio de los Buenos</option>
          <option value="Sánchez Taboada">6. Sánchez Taboada</option>
          <option value="Cerro Colorado">7. Cerro Colorado</option>
          <option value="La Presa">8. La Presa</option>
          <option value="La Presa Rural">9. La Presa Rural</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="cp">C.P:</label>
      <input type="number" class="form-control" min="0" id="cp" name="cp" value="21700" >
    </div>

    <!-- Entidad Federativa BAJA CALIFORNIA por default-->
    <div class="form-group col-md-3 hidden">
      <label for="entidad_federativa">Entidad Federativa (Estado):</label>
        <select name="entidad_federativa" id="entidad_federativa" class="form-control" >
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
                  if($key['id']==$jurisdiccion){
                  echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                }else{
                    echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }
              }
                ?>
      </select>
    </div>
    <!-- FIN DEL SELECT PARA JURISDICCION -->
    
    <div class="form-group col-md-3">
      <label for="telefono">Teléfono:</label>
      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ej. 68662272024" >
    </div>

    <div class="form-group col-md-3">
      <label for="correo">Correo Eléctronico:</label>
      <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej. correo@gmail.com">
    </div>
    
    <div class="form-group col-md-3">
      <label for="tiempo_residencia">Tiempo de Residencia años:</label>
      <input type="number" class="form-control" id="tiempo_residencia" min="0" name="tiempo_residencia" value="1" >
    </div>

    <div class="form-group col-md-3">
      <label for="estado_civil">Estado Civil:</label>
      <select name="estado_civil" class="form-control">
      <!--   <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
        <option value="SOLTERO">Solter(a)</option>
        <option value="CASADO">Casad(a)</option>
        <option value="DIVORSIADO">Divorsiad(a)</option>
        <option value="SEPARADO">Separad(a)</option>
        <option value="UNIÓN LIBRE">Unión Libre</option>
        <option value="VIUDO">Viud(a)</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="escolaridad">Escolaridad:</label>
      <select name="escolaridad" class="form-control">
      <!-- <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
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
      <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="NO CAPTURADO"  onKeyUp="this.value=this.value.toUpperCase();">
     </div>

     <div class="form-group col-md-3">
        <label for="afiliacion">Afiliación:</label>
        <select name="afiliacion" class="form-control">
        <!--  <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
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
      <label for="afiliacion_otro">Número de Expediente Eléctronico:</label>
      <input type="text" class="form-control" id="afiliacion_otro" name="afiliacion_otro" value="NO CAPTURADO">
    </div>

    <div class="form-group col-md-3">
      <label for="es_indigena">¿Es Indígena?</label>
      <select name="es_indigena" class="form-control">
          <option value="SI">SI</option>
          <option value="NO" selected>NO</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="grupo_etnico">Grupo Étnico:</label>
      <input type="text" class="form-control" id="grupo_etnico" name="grupo_etnico" value="NINGUNO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-3">
      <label for="habla_lengua_indigena">¿Habla Lengua Indígena?</label>
      <select name="habla_lengua_indigena" class="form-control">
          <option value="SI">SI</option>
          <option value="NO" selected>NO</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="cual_lengua">¿Cúal Lengua Indígena?</label>
      <input type="text" class="form-control" id="cual_lengua" name="cual_lengua" value="NINGUNO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>
        
    <div class="page-header col-md-12">
      <h3>Domicilio de Contacto</h3>
    </div>
        
    <div class="form-group col-md-4">
      <label for="calle_contacto">Calle:</label>
      <input type="text" class="form-control" id="calle_contacto" name="calle_contacto" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-4">
      <label for="numero_calle_contacto">Número:</label>
      <input type="number" class="form-control" min="0" id="numero_calle_contacto" name="numero_calle_contacto" placeholder="SIN NUMERO">
    </div>
        
    <div class="form-group col-md-4">
      <label for="colonia_contacto">Colonia:</label>
      <input type="text" class="form-control" id="colonia" name="colonia_contacto" placeholder="Ej. Insurgentes Este"  onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <div class="form-group col-md-4">
      <label for="otro_telefono">Otro Teléfono:</label>
      <input type="tel" class="form-control" id="otro_telefono" name="otro_telefono">
    </div>
    <!-- FIN DEL SELECT PARA PACIENTE -->

   <!--  INICIA BLOQUE PARA VPH -->
<div class="page-header col-md-12">
      <h2><span class="label label-default">III. Biología molecular para la detección del Virus del Papiloma Humano</span></h2>
    </div>
    <!-- Seccion Jurisdiccion -->
    <div class="page-header col-md-12">
      <h3>IIIa. Jurisdicción</h3>
    </div>
    <!-- Tipo de prueba -->
    <div class="form-group col-md-6">
      <label for="tipo_prueba">Tipo de prueba:</label>
      <select name="tipo_prueba" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Captura de híbridos">1. Captura de híbridos</option>
        <option value="PCR">2. PCR</option>
        <option value="Prueba rápida">3. Prueba rápida</option>
      </select>
    </div>
    <!-- Visita -->
    <div class="form-group col-md-6">
      <label for="visita">Visita:</label>
      <select name="visita" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="1era">1. 1era</option>
        <option value="Subsecuente">2. Subsecuente</option>
        <option value="Primera vez después de 5 años">3. Primera vez después de 5 años</option>
      </select>
    </div>
    <!-- Fecha de estudio anterior -->
    <div class="form-group col-md-6">
      <label for="fecha_estudio_anterior">Fecha de estudio anterior:</label>
      <input type="date" name="fecha_estudio_anterior" class="form-control" value="<?php echo date('Y-m-d');?>" ></input>
    </div>
    <!-- Fecha de toma -->
    <div class="form-group col-md-6">
      <label for="fecha_toma">Fecha de toma:</label>
      <input type="date" name="fecha_toma" class="form-control" value="<?php echo date('Y-m-d');?>"></input>
    </div>
    <!-- Motivo de detección -->
    <div class="form-group col-md-12">
      <label for="motivo_deteccion">Motivo de detección</label>
    </div>
     <div class="form-group col-md-6">
      <label for="tamizaje">Tamizaje:</label>
    </div>
    <div class="form-group col-md-6">
      <label for="seguimiento">Seguimiento:</label>
    </div>
    <div class="form-group col-md-6">
      <input type="checkbox" name="tamizaje[]" value="invitacion_organizada">11. Invitación organizada</input><br>
      <input type="checkbox" name="tamizaje[]" value="derivada_personal_salud">12. Derivada por personal de salud</input><br>
      <input type="checkbox" name="tamizaje[]" value="espontanea">13. Espontánea (de la mujer)</input>
    </div>
    <div class="form-group col-md-6">
      <input type="checkbox" name"seguimiento[]" value="vph_positivo_previo">14. VPH positivo previo</input><br>
      <input type="checkbox" name"seguimiento[]" value="ascus_lei">15. ASCIS o LEI (Lesión precursora)</input><br>
      <input type="checkbox" name"seguimiento[]" value="control_cancer">16. Control de Cáncer</input>
    </div>
    <!-- Muestra para envio al laboratorio -->
    <div class="form-group col-md-6">
      <label for="muestra_envio_laboratorio">Muestra para envio al laboratorio:</label>
      <input type="text" name="muestra_envio_laboratorio" class="form-control"></input>
    </div>
    <!-- Seccion Laboratorio -->
    <div class="page-header col-md-12">
      <h3>IIIb. Laboratorio</h3>
    </div>
    <!-- Muestra adecuada para analisis -->
    <div class="form-group col-md-6">
      <label for="muestra_adecuada_analisis">Muestra adecuada para análisis:</label>
      <input type="text" name="muestra_adecuada_analisis" class="form-control"></input>
    </div>
    <!-- Resultado -->
    <div class="form-group col-md-6">
      <label for="resultado">Resultado:</label>
      <select name="resultado" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Negativo">1. Negativo</option>
        <option value="Positivo">2. Positivo</option>
        <option value="Inválida por nula presencia de BETA-GLOBINA">3. Inválida por nula presencia de BETA-GLOBINA</option>
      </select>
    </div>
    <!-- Genotipificación PCR -->
    <div class="form-group col-md-6">
      <label for="genotipificacion_pcr">Genotipificación PCR:</label>
      <select name="genotipificacion_pcr" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Genotipo 16">1. Genotipo 16</option>
        <option value="Genotipo 18">2. Genotipo 18</option>
        <option value="Pool de alto riesgo">3. Pool de alto riesgo</option>
        <option value="Genotipo 16 + pool">4. Genotipo 16 + pool</option>
        <option value="Genotipo 18 + pool">5. Genotipo 18 + pool</option>
        <option value="Genotipo 16, 18 + pool">6. Genotipo 16, 18 + pool</option>
        <option value="Genotipo 16 y 18">7. Genotipo 16 y 18</option>
      </select>
    </div>
    <!-- Fecha de análisis -->
    <div class="form-group col-md-6">
      <label for="fecha_analisis">Fecha de análisis:</label>
      <input type="date" name="fecha_analisis" class="form-control" value="<?php echo date('Y-m-d');?>"></input>
    </div>
    <!-- Fecha de envio de resultado al SICAM -->
    <div class="form-group col-md-6">
      <label for="fecha_envio_resultado_sicam">Fecha de envio de resultado al SICAM:</label>
      <input type="date" name="fecha_envio_resultado_sicam" class="form-control" value="<?php echo date('Y-m-d');?>"></input>
    </div>
    <!-- TERMINA BLOQUE PARA VPH -->


    <!-- COMINEZA BLOQUE CITOLOGIA COMPLEMENTARIA -->
    <div class="page-header col-md-12">
      <h2><span class="label label-default">IV. Citología complementaria</span></h2>
    </div>
    <div class="form-group col-md-6">
      <label for="tipo_citologia">Tipo de citología:</label>
      <select name="tipo_citologia" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Citología base líquida">1. Citología base líquida</option>
        <option value="Citología convencional (PAP)">2. Citología convencional (PAP)</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="caracteristicas_muestra">Características de la muestra:</label>
      <select name="caracteristicas_muestra" class="form-control">
      <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
        <option value="Adecuada para evaluación">1. Adecuada para evaluación</option>
        <option value="Inadecuada para evaluación y rechazada">2. Inadecuada para evaluación y rechazada</option>
        <option value="Procesada pero insatisfactoria para evaluación">3. Procesada pero insatisfactoria para evaluación</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="especificar">Especificar:</label>
      <input type="text" name="especificar" class="form-control"></input>
    </div>
    <!-- Seccion CITOLOGO -->
    <div class="page-header col-md-12">
      <h3>Diagnóstico del Citólogo</h3>
    </div>
    
    <div class="form-group col-md-6">
      <label for="diagnostico_citologico">Diagnóstico citológico:</label>
         <select name="diagnostico_citologico" class="form-control" >
          <option value="Negativa para lesión intraepitelial o malignidad">1. Negativa para lesión intraepitelial o malignidad</option>
          <option value="Células escamosas atípicas de signicado indeterminado (ASC-US)">2. Células escamosas atípicas de signicado indeterminado (ASC-US)</option>
          <option value="Células escamosas atípicas, no se puede descartar lesión intraepitelial escamosa de alto grado (ASC-H)">3.  Células escamosas atípicas, no se puede descartar lesión intraepitelial escamosa de alto grado (ASC-H)</option>
          <option value="Lesión escamosa intraepitelial de bajo grado (VPH, displasia leve, NIC 1)">4. Lesión escamosa intraepitelial de bajo grado (VPH, displasia leve, NIC 1)</option>
          <option value="Lesión escamosa intraepitelial de alto grado (displasia moderada, displasia severa, carcicoma in Situ, NIC 2, NIC 3)">5. Lesión escamosa intraepitelial de alto grado (displasia moderada, displasia severa, carcicoma in Situ, NIC 2, NIC 3)</option>
          <option value="Carcicoma epidermoide">6. Carcicoma epidermoide</option>
          <option value="Células glandulares endocervicales atípicas (AGC)">7. Células glandulares endocervicales atípicas (AGC)</option>
          <option value="Células glandulares endometriales atípicas (AGC)">8. Células glandulares endometriales atípicas (AGC)</option>
          <option value="Células glandulares atípicas (AGC)">9. Células glandulares atípicas (AGC)</option>
          <option value="Adenocarcicoma">10. Adenocarcicoma</option>
          <option value="Adenocarcicoma (endocervical, endometrial o extrauterino)">11. Adenocarcicoma (endocervical, endometrial o extrauterino)</option>
        </select>
    </div>

    <div class="form-group col-md-6 ">
      <label for="otros_hallazgos">Otros hallazgos:</label>
        <select name="otros_hallazgos" class="form-control" >
           <option value="Trichonomas vaginalis">1. Trichonomas vaginalis</option>
          <option value="Microorganismos micóticos morfológicamente compatibles con cándida sp">2. Microorganismos micóticos morfológicamente compatibles con cándida sp</option>
           <option value="Cambio en la ora sugestiva de vaginosis bacteriana">3. Cambio en la ora sugestiva de vaginosis bacteriana</option>
          <option value="Micro- organismos morfológicamente compatibles con actinomyces sp">4. Micro- organismos morfológicamente compatibles con actinomyces sp</option>
          <option value="Cambios celulares compatibles con virus herpes simple">5. Cambios celulares compatibles con virus herpes simple</option>
          <option value="Cambios celulares compatibles con citomegalovirus">6. Cambios celulares compatibles con citomegalovirus</option>
          <option value="Metaplasiaescamosa tubular o cambios queratolíticos">7. Metaplasiaescamosa tubular o cambios queratolíticos</option>
          <option value="Cambios asociados al embarazo">8. Cambios asociados al embarazo</option>
          <option value="Inamación (incluye reparación atípica)">9. Inamación (incluye reparación atípica)</option>
          <option value="Atroa">10. Atrofia</option>
          <option value="Radioterapia">11. Radioterapia</option>
          <option value="Dispositivo intrauterino">12. Dispositivo intrauterino</option>
          <option value="Células glandulares post- histerectomía">13. Células glandulares post- histerectomía</option>
          <option value="Presencia de células endometriales no atípicas en mujeres de 45 años o más">14. Presencia de células endometriales no atípicas en mujeres de 45 años o más</option>
        </select>
    </div>
    <div class="form-group col-md-12 ">
      <label for="cedula_citotecnologo">Cédula profesional del citotecnólogo (a):</label>
      <input type="text"  class="form-control" id="cedula_citotecnologo" name="cedula_citotecnologo" value="NO CAPTURADO" onKeyUp="this.value=this.value.toUpperCase();">
    </div>

    <!-- Seccion PATOLOGO -->
    <div class="page-header col-md-12">
      <h3>Diagnóstico del Patólogo</h3>
    </div>
    <div class="form-group col-md-4 ">
      <label for="revisada_patologo">La muestra fue revisada por el patólogo (a):</label>
        <select name="revisada_patologo" class="form-control">  
          <option value="Si">1. Si</option>
          <option value="No">2. No</option>
        </select>
    </div>
    <div class="form-group col-md-8" >
          <label for="cedula_patologo">Cédula profesional del patólogo (a):</label>
          <input type="text"  class="form-control" id="cedula_patologo" name="cedula_patologo" value="NO CAPTURADO">
    </div> 
    <div class="form-group col-md-6">
          <label for="diagnostico_patologo">Diagnóstico del patólogo:</label>
            <select name="diagnostico_patologo" class="form-control" >
              <option value="Negativa para lesión intraepitelial o malignidad">1. Negativa para lesión intraepitelial o malignidad</option>
              <option value="Células escamosas atípicas de signicado indeterminado (ASC-US)">2. Células escamosas atípicas de signicado indeterminado (ASC-US)</option>
              <option value="Células escamosas atípicas, no se puede descartar lesión intraepitelial escamosa de alto grado (ASC-H)">3.  Células escamosas atípicas, no se puede descartar lesión intraepitelial escamosa de alto grado (ASC-H)</option>
              <option value="Lesión escamosa intraepitelial de bajo grado (VPH, displasia leve, NIC 1)">4. Lesión escamosa intraepitelial de bajo grado (VPH, displasia leve, NIC 1)</option>
              <option value="Lesión escamosa intraepitelial de alto grado (displasia moderada, displasia severa, carcicoma in Situ, NIC 2, NIC 3)">5. Lesión escamosa intraepitelial de alto grado (displasia moderada, displasia severa, carcicoma in Situ, NIC 2, NIC 3)</option>
              <option value="Carcicoma epidermoide">6. Carcicoma epidermoide</option>
              <option value="Células glandulares endocervicales atípicas (AGC)">7. Células glandulares endocervicales atípicas (AGC)</option>
              <option value="Células glandulares endometriales atípicas (AGC)">8. Células glandulares endometriales atípicas (AGC)</option>
              <option value="Células glandulares atípicas (AGC)">9. Células glandulares atípicas (AGC)</option>
              <option value="Adenocarcicoma">10. Adenocarcicoma</option>
              <option value="Adenocarcicoma (endocervical, endometrial o extrauterino)">11. Adenocarcicoma (endocervical, endometrial o extrauterino)</option>
            </select>
    </div>
    <div class="form-group col-md-6 ">
      <label for="otros_hallazgos_patologo">Otros hallazgos:</label>
        <select name="otros_hallazgos_patologo" class="form-control" >
           <option value="Trichonomas vaginalis">1. Trichonomas vaginalis</option>
          <option value="Microorganismos micóticos morfológicamente compatibles con cándida sp">2. Microorganismos micóticos morfológicamente compatibles con cándida sp</option>
           <option value="Cambio en la ora sugestiva de vaginosis bacteriana">3. Cambio en la ora sugestiva de vaginosis bacteriana</option>
          <option value="Micro- organismos morfológicamente compatibles con actinomyces sp">4. Micro- organismos morfológicamente compatibles con actinomyces sp</option>
          <option value="Cambios celulares compatibles con virus herpes simple">5. Cambios celulares compatibles con virus herpes simple</option>
          <option value="Cambios celulares compatibles con citomegalovirus">6. Cambios celulares compatibles con citomegalovirus</option>
          <option value="Metaplasiaescamosa tubular o cambios queratolíticos">7. Metaplasiaescamosa tubular o cambios queratolíticos</option>
          <option value="Cambios asociados al embarazo">8. Cambios asociados al embarazo</option>
          <option value="Inamación (incluye reparación atípica)">9. Inamación (incluye reparación atípica)</option>
          <option value="Atroa">10. Atrofia</option>
          <option value="Radioterapia">11. Radioterapia</option>
          <option value="Dispositivo intrauterino">12. Dispositivo intrauterino</option>
          <option value="Células glandulares post- histerectomía">13. Células glandulares post- histerectomía</option>
          <option value="Presencia de células endometriales no atípicas en mujeres de 45 años o más">14. Presencia de células endometriales no atípicas en mujeres de 45 años o más</option>
        </select>
    </div>

    <!-- TERMINA BLOQUE CITOLOGIA COMPLEMENTARIA -->
    <button type="submit" class="btn btn-default col-md-3" name="submit">Capturar VPH</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>