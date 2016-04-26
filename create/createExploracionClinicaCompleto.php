<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
    <h2 class="col-md-12">Administración Nivel Unidad</h2>
      <div class="col-md-10"> <h3>Agregar Citología</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/citologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    //variables de sesion
      $jurisdiccion=$_SESSION['jurisdiccion'];
      $unidad_numero=$_SESSION['unidad_id'];

    
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
      // $jurisdiccion_id      = $_POST['jurisdiccion_id'];
      $jurisdiccion_id=$jurisdiccion;
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
        
        echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Información! Paciente agregado anteriormente a la base de pacientes, Citología creada!</strong>.
        </div>';
       
      }
       else {
        // echo ' No existe, crear registro ';
       
        $query = $mysqli->query("insert into pacientes values('','$cicam_clave','$nombre','$apellido_pat','$apellido_mat','$entidad_nacimiento','$municipio_nacimiento','$fecha_nacimiento','$edad', '$curp', '$calle', '$numero', '$colonia', '$telefono', '$otro_telefono', '$correo', '$localidad', '$municipio', '$delegacion', '$cp', '$entidad_federativa', '$jurisdiccion_id', '$tiempo_residencia', '$estado_civil', '$escolaridad', '$ocupacion', '$afiliacion','$num_poliza', '$afiliacion_otro', NOW(), NOW())");
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
      }//

    //   $paciente_id =$mysqli->query("SELECT id FROM pacientes WHERE nombre='$nombre' AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' AND fecha_nacimiento='$fecha_nacimiento'");
    // fin de los post para paciente
      $edad = $_POST['edad'];
      
       if($_SESSION['nivel']==1 || $_SESSION['nivel']==2){  
          $unidad_id= $_POST['unidad_id'];
        }else if ($_SESSION['nivel']==3 || $_SESSION['nivel']==4) {
          $unidad_id= $unidad_numero;
        }
       
    
      // $paciente_id= $_POST['paciente_id'];

    
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
      $establecerFecha = $mysqli->query("INSERT INTO envios_fechas VALUES ('', (SELECT MAX(id) AS id FROM citologia), NOW(),NULL, NULL,NULL)");


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
    ?>


    <div class="page-header col-md-12">
        <h2><span class="label label-default">I. Identificación de la Unidad</span></h2>
    </div>

    <form role="form"  method="post">
    <?php  
    if($_SESSION['nivel']==1|| $_SESSION['nivel']==2){
        echo ' <div class="form-group col-md-4">
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
      echo '<div class="form-group col-md-4 ">';
      echo '<label for="">Nombre:</label>';
      echo  '<input type="text" class="form-control" id="" name="" value="'.$dataUnidad['nombre']; echo '"readonly>
       </div>';
    }
    ?>

      <div class="form-group col-md-4 ">
        <label for="">CLUES:</label>
        <input type="text" class="form-control" id="clues" name="clues" value="<?php echo $dataUnidad['clues'] ?>" readonly>
      </div>
      

   
      <div class="form-group col-md-4 ">
        <label for="">Institución:</label>
        <input type="text" class="form-control" id="" name="" value="SSA" readonly>
      </div>

      <div class="form-group col-md-4 ">
         <label for="">Entidad/Delegación:</label>
         <input type="text" class="form-control" id="" name="" value="Baja California" readonly>
      </div>

      <div class="form-group col-md-4 ">
         <label for="">Jurisdicción:</label>
         <input type="text" class="form-control" id="jurisdicciones_nombre" name="jurisdicciones_nombre" value="<?php echo $dataUnidad['jurisdicciones_nombre'] ?>" readonly>
      </div>

      <div class="form-group col-md-4 ">
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
          <input type="text" class="form-control" id="nombre" name="nombre">
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" required>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat"  required>
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
        
        <div class="form-group col-md-3 hidden">
          <label for="municipio_nacimiento">Municipio de Nacimiento:</label>
          <input type="text" class="form-control" id="municipio_nacimiento" name="municipio_nacimiento" placeholder="MEXICALI" >
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
          <input type="text" class="form-control" id="curp" name="curp" value="NO CAPTURADO">
        </div>
  <div class="page-header col-md-12">
        <h3>Domicilio del paciente</h3>
    </div>
        <div class="form-group col-md-4">
          <label for="calle">Calle:</label>
          <input type="text" class="form-control" id="calle" name="calle">
        </div>

        <div class="form-group col-md-4">
          <label for="numero">Número:</label>
          <input type="number" class="form-control" min="0" id="numero" name="numero" placeholder="SIN NUMERO">
        </div>
        
        <div class="form-group col-md-4">
          <label for="colonia">Colonia:</label>
          <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Ej. Insurgentes Este" >
        </div>

        <div class="form-group col-md-4">
          <label for="telefono">Teléfono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ej. 68662272024" >
        </div>

        <div class="form-group col-md-4">
          <label for="otro_telefono">Otro Teléfono:</label>
          <input type="tel" class="form-control" id="otro_telefono" name="otro_telefono">
        </div>
        
        <div class="form-group col-md-4">
          <label for="correo">Correo:</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej. correo@gmail.com">
        </div>
           
      <!-- COMINEZA SELECT PARA LOCALIDAD -->
        <div class="form-group col-md-3">
            <label for="localidad">Localidad:</label>
            <select name="localidad" class="form-control" >
                  <?php foreach ($rowsLocalidad as $key) {
                    if($key['nombre']== 'NINGUNA LOCALIDAD'){
                      echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                    }
                  else {
                      echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                  }
                }?>
            </select>
               
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
          <input type="text" class="form-control" id="delegacion" name="delegacion">
        </div>

        <div class="form-group col-md-3">
          <label for="cp">C.P:</label>
          <input type="number" class="form-control" min="0" id="cp" name="cp" value="NO CAPTURADO" >
        </div>

        <div class="form-group col-md-3 hidden">
          <label for="entidad_federativa">Entidad Federativa (Estado):</label>
            <select name="entidad_federativa" id="entidad_federativa" class="form-control" >
           <!--  <option value="NO CAPTURADO">SELECCIONE OPCIÓN</option> -->
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
        
        <div class="form-group col-md-3 hidden">
            <label for="jurisdiccion_id">Jurisdicción:</label>
            <select name="jurisdiccion_id" class="form-control" >
            <option value=""></option>
                <?php /*foreach ($rowsJurisdiccion as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }*/
                ?>
            </select>
        </div>

      <!-- FIN DEL SELECT PARA JURISDICCION -->

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
            <option value="DIVORSIDO">Divorsiad(a)</option>
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
        
        <div class="form-group col-md-3 hidden">
          <label for="ocupacion">Ocupación:</label>
          <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="NO CAPTURADO" >
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
      <!-- FIN DEL SELECT PARA PACIENTE -->

    <div class="page-header col-md-12">
        <h2><span class="label label-default">III. Antecedentes del Paciente</span></h2>
    </div>
      <!-- COMINEZA SELECT PARA CITOLOGIA -->
        <div class="form-group col-md-6">
          <label for="citologia">Citología:</label>
            <select name="citologia" class="form-control">
             <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
              <option value="Primera vez en la vida">1. Primera vez en la vida</option>
              <option value="Primera vez después de 3 años">2. Primera vez después de 3 años</option>
              <option value="Subsecuente">3. Subsecuente</option>
              <option value="Complementaria a resultado positivo de VPH">4. Complementaria a resultado positivo de VPH</option>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA CITOLOGIA -->
 
      
      <!-- COMINEZA SELECT PARA SITUACION GINECOOBSTETRICA --> 
        <div class="form-group col-md-6 hidden">
          <label for="situacion_ginecoobstetrica">Situación Ginecoobstétrica:</label>
            <select name="situacion_ginecoobstetrica" class="form-control">
            <!--   <option value="NO CAPTURADO">Selecciona Opción</option> -->
              <option value="Puerperio o Postaborto">1. Puerperio o Postaborto</option>
              <option value="Postmenopausia">2. Postmenopausia</option>
              <option value="Uso hormonales">3. Uso hormonales</option>
              <option value="DIU">4. DIU</option>
              <option value="Histerectomía">5. Histerectomía</option>
              <option value="Tratamiento farmacologico">6. Tratamiento farmacologico</option>
              <option value="Embarazo actual">7. Embarazo actual</option>
              <option value="Tratamiento colposcopico previo">8. Tratamiento colposcopico previo</option>
              <option value="Ninguno de los anteriores">9. Ninguno de los anteriores</option>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA SITUACION GINECOOBSTETRICA -->

        <div class="form-group col-md-6 hidden">
          <label for="inicio_vida_sexual">Inicio de vida sexual:</label>
            <select name="inicio_vida_sexual" class="form-control">
              <!-- <option value="NO CAPTURADO">Selecciona Opción</option> -->
              <option value="SI">1. Si</option>
              <option value="NO">2. No</option>
            </select>
        </div>

        <div class="form-group col-md-6">
          <label for="edad_inicio_vida_sexual">Edad de inicio de vida sexual:</label>
          <input type="number" min="0" class="form-control" id="edad_inicio_vida_sexual" name="edad_inicio_vida_sexual" value="18">
        </div>


        <div class="form-group col-md-6">
          <label for="antecedentes_vacunacion_vph">Antecedentes de vacunacion VPH:</label>
            <select name="antecedentes_vacunacion_vph" class="form-control" id="antecedentes_vacunacion_vph">
              <option value="SI">1. Si</option>
              <option value="NO" selected>2. No</option>
            </select>
        </div>

        <div class="form-group col-md-3 ">
          <label for="edad_antecedentes_vacunacion_vph">Edad:</label>
          <input type="number" min="0" class="form-control" id="edad_antecedentes_vacunacion_vph" name="edad_antecedentes_vacunacion_vph" value="0" disabled>
        </div>

        <div class="form-group col-md-3 ">
          <label for="dosis">Numero de dosis:</label>
            <select name="dosis" class="form-control" id="dosis" disabled>
              <option value="UNA">1. Una</option>
              <option value="DOS">2. Dos</option>
              <option value="TRES">3. Tres</option>
              <option value="COMPLETO">4. Completo</option>
              <option value="NINGUNA" selected>5. Ninguna</option>
            </select>
        </div>

        <div class="form-group col-md-6">
          <label for="ultima_regla">Fecha de ultima regla:</label>
          <input type="date" class="form-control" id="ultima_regla" name="ultima_regla" value="<?php echo date('Y-m-d');?>">
        </div>

        <div class="form-group col-md-6 ">
          <label for="exploracion_observa">A la exploracion se observa:</label>
            <select name="exploracion_observa" class="form-control">
              <option value="Cuello aparentemente sano">1. Cuello aparentemente sano</option>
              <option value="Cuello anormal">2. Cuello anormal</option>
              <option value="Lesion del cuello">3. Lesion del cuello</option>
              <option value="Cervicitis">4. Cervicitis</option>
              <option value="Leucorrea">5. Leucorrea</option>
              <option value="Sangrado anormal">6. Sangrado anormal</option>
              <option value="No se observa cuello">7. No se observa cuello</option>
            </select>
        </div>

        <div class="form-group col-md-4 ">
          <label for="utensilio_muestra">Utensilio con el que se tomo la muestra:</label>
            <select name="utensilio_muestra" class="form-control">
             <!--  <option value="NO CAPTURADO">Selecciona Opción</option> -->
              <option value="Espatula de ayre modificada">1. Espatula de ayre modificada</option>
              <option value="Citobrush">2. Citobrush</option>
              <option value="Hisopo">3. Hisopo</option>
              <option value="Otro especifique">4. Otro especifique</option>
            </select>
        </div>

        <div class="form-group col-md-4">
          <label for="rfc_responsable">RFC Responsable de la toma de citología:</label>
          <input type="text" class="form-control" id="rfc_responsable" name="rfc_responsable" placeholder="Ingresa RFC" required>
        </div>

        <div class="form-group col-md-4">
          <label for="rfc_responsable_puesto">RFC Puesto:</label>
          <input type="text" class="form-control" id="rfc_responsable_puesto" name="rfc_responsable_puesto" readonly>
        </div>

        <div class="form-group col-md-4">
          <label for="rfc_responsable_nombre"><br>Nombre: </label>
          <input type="text" class="form-control" id="rfc_responsable_nombre" name="rfc_responsable_nombre" placeholder="Ingresa Nombre" readonly="">
        </div>

        <div class="form-group col-md-4">
          <label for="rfc_responsable_ape_pat"><br>Apellido Paterno:</label>
          <input type="text" class="form-control" id="rfc_responsable_ape_pat" name="rfc_responsable_ape_pat" placeholder="Ingresa Apellido Paterno" readonly="">
        </div>


        <div class="form-group col-md-4">
          <label for="rfc_responsable_ape_mat"><br>Apellido Materno:</label>
          <input type="text" class="form-control" id="rfc_responsable_ape_mat" name="rfc_responsable_ape_mat" placeholder="Ingresa Apellido Materno" readonly="">
        </div>

        <div class="form-group col-md-6">
          <label for="fecha_toma_muestra">Fecha de toma de la muestra:</label>
          <input type="date" class="form-control" id="fecha_toma_muestra" name="fecha_toma_muestra" value="<?php echo date('Y-m-d');?>">
        </div>

        <div class="form-group col-md-6 ">
          <label for="factores_riesgo">Factores de riesgo:</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Inicio de relaciones sexuales antes de los 18 años">1. Inicio de relaciones sexuales antes de los 18 años
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Múltiples parejas sexuales">2. Múltiples parejas sexuales
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Antecedentes de infecciones de transmisión sexual">3. Antecedentes de infecciones de transmisión sexual
                  </label>

                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" value="Tabaquismo">4. Tabaquismo
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="factores_riesgo[]" checked value="Ninguno">5. Ninguno
                  </label>
                </div>
        </div>

        <div class="form-group col-md-6">
          <label for="tiene_cartilla_salud">Cuenta con Cartilla Nacional de Salud de la Mujer:</label>
            <select name="tiene_cartilla_salud" class="form-control" >
              <option value="SI">1. Si</option>
              <option value="NO">2. No</option>
            </select>
        </div>

        <div class="form-group col-md-4">
          <label for="muestra_repetida">Muestra repetida:</label>
            <select name="muestra_repetida" class="form-control">
              <option value="SI">1. Si</option>
              <option selected value="NO" selected>2. No</option>
            </select>
        </div>

        <div class="form-group col-md-4 hidden">
          <label  for="citologico_anterior">Número citológico anterior:</label>
          <input type="hidden "min="0" class="form-control" id="citologico_anterior" name="citologico_anterior" placeholder="Ingresa Número" >
        </div>
  <!-- EMPIEZA LOS RESLULTADOS -->
        <div class="page-header col-md-12 hidden">
            <h2><span class="label label-default">IV. Resultado de citología cervical</span></h2>
        </div>

         <div class="form-group col-md-6 hidden">
          <label for="fecha_interpretacion">Fecha de interpretación:</label>
          <input type="date" class="form-control" id="fecha_interpretacion" name="fecha_interpretacion" placeholder="Ingresa Fecha" type="hidden">
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="numero_citologico">Número citológico:</label>
          <input type="number" min="0" class="form-control" id="numero_citologico" name="numero_citologico" placeholder="Ingresa Número">
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="laboratorio">Laboratorio:</label>
          <input type="text"  class="form-control" id="laboratorio" name="laboratorio" value="NO CAPTURADO">
        </div>

         <div class="form-group col-md-6 hidden">
          <label for="caracteristicas_muestra">Características de la muestra:</label>
            <select name="caracteristicas_muestra" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Adecuada Procesada">1. Adecuada Procesada</option>
              <option value="Inadecuada Procesada">2. Inadecuada Procesada</option>
              <option value="Adecuada No Procesada">1. Adecuada No Procesada</option>
              <option value="Inadecuada No Procesada">2. Inadecuada No Procesada</option>
            </select>
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="diagnostico_citologico">A. Categoría general del diagnóstico citológico (Bethesda):</label>
            <select name="A" class="form-control" disabled>
              <option value="NO CAPTURADO">Selecciona Opción</option>
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

        <div class="form-group col-md-6 hidden">
          <label for="diagnostico_citologico">B. Otros hallazgos:</label>
            <select name="B" class="form-control" disabled>
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Trichonomas vaginalis">1. Trichonomas vaginalis</option>
              <option value="Microorganismos micóticos morfológicamente compatibles con cándida sp">2. Microorganismos micóticos morfológicamente compatibles con cándida sp</option>
              <option value="Cambio en la ora sugestiva de vaginosis bacteriana">3. Cambio en la ora sugestiva de vaginosis bacteriana</option>
              <option value="Micro- organismos morfológicamente compatibles con actinomyces sp">4. Micro- organismos morfológicamente compatibles con actinomyces sp</option>
              <option value="Cambios celulares compatibles con virus herpes simple">5. Cambios celulares compatibles con virus herpes simple</option>
              <option value="Cambios celulares compatibles con citomegalovirus">6. Cambios celulares compatibles con citomegalovirus</option>
              <option value="Metaplasiaescamosa tubular o cambios queratolíticos">7. Metaplasiaescamosa tubular o cambios queratolíticos</option>
              <option value="Cambios asociados al embarazo">8. Cambios asociados al embarazo</option>
              <option value="Inamación (incluye reparación atípica)">9. Inamación (incluye reparación atípica)</option>
              <option value="Atroa">10. Atroa</option>
              <option value="Radioterapia">11. Radioterapia</option>
              <option value="Dispositivo intrauterino">12. Dispositivo intrauterino</option>
              <option value="Células glandulares post- histerectomía">13. Células glandulares post- histerectomía</option>
              <option value="Presencia de células endometriales no atípicas en mujeres de 45 años o más">14. Presencia de células endometriales no atípicas en mujeres de 45 años o más</option>
            </select>
        </div>

        <div class="form-group col-md-12 hidden">
          <label for="diagnostico_citologico">Diagnóstico citológico:</label>
            <input type="text" class="form-control" id="diagnostico_citologico" name="diagnostico_citologico" value="NO CAPTURADO">
        </div> 

          <div class="form-group col-md-12 hidden">
          <label for="otros_hallazgos">Otros Hallazgos:</label>
            <input type="text" class="form-control" id="otros_hallazgos" name="otros_hallazgos" value="NO CAPTURADO">
        </div>

        <div class="form-group col-md-3 hidden">
          <label for="repetir_estudio">Repetir estudio:</label>
            <select name="repetir_estudio" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
            </select>
        </div>

         <div class="form-group col-md-9 hidden">
          <label for="motivo_repeticion">Motivo:</label>
            <select name="motivo_repeticion" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="EArticios, hemorragia, inamación y/o">1. Articios, hemorragia, inamación y/o</option>
              <option value="Laminilla rota">2. Laminilla rota</option>
              <option value="Frotis grueso">3. Frotis grueso</option>
              <option value="Muestra mal fijada">3. Muestra mal fijada</option>
              <option value="Otro especifique">4. Otro especifique</option>
            </select>
        </div>

        <div class="form-group col-md-12 hidden">
          <label for="cedula_citotecnologo">Cédula profesional del citotecnólogo (a):</label>
          <input type="text"  class="form-control" id="cedula_citotecnologo" name="cedula_citotecnologo" value="NO CAPTURADO" >
        </div>

         <div class="form-group col-md-4 hidden">
          <label for="revisada_patologo">La muestra fue revisada por el patólogo (a):</label>
            <select name="revisada_patologo" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
            </select>
        </div>

         <div class="form-group col-md-8 hidden" >
          <label for="diagnostico_patologo">Diagnóstico del patólogo (a) (De acuerdo a la nomenclatura del reactivo 31):</label>
          <input type="text"  class="form-control" id="diagnostico_patologo" name="diagnostico_patologo" value="NO CAPTURADO">
        </div>

        <div class="form-group col-md-12 hidden" >
          <label for="cedula_patologo">Cédula profesional del patólogo (a):</label>
          <input type="text"  class="form-control" id="cedula_patologo" name="cedula_patologo" value="NO CAPTURADO">
        </div>

        <button type="submit" class="btn btn-default col-md-3" name="submit">Capturar Detección</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>