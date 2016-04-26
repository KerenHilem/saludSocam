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

      $result = $mysqli->query("select * from citologia where id='$id' limit 0,1");
      $data = $result->fetch_assoc();
?>
    <div class="row">
      <div class="col-md-10">
        <h1>Actualización de Datos</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="citologia.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $unidad_id= $data['unidad_id'];
      $paciente_id= $data['paciente_id'];
      $citologia= $_POST['citologia'];
      $situacion_ginecoobstetrica= $_POST['situacion_ginecoobstetrica'];
      $inicio_vida_sexual= $_POST['inicio_vida_sexual'];
      $edad_inicio_vida_sexual= $_POST['edad_inicio_vida_sexual'];
      $antecedentes_vacunacion_vph= $_POST['antecedentes_vacunacion_vph'];
      $edad_antecedentes_vacunacion_vph= $_POST['edad_antecedentes_vacunacion_vph'];
      $dosis= $_POST['dosis'];
      $ultima_regla= $_POST['ultima_regla'];
      $exploracion_observa= $_POST['exploracion_observa'];
      $utensilio_muestra= $_POST['utensilio_muestra'];
      $rfc_responsable= $_POST['rfc_responsable'];
      $fecha_toma_muestra= $_POST['fecha_toma_muestra'];
      $factores_riesgo= $_POST['factores_riesgo'];
      $tiene_cartilla_salud= $_POST['tiene_cartilla_salud'];
      $muestra_repetida= $_POST['muestra_repetida'];
      $citologico_anterior= $_POST['citologico_anterior'];
      $fecha_interpretacion= $_POST['fecha_interpretacion'];
      $numero_citologico= $_POST['numero_citologico'];
      $laboratorio= $_POST['laboratorio'];
      $diagnostico_citologico= $_POST['diagnostico_citologico'];
      $otros_hallazgos_citologicos = $_POST['otros_hallazgos_citologicos'];
      $repetir_estudio= $_POST['repetir_estudio'];
      
     
      $estatus="";
      if ($_POST['repetir_estudio']=='SI')
          {   
            $repetir_estudio= $_POST['repetir_estudio'];
            $estatus="REMITIDA A UNIDAD";
           
          }else {
            $repetir_estudio=$data['repetir_estudio'];
            $motivo_repeticion=$data['motivo_repeticion'];
            $estatus="ENVIO DE RESULTADOS A J y U IMPRESION";
          }

      $caracteristicas_muestra= $_POST['caracteristicas_muestra'];

      // if ($caracteristicas_muestra=='Inadecuada Procesada' || $caracteristicas_muestra=='Inadecuada No Procesada') {
      //      echo "entro a la condición";
      //      $repetir_estudio = 'SI';
      // }

      if (isset($_POST['motivo_repeticion'])){   
            
            if($motivo_repeticion=='Otro especifique'){
                $motivo_repeticion= $motivo_repeticion_otro;
            }else {
                $motivo_repeticion = $_POST['motivo_repeticion_otro'];
            }
          }

      $cedula_citotecnologo= $_POST['cedula_citotecnologo'];
      $revisada_patologo= $_POST['revisada_patologo'];
      $diagnostico_patologo= $_POST['diagnostico_patologo'];
      $cedula_patologo= $_POST['cedula_patologo'];

      
      $query = $mysqli->query("UPDATE citologia SET unidad_id='$unidad_id', paciente_id='$paciente_id',citologia='$citologia',situacion_ginecoobstetrica='$situacion_ginecoobstetrica', inicio_vida_sexual='$inicio_vida_sexual',edad_inicio_vida_sexual='$edad_inicio_vida_sexual', antecedentes_vacunacion_vph='$antecedentes_vacunacion_vph', edad_antecedentes_vacunacion_vph='$edad_antecedentes_vacunacion_vph',dosis='$dosis',ultima_regla='$ultima_regla',exploracion_observa='$exploracion_observa', utensilio_muestra='$utensilio_muestra', rfc_responsable='$rfc_responsable',fecha_toma_muestra='$fecha_toma_muestra',factores_riesgo='$factores_riesgo',tiene_cartilla_salud='$tiene_cartilla_salud',muestra_repetida='$muestra_repetida', citologico_anterior='$citologico_anterior',fecha_interpretacion='$fecha_interpretacion', numero_citologico='$numero_citologico', laboratorio='$laboratorio', caracteristicas_muestra='$caracteristicas_muestra', diagnostico_citologico='$diagnostico_citologico',otros_hallazgos_citologicos='$otros_hallazgos_citologicos',repetir_estudio='$repetir_estudio',motivo_repeticion='$motivo_repeticion', cedula_citotecnologo='$cedula_citotecnologo', revisada_patologo='$revisada_patologo',diagnostico_patologo='$diagnostico_patologo', cedula_patologo='$cedula_patologo', modificado=NOW(),estatus='$estatus' WHERE id='$id'");
      if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-="true">&times;</span></button>
          <strong>Enviados!</strong> a cola de impresión.
        </div>
        <?php
      } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-="true">&times;</span></button>
          <strong>Alerta!</strong> Faltan Datos.
        </div>
        <?php
      }
    }

     $jurisdiccion=$_SESSION['jurisdiccion'];
     $unidad_numero=$data['unidad_id'];
     $paciente_numero=$data['paciente_id'];

     $unidadesDatos = $mysqli->query("SELECT unidades.nombre, unidades.clues, municipios.nombre AS municipios_nombre, jurisdicciones.nombre AS jurisdicciones_nombre FROM unidades, jurisdicciones, municipios WHERE unidades.id='$unidad_numero' AND jurisdicciones.id=unidades.jurisdiccion_id AND jurisdicciones.municipio_id=municipios.id");
      
      $dataUnidad = $unidadesDatos->fetch_assoc();
    

      $pacienteDatos = $mysqli->query("SELECT pacientes.cicam_clave, pacientes.nombre, pacientes.apellido_pat, pacientes.apellido_mat, pacientes.entidad_nacimiento, pacientes.municipio_nacimiento, pacientes.edad, pacientes.fecha_nacimiento, pacientes.curp, pacientes.calle, pacientes.numero_calle, pacientes.colonia, pacientes.telefono, pacientes.otro_telefono, pacientes.correo, localidades.nombre AS localidades_nombre , municipios.nombre AS municipios_nombre, delegacion, pacientes.cp, pacientes.entidad_federativa, jurisdicciones.nombre AS jurisdicciones_nombre, pacientes.tiempo_residencia, pacientes.estado_civil, pacientes.escolaridad, pacientes.ocupacion, pacientes.afiliacion, pacientes.numero_expediente_electronico, pacientes.num_poliza FROM pacientes,municipios, localidades, jurisdicciones WHERE pacientes.id='$paciente_numero' AND pacientes.localidad=localidades.id AND municipios.id=pacientes.municipio_id AND jurisdicciones.id=pacientes.jurisdiccion_id");

      $dataPaciente = $pacienteDatos->fetch_assoc();
      
      $rowsLaboratorio        = $mysqli->query("SELECT id, jurisdiccion_id, estatus, nombre FROM laboratorios WHERE estatus='ACTIVO' ORDER by nombre");
    ?>
    <br/>
  <form role="form"  method="post">
     
      <!-- COMINEZA SELECT PARA UNIDADES -->
      <div class="form-group col-md-4 ">
        <label for="unidad_id">Unidad:</label>
        <input type="text" class="form-control" id="unidad_id" name="unidad_id" value="<?php echo $dataUnidad['nombre'] ?>" readonly>
      </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

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

      <!-- COMINEZA SELECT PARA PACIENTE -->
      <div class="form-group col-md-3 hidden">
        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" id="paciente_id" class="form-control" disabled>
          <option value="-1">SELECCIONA PACIENTE</option>';
                <?php foreach ($rowsPaciente as $key) {
                if ($key['id']==$data['paciente_id']) {
                  echo '<option value="'.$key['id'].'"selected>'.$key['apellido_pat'].' '.$key['apellido_mat'].' '.$key['nombre'].'</option>';
                }else{
                   echo '<option value="'.$key['id'].'">'.$key['apellido_pat'].' '.$key['apellido_mat'].' '.$key['nombre'];
                }
                }?>
        </select>
      </div>

      <div class="form-group col-md-4 hidden">
        <label for="cicam_clave">Clave Sicam:</label>
        <input type="text" class="form-control" id="cicam_clave" name="cicam_clave" readonly>
      </div>
  
      <div class="form-group col-md-4">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $dataPaciente['nombre'] ?>" readonly>
      </div>

      <div class="form-group col-md-4">
        <label for="apellido_pat">Apellido Paterno:</label>
        <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" value="<?php echo $dataPaciente['apellido_pat'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="apellido_mat">Apellido Materno:</label>
        <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" value="<?php echo $dataPaciente['apellido_mat'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="entidad_nacimiento">Entidad de nacimiento:</label>
        <input type="text" class="form-control" id="entidad_nacimiento" name="entidad_nacimiento" value="<?php echo $dataPaciente['entidad_nacimiento'] ?>" readonly>
      </div>
        
      <div class="form-group col-md-3">
        <label for="municipio_nacimiento">Municipio de Nacimiento:</label>
        <input type="text" class="form-control" id="municipio_nacimiento" name="municipio_nacimiento" value="<?php echo $dataPaciente['municipio_nacimiento'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $dataPaciente['fecha_nacimiento'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="curp">Curp:</label>
        <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $dataPaciente['curp'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="calle">Calle:</label>
        <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $dataPaciente['calle'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="numero_calle">Número:</label>
        <input type="number" class="form-control" id="numero_calle" name="numero_calle" value="<?php echo $dataPaciente['numero_calle'] ?>" readonly>
      </div>
        
      <div class="form-group col-md-3">
        <label for="colonia">Colonia:</label>
        <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo $dataPaciente['colonia'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="telefono">Teléfono:</label>
        <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $dataPaciente['telefono'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="otro_telefono">Otro Teléfono:</label>
        <input type="tel" class="form-control" id="otro_telefono" name="otro_telefono" value="<?php echo $dataPaciente['otro_telefono'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="correo">Correo:</label>
        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $dataPaciente['correo'] ?>" readonly>
      </div>

      <!-- COMINEZA SELECT PARA LOCALIDAD -->
      <div class="form-group col-md-3">
        <label for="localidad">Localidad:</label>
        <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $dataPaciente['localidades_nombre'] ?>" readonly>
      </div>
      <!-- FIN DEL SELECT PARA LOCALIDAD -->
        
      <!-- EMPIEZA SELECTO MUNICIPIOS-->
      <div class="form-group col-md-3">
        <label for="municipio_id">Municipio:</label>
        <input type="text" class="form-control" id="municipio_id" name="municipio_id" value="<?php echo $dataPaciente['municipios_nombre'] ?>" readonly>
      </div>
      <!-- TERMINA SELECT MUNICIPIO-->

      <div class="form-group col-md-3">
        <label for="delegacion">Delegación:</label>
        <input type="text" class="form-control" id="delegacion" name="delegacion" value="<?php echo $dataPaciente['delegacion'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="cp">C.P:</label>
        <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $dataPaciente['cp'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="entidad_federativa">Entidad Federativa:</label>
        <input type="text" class="form-control" id="entidad_federativa" name="entidad_federativa" value="<?php echo $dataPaciente['entidad_federativa'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="afiliacion">Afiliación:</label>
        <input type="text" class="form-control" id="afiliacion" name="afiliacion" value="<?php echo $dataPaciente['afiliacion'] ?>" readonly>
      </div>

      <div class="form-group col-md-3">
        <label for="num_poliza">Número de Poliza:</label>
        <input type="text" class="form-control" id="num_poliza" name="num_poliza" value="<?php echo $dataPaciente['num_poliza'] ?>" readonly>
      </div>

      <div class="page-header col-md-12">
        <h2><span class="label label-default">III. Antecedentes del Paciente</span></h2>
      </div>
      <!-- COMINEZA SELECT PARA CITOLOGIA -->
      <div class="form-group col-md-6">
        <label for="citologia">Citología:</label>
        <input type="text" class="form-control" id="citologia" name="citologia" value="<?php echo $data['citologia'] ?>" readonly>
      </div>
      <!-- FIN DEL SELECT PARA CITOLOGIA -->
       
      <!-- COMINEZA SELECT PARA SITUACION GINECOOBSTETRICA --> 
      <div class="form-group col-md-6">
        <label for="situacion_ginecoobstetrica">Situación Ginecoobstétrica:</label>
        <input type="text" class="form-control" id="situacion_ginecoobstetrica" name="situacion_ginecoobstetrica" value="<?php echo $data['situacion_ginecoobstetrica'] ?>" readonly>
      </div>
      <!-- FIN DEL SELECT PARA SITUACION GINECOOBSTETRICA -->

      <div class="form-group col-md-6 ">
        <label for="inicio_vida_sexual">Inicio de vida sexual:</label>
        <input type="text" class="form-control" id="inicio_vida_sexual" name="inicio_vida_sexual" value="<?php echo $data['inicio_vida_sexual'] ?>" readonly>
      </div>

      <div class="form-group col-md-6 ">
        <label for="edad_inicio_vida_sexual">Edad de inicio de vida sexual:</label>
        <input type="number" min="0" class="form-control" id="edad_inicio_vida_sexual" name="edad_inicio_vida_sexual" value="<?php echo $data['edad_inicio_vida_sexual'] ?>" readonly>
      </div>

      <div class="form-group col-md-6 ">
        <label for="antecedentes_vacunacion_vph">Antecedentes de vacunacion VPH:</label>
        <input type="text" class="form-control" id="antecedentes_vacunacion_vph" name="antecedentes_vacunacion_vph" value="<?php echo $data['antecedentes_vacunacion_vph'] ?>" readonly>
      </div>

      <div class="form-group col-md-3 ">
        <label for="edad_antecedentes_vacunacion_vph">Edad:</label>
        <input type="text" class="form-control" id="edad_antecedentes_vacunacion_vph" name="edad_antecedentes_vacunacion_vph" value="<?php echo $data['edad_antecedentes_vacunacion_vph'] ?>" readonly>
      </div>

      <div class="form-group col-md-3 ">
        <label for="dosis">Numero de dosis:</label>
        <input type="text" class="form-control" id="dosis" name="dosis" value="<?php echo $data['dosis'] ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label for="ultima_regla">Fecha de ultima regla:</label>
        <input type="date" class="form-control" id="ultima_regla datePicker" name="ultima_regla" value="<?php echo $data['ultima_regla'] ?>" readonly>
      </div>

      <div class="form-group col-md-6 ">
        <label for="exploracion_observa">A la exploracion se observa:</label>
        <input type="text" class="form-control" id="exploracion_observa" name="exploracion_observa" value="<?php echo $data['exploracion_observa'] ?>" readonly>
      </div>

      <div class="form-group col-md-6 ">
        <label for="utensilio_muestra">Utensilio con el que se tomo la muestra:</label>
        <input type="text" class="form-control" id="utensilio_muestra" name="utensilio_muestra" value="<?php echo $data['utensilio_muestra'] ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label for="rfc_responsable">RFC del responsable de la toma de citologia:</label>
        <input type="text" class="form-control" id="" name="rfc_responsable" value="<?php echo $data['rfc_responsable'] ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label for="fecha_toma_muestra">Fecha de toma de la muestra:</label>
        <input type="date" class="form-control" id="fecha_toma_muestra" name="fecha_toma_muestra" value="<?php echo $data['fecha_toma_muestra'] ?>" readonly>
      </div>

      <div class="form-group col-md-6 ">
        <label for="factores_riesgo">Factores de riesgo:</label>
        <input type="text" class="form-control" id="factores_riesgo" name="factores_riesgo" value="<?php echo $data['factores_riesgo'] ?>" readonly>
      </div>

      <div class="form-group col-md-4">
        <label for="tiene_cartilla_salud">Cuenta con Cartilla Nacional de Salud de la Mujer:</label>
        <input type="text" class="form-control" id="tiene_cartilla_salud" name="tiene_cartilla_salud" value="<?php echo $data['tiene_cartilla_salud'] ?>" readonly>
      </div>

      <div class="form-group col-md-4 ">
        <label for="muestra_repetida">Muestra repetida:</label>
        <input type="text" class="form-control" id="muestra_repetida" name="muestra_repetida" value="<?php echo $data['muestra_repetida'] ?>" readonly>
      </div>

      <div class="form-group col-md-4">
        <label for="citologico_anterior">Número citológico anterior:</label>
        <input type="number" min="0" class="form-control" id="citologico_anterior" name="citologico_anterior" value="<?php echo $data['citologico_anterior'] ?>" readonly>
      </div>
  <!-- EMPIEZA LOS RESLULTADOS -->
      <div class="page-header col-md-12 ">
        <h2><span class="label label-default">IV. Resultado de citología cervical</span></h2>
      </div>

      <div class="form-group col-md-4 ">
        <label for="fecha_interpretacion">Fecha de interpretación:</label>
        <input type="date" class="form-control" id="fecha_interpretacion" name="fecha_interpretacion" value="<?php echo date('Y-m-d');?>">
      </div>

      <div class="form-group col-md-4">
        <label for="numero_citologico">Número citológico:</label>
        <input type="number" min="0" class="form-control" id="numero_citologico" name="numero_citologico" value="<?php echo $data['numero_citologico'] ?>" readonly>
      </div>

      <!-- COMINEZA SELECT PARA LABORATORIO --> 
        <div class="form-group col-md-4">
            <label for="laboratorio">Laboratorio:</label>
            <select name="laboratorio" class="form-control" >
                  <?php foreach ($rowsLaboratorio as $key) {
                    if($key['id']== '1'){
                      echo '<option value="'.$key['nombre'].'">'.$key['nombre'].'</option>';
                    }
                  }?>
            </select>    
        </div>
      <!-- FIN DEL SELECT PARA LABORATORIO -->

      <div class="form-group col-md-6 ">
        <label for="diagnostico_citologico">A. Categoría general del diagnóstico citológico (Bethesda):</label>
          <select name="diagnostico_citologico" class="form-control">
            <!--   <option value="NO CAPTURADO">Selecciona Opción</option> -->
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
        <label for="otros_hallazgos_citologicos">B. Otros hallazgos:</label>
          <select name="otros_hallazgos_citologicos" class="form-control">
            <option value="NINGUNO">Ninguno</option>
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

      <div class="form-group col-md-3 ">
      <label for="cedula_citotecnologo">RFC profesional del citotecnólogo (a):</label>
        <input type="text" class="form-control" id="rfc_responsable" name="cedula_citotecnologo" required>
      </div>

      <div class="form-group col-md-3">
        <label for=""><br>Nombre: </label>
        <input type="text" class="form-control" id="rfc_responsable_nombre" name="" placeholder="Ingresa Nombre" readonly="">
      </div>

      <div class="form-group col-md-3">
        <label for=""><br>Apellido Paterno:</label>
        <input type="text" class="form-control" id="rfc_responsable_ape_pat" name="" placeholder="Ingresa Apellido Paterno" readonly="">
      </div>

      <div class="form-group col-md-3">
        <label for=""><br>Apellido Materno:</label>
        <input type="text" class="form-control" id="rfc_responsable_ape_mat" name="" placeholder="Ingresa Apellido Materno" readonly="">
      </div>

      <div class="form-group col-md-4 ">
        <label for="caracteristicas_muestra">Características de la muestra:</label>
          <select name="caracteristicas_muestra" id="caracteristicas_muestra" class="form-control">
            <option value="Adecuada Procesada">1. Adecuada Procesada</option>
            <option value="Inadecuada Procesada">2. Inadecuada Procesada</option>
            <option value="Inadecuada No Procesada">3. Inadecuada No Procesada</option>
          </select>
      </div>

      <div class="form-group col-md-4">
        <label for="repetir_estudio">Repetir estudio:</label>
        <input type="text" class="form-control" id="repetir_estudio" name="repetir_estudio" value="NO" readonly>
      </div>

      <div class="form-group col-md-4">
        <label for="motivo_repeticion">Motivo:</label>
          <select name="motivo_repeticion" id="motivo_repeticion" class="form-control" disabled>
            <option value="Earticios, hemorragia, inamación y/o">1. Articios, hemorragia, inamación y/o</option>
            <option value="Laminilla rota">2. Laminilla rota</option>
            <option value="Frotis grueso">3. Frotis grueso</option>
            <option value="Muestra mal fijada">3. Muestra mal fijada</option>
            <option value="Otro especifique">4. Otro especifique</option>
          </select>
      </div>

      <div class="form-group col-md-12 hidden" id="motivo_repeticion_otro_hidden">
        <label for="motivo_repeticion_otro">Otro Motivo De Repetición</label>
        <input type="text"  class="form-control" id="motivo_repeticion_otro" name="motivo_repeticion_otro" disabled>
      </div>

      <div class="form-group col-md-4">
        <label for="revisada_patologo">La muestra fue revisada por el patólogo (a):</label>
          <select name="revisada_patologo" class="form-control">
            <option value="SI">1. SI</option>
            <option value="NO">2. NO</option>
          </select>
      </div>

      <div class="form-group col-md-8 " >
        <label for="cedula_patologo">RFC profesional del patólogo (a):</label>
        <input type="text"  class="form-control" id="cedula_patologo" name="cedula_patologo" >
      </div>

      <div class="form-group col-md-12 " >
        <label for="diagnostico_patologo">Diagnóstico del patólogo (a) (De acuerdo a la nomenclatura del reactivo 31):</label>
        <input type="text"  class="form-control" id="rfc_responsable" name="diagnostico_patologo" placeholder="<?php echo $data['diagnostico_patologo'] ?>">
      </div>

      

      <div class="form-group col-md-3 hidden">
        <label for=""><br>Nombre: </label>
        <input type="text" class="form-control" id="cedula_patologo_nombre" name="" readonly="">
      </div>

      <div class="form-group col-md-3 hidden">
        <label for=""><br>Apellido Paterno:</label>
        <input type="text" class="form-control" id="cedula_patologo_ape_pat" name="" readonly="">
      </div>

      <div class="form-group col-md-3 hidden">
        <label for=""><br>Apellido Materno:</label>
        <input type="text" class="form-control" id="cedula_patologo_ape_mat" name="" readonly="">
      </div>

      <button type="submit" class="btn btn-default col-md-4" name="submit">Enviar a cola de Impresión</button>
    </form>
<?php
} else{
  echo "<script>location.href='../laboratorio/citologia.php'</script>";
}
?>
  </div>
</section>

<?php
  include("../footer.php");
?>