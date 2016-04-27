<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
 	  <h2 class="col-md-12">Formato Base</h2>
      <div class="col-md-10"> <h3>Consulta</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    //variables de sesion
      $jurisdiccion=$_SESSION['jurisdiccion'];//consultar datos de unidades
      $unidad_numero=$_SESSION['unidad_id']; //id que se guarda en citología, a su vez sirve para filtrar busquedas

    
    if(isset($_POST['submit'])){
      
      // $_SESSION['id'] = $unidad_numero;


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
      
      if (mysqli_num_rows($existe_paciente)>0)
      {
        // echo 'Exite al menos un registro';
        
        echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Información! Paciente agregado anteriormente a la base de pacientes, Citología creada!</strong>.
        </div>';
       
      }
       else {
     
        $query=$mysqli->query("INSERT INTO pacientes VALUES('','$cicam_clave', '$nombre', '$apellido_pat', '$apellido_mat', '$entidad_nacimiento', '$municipio_nacimiento', '$fecha_nacimiento', '$edad', '$curp', '$calle', '$numero_calle', '$colonia', '$localidad', '$municipio', '$delegacion', '$cp', '$entidad_federativa', '$jurisdiccion_id', '$telefono', '$calle_contacto', '$numero_calle_contacto', '$colonia_contacto', '$otro_telefono', '$correo', '$tiempo_residencia', '$estado_civil', '$escolaridad', '$ocupacion', '$afiliacion', '$num_poliza', '$afiliacion_otro', '$es_indigena', '$grupo_etnico', '$habla_lengua_indigena', '$cual_lengua', NOW(), NOW())");
        if($query){ 
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> Paciente Nuevo Añadido.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Ya existia el usuario pero se agrego al registro de Citología!</strong> Error.
        </div>
        <?php
      }
      }// else

      $edad = $_POST['edad'];
      
       if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){  
          $unidad_id= $_POST['unidad_id'];
        }else if ($_SESSION['nivel']==3 || $_SESSION['nivel']==4) {
          $unidad_id= $unidad_numero;
        }
       
   
      $citologia= $_POST['citologia'];
      $situacion_ginecoobstetrica= $_POST['situacion_ginecoobstetrica'];
      $inicio_vida_sexual= $_POST['inicio_vida_sexual'];
      $edad_inicio_vida_sexual= $_POST['edad_inicio_vida_sexual'];
      $antecedentes_vacunacion_vph= $_POST['antecedentes_vacunacion_vph'];
      //$edad_antecedentes_vacunacion_vph= $_POST['edad_antecedentes_vacunacion_vph'];


      // para capturar el valor y en caso de usar el disable, porque al momento de usar el disable elimina la variable post o get
      if (isset($_POST['edad_antecedentes_vacunacion_vph']))
          {   
            $edad_antecedentes_vacunacion_vph= $_POST['edad_antecedentes_vacunacion_vph'];
           
          }else {
            $edad_antecedentes_vacunacion_vph='NULL';
           
          }

      if (isset($_POST['dosis']))
          {   
            $dosis= $_POST['dosis'];
           
          }else {
            $dosis='NINGUNA';
           
          }

          //Fin de variables

      
      $ultima_regla= $_POST['ultima_regla'];
      $exploracion_observa= $_POST['exploracion_observa'];
      $utensilio_muestra= $_POST['utensilio_muestra'];
      $rfc_responsable= $_POST['rfc_responsable'];
      $fecha_toma_muestra= $_POST['fecha_toma_muestra'];

      $type = (array) $_POST["factores_riesgo"]; 
      $factores_riesgo=implode(', ', $type); 

     // $factores_riesgo= $_POST['factores_riesgo'];
      // $factores_riesgo= "NO CAPTURADO";
      $tiene_cartilla_salud= $_POST['tiene_cartilla_salud'];
      $muestra_repetida= $_POST['muestra_repetida'];
      $citologico_anterior= $_POST['citologico_anterior'];
      $fecha_interpretacion= $_POST['fecha_interpretacion'];
      $numero_citologico= $_POST['numero_citologico'];
      $laboratorio= $_POST['laboratorio'];
      $caracteristicas_muestra= $_POST['caracteristicas_muestra'];
      $diagnostico_citologico= $_POST['diagnostico_citologico'];
      $otros_hallazgos = $_POST['otros_hallazgos'];
      $repetir_estudio= $_POST['repetir_estudio'];
      $motivo_repeticion= $_POST['motivo_repeticion'];
      $cedula_citotecnologo= $_POST['cedula_citotecnologo'];
      $revisada_patologo= $_POST['revisada_patologo'];
      $diagnostico_patologo= $_POST['diagnostico_patologo'];
      $cedula_patologo= $_POST['cedula_patologo'];

      $extraerId = $mysqli->query("SELECT id FROM personal WHERE rfc='$rfc_responsable'");
      $personal = $extraerId->fetch_assoc();
      $id=$personal['id'];
      $mes=date("n");
      $ano=date("Y");
      $contador=1;
      
      $existe_doctor = $mysqli->query("SELECT * FROM meta_doctor_citologia WHERE doctor_id='$id' AND ano=$ano AND mes=$mes");

      if (mysqli_num_rows($existe_doctor)>0)
      {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Felicidades!</strong> Doctor se le ha añadido una meta más de Cítología.
        </div>';
        if($edad>24 && $edad<=35){
          $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango1=rango1+1 WHERE doctor_id = '$id'");
        }else if($edad>=36 && $edad <= 65){
          $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango2=rango2+1 WHERE doctor_id = '$id'");
        }
      }
       else {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Felicidades!</strong> Doctor se le ha creado una nueva meta de Cítología.
        </div>';
         if($edad>=24 && $edad<=35){
        $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$id','$unidad_id' ,'$ano', '$mes', '1', '0', '0', NOW(), NOW())");
         }else if($edad>=36 && $edad <= 65){
          $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$id','$unidad_id' ,'$ano', '$mes', '0', '1', '0', NOW(), NOW())");
        }
      }

            $existe_meta_unidad = $mysqli->query("SELECT * FROM meta_unidad_citologia WHERE unidad_id='$unidad_id' AND ano=$ano AND mes=$mes");

      if (mysqli_num_rows($existe_meta_unidad)>0)
      {
        // echo 'Exite al menos un registro de meta unidad';
        if($edad>24 && $edad<=35){
          $actualizar = $mysqli->query("UPDATE meta_unidad_citologia SET rango1=rango1+1 WHERE unidad_id = '$unidad_id'");
        }else if($edad>=36 && $edad <= 65){
          $actualizar = $mysqli->query("UPDATE meta_unidad_citologia SET rango2=rango2+1 WHERE unidad_id = '$unidad_id'");
        }
      }
       else {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> se acaba de crear una nueva meta para unidad.
        </div>';
         if($edad>=24 && $edad<=35){
        $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '1', '0', '0', NOW(), NOW())");
         }else if($edad>=36 && $edad <= 65){
          $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '0', '1', '0', NOW(), NOW())");
        }
      }
        

      $query = $mysqli->query("INSERT INTO citologia VALUES('', '$unidad_id',(SELECT id FROM pacientes WHERE nombre='$nombre' AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' AND fecha_nacimiento='$fecha_nacimiento'), '$citologia', '$situacion_ginecoobstetrica', '$inicio_vida_sexual', '$edad_inicio_vida_sexual', '$antecedentes_vacunacion_vph', '$edad_antecedentes_vacunacion_vph', '$dosis', '$ultima_regla', '$exploracion_observa', '$utensilio_muestra', '$rfc_responsable', '$fecha_toma_muestra', '$factores_riesgo', '$tiene_cartilla_salud', '$muestra_repetida', '$citologico_anterior', '$fecha_interpretacion', '$numero_citologico', '$laboratorio', '$caracteristicas_muestra', '$diagnostico_citologico','$otros_hallazgos', '$repetir_estudio', '$motivo_repeticion', '$cedula_citotecnologo', '$revisada_patologo', '$diagnostico_patologo', '$cedula_patologo', NOW(), NOW(),'DETECCION')");

   if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Éxito!</strong> citología agregada a la unidad.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Alerta!</strong> Error.
        </div>
        <?php
      }
    }
    //USO POSTERIOR
      $establecerFecha = $mysqli->query("INSERT INTO envios_fechas VALUES ('', (SELECT MAX(id) AS id FROM citologia), NOW(),NULL, NULL,NULL)");//crear variable global para conservar id de citologia en la que estamos trabajando


      // $jurisdiccion=$_SESSION['jurisdiccion'];
      if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }
      else if($_SESSION['nivel']==2 || $_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
    }
      $rowsPaciente = $mysqli->query("SELECT id, apellido_pat, apellido_mat, nombre FROM pacientes ORDER BY apellido_pat");

     $unidadesDatos = $mysqli->query("SELECT unidades.nombre, unidades.clues, municipios.nombre AS municipios_nombre, jurisdicciones.nombre AS jurisdicciones_nombre FROM unidades, jurisdicciones, municipios WHERE unidades.id='$unidad_numero' AND jurisdicciones.id=unidades.jurisdiccion_id AND jurisdicciones.municipio_id=municipios.id");
      
      $dataUnidad = $unidadesDatos->fetch_assoc();

      $rowsJurisdiccion     = $mysqli->query("SELECT id, nombre FROM jurisdicciones ORDER by nombre");
      $rowsMunicipio        = $mysqli->query("SELECT id, nombre FROM municipios ORDER by nombre");
      $rowsLocalidad        = $mysqli->query("SELECT id, nombre FROM localidades ORDER by nombre");
      
      if($_SESSION['nivel']==1){
          $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }else  if($_SESSION['nivel']==2){
         $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
       }


       include("../create/fDatosUnidad.php");
       include("../create/fDatosPaciente.php");
       include("../create/fDatosPaciente.php");

    ?>

    

        <button type="submit" class="btn btn-default col-md-3" name="submit">Capturar Detección</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>