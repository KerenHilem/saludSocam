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
      $unidad_numero=$_SESSION['unidad_id'];
    if(isset($_POST['submit'])){
    $_SESSION['id'] = $unidad_numero;

      $edad = $_POST['edad'];
      $unidad_id= $unidad_numero;
      $paciente_id= $_POST['paciente_id'];
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
     // $factores_riesgo= $_POST['factores_riesgo'];
      $factores_riesgo= "NO CAPTURADO";
      $tiene_cartilla_salud= $_POST['tiene_cartilla_salud'];
      $muestra_repetida= $_POST['muestra_repetida'];
      $citologico_anterior= $_POST['citologico_anterior'];
      $fecha_interpretacion= $_POST['fecha_interpretacion'];
      $numero_citologico= $_POST['numero_citologico'];
      $laboratorio= $_POST['laboratorio'];
      $caracteristicas_muestra= $_POST['caracteristicas_muestra'];
      $diagnostico_citologico= $_POST['diagnostico_citologico'];
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
        // echo 'Exite al menos un registro de meta doctor';
        if($edad>24 && $edad<=35){
          $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango1=rango1+1 WHERE doctor_id = '$id'");
        }else if($edad>=36 && $edad <= 65){
          $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango2=rango2+1 WHERE doctor_id = '$id'");
        }
      }
       else {
        // echo 'No existe, crear registro de meta doctor ';
         if($edad>=24 && $edad<=35){
        $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$id','$unidad_id' ,'$ano', '$mes', '1', '0', '0', NOW(), NOW())");
         }else if($edad>=36 && $edad <= 65){
          $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$id','$unidad_id' ,'$ano', '$mes', '0', '1', '0', NOW(), NOW())");
        }
      }

            $existe_meta_unidad = $mysqli->query("SELECT * FROM meta_unidad_citologia WHERE unidad_id='$unidad_id' AND ano=$ano AND mes=$mes");

      if (mysqli_num_rows($existe_meta_unidad)>0)
      {
        echo 'Exite al menos un registro de meta unidad';
        if($edad>24 && $edad<=35){
          $actualizar = $mysqli->query("UPDATE meta_unidad_citologia SET rango1=rango1+1 WHERE unidad_id = '$unidad_id'");
        }else if($edad>=36 && $edad <= 65){
          $actualizar = $mysqli->query("UPDATE meta_unidad_citologia SET rango2=rango2+1 WHERE unidad_id = '$unidad_id'");
        }
      }
       else {
        echo 'No existe, crear registro de meta unidad';
         if($edad>=24 && $edad<=35){
        $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '1', '0', '0', NOW(), NOW())");
         }else if($edad>=36 && $edad <= 65){
          $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '0', '1', '0', NOW(), NOW())");
        }
      }

$query = $mysqli->query("INSERT INTO citologia VALUES('', '$unidad_id', '$paciente_id', '$citologia', '$situacion_ginecoobstetrica', '$inicio_vida_sexual', '$edad_inicio_vida_sexual', '$antecedentes_vacunacion_vph', '$edad_antecedentes_vacunacion_vph', '$dosis', '$ultima_regla', '$exploracion_observa', '$utensilio_muestra', '$rfc_responsable', '$fecha_toma_muestra', '$factores_riesgo', '$tiene_cartilla_salud', '$muestra_repetida', '$citologico_anterior', '$fecha_interpretacion', '$numero_citologico', '$laboratorio', '$caracteristicas_muestra', '$diagnostico_citologico', '$repetir_estudio', '$motivo_repeticion', '$cedula_citotecnologo', '$revisada_patologo', '$diagnostico_patologo', '$cedula_patologo', NOW(), NOW(),'DETECCION')");

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
          <strong>Alerta!</strong> Error.
        </div>
        <?php
      }
    }
 

      $jurisdiccion=$_SESSION['jurisdiccion'];
      if($_SESSION['nivel']==1){
        $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      }
      else if($_SESSION['nivel']==2 || $_SESSION['nivel']==3 || $_SESSION['nivel']==4){
      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
    }
      $rowsPaciente = $mysqli->query("SELECT id, apellido_pat, apellido_mat, nombre FROM pacientes ORDER BY apellido_pat");

     $unidadesDatos = $mysqli->query("SELECT unidades.nombre, unidades.clues, municipios.nombre AS municipios_nombre, jurisdicciones.nombre AS jurisdicciones_nombre FROM unidades, jurisdicciones, municipios WHERE unidades.id='$unidad_numero' AND jurisdicciones.id=unidades.jurisdiccion_id AND jurisdicciones.municipio_id=municipios.id");
      
      $dataUnidad = $unidadesDatos->fetch_assoc();
    ?>


    <div class="page-header col-md-12">
        <h2><span class="label label-default">I. Identificación de la Unidad</span></h2>
    </div>

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
        <div class="form-group col-md-3">
            <label for="paciente_id">Paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-control" >
              <option value="-1">SELECCIONA PACIENTE</option>';
                <?php foreach ($rowsPaciente as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['apellido_pat'].' '.$key['apellido_mat'].' '.$key['nombre'].'</option>';
                }?>
            </select>
        </div>

             <div class="form-group col-md-3 hidden">
          <label for="cicam_clave">Clave Sicam:</label>
          <input type="text" class="form-control" id="cicam_clave" name="cicam_clave" readonly>
        </div>
        <div class="form-group col-md-3">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" readonly>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_pat">Apellido Paterno:</label>
          <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" readonly>
        </div>

         <div class="form-group col-md-3">
          <label for="apellido_mat">Apellido Materno:</label>
          <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="entidad_nacimiento">Entidad de nacimiento:</label>
          <input type="text" class="form-control" id="entidad_nacimiento" name="entidad_nacimiento" readonly>
        </div>
        
        <div class="form-group col-md-3">
          <label for="municipio_nacimiento">Municipio de Nacimiento:</label>
          <input type="text" class="form-control" id="municipio_nacimiento" name="municipio_nacimiento" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"/ readonly="">
        </div>

         <div class="form-group col-md-3">
          <label for="edad">Edad:</label>
          <input type="text" class="form-control" id="edad" name="edad" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="curp">Curp:</label>
          <input type="text" class="form-control" id="curp" name="curp" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="calle">Calle:</label>
          <input type="text" class="form-control" id="calle" name="calle" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="numero">Número:</label>
          <input type="number" class="form-control" id="numero" name="numero" readonly>
        </div>
        
        <div class="form-group col-md-3">
          <label for="colonia">Colonia:</label>
          <input type="text" class="form-control" id="colonia" name="colonia" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="telefono">Teléfono:</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" readonly>
        </div>

           <div class="form-group col-md-3">
          <label for="otro_telefono">Teléfono:</label>
          <input type="tel" class="form-control" id="otro_telefono" name="otro_telefono" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="correo">Correo:</label>
          <input type="email" class="form-control" id="correo" name="correo" readonly>
        </div>

      <!-- COMINEZA SELECT PARA LOCALIDAD -->
        <div class="form-group col-md-3">
            <label for="localidad">Localidad:</label>
            <input type="text" class="form-control" id="localidad" name="localidad" readonly>
        </div>
      <!-- FIN DEL SELECT PARA LOCALIDAD -->
        
      <!-- EMPIEZA SELECTO MUNICIPIOS-->
        <div class="form-group col-md-3">
            <label for="municipio_id">Municipio:</label>
            <input type="text" class="form-control" id="municipio_id" name="municipio_id"  readonly>
        </div>
      <!-- TERMINA SELECT MUNICIPIO-->

        <div class="form-group col-md-3">
          <label for="delegacion">Delegación:</label>
          <input type="text" class="form-control" id="delegacion" name="delegacion" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="cp">C.P:</label>
          <input type="text" class="form-control" id="cp" name="cp" readonly>
        </div>

      <div class="form-group col-md-3">
          <label for="entidad_federativa">Entidad Federativa:</label>
          <input type="text" class="form-control" id="entidad_federativa" name="entidad_federativa" readonly>
        </div>

        <div class="form-group col-md-3">
          <label for="afiliacion">Afiliación:</label>
          <input type="text" class="form-control" id="afiliacion" name="afiliacion" readonly>
        </div>

         <div class="form-group col-md-3">
          <label for="num_poliza">Número de Poliza:</label>
          <input type="text" class="form-control" id="num_poliza" name="num_poliza" readonly>
        </div>


      <!-- FIN DEL SELECT PARA PACIENTE -->

    <div class="page-header col-md-12">
        <h2><span class="label label-default">III. Antecedentes del Paciente</span></h2>
    </div>
      <!-- COMINEZA SELECT PARA CITOLOGIA -->
        <div class="form-group col-md-6">
          <label for="citologia">Citología:</label>
            <select name="citologia" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
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
              <option value="NO CAPTURADO">Selecciona Opción</option>
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
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
            </select>
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="edad_inicio_vida_sexual">Edad de inicio de vida sexual:</label>
          <input type="number" min="0" class="form-control" id="edad_inicio_vida_sexual" name="edad_inicio_vida_sexual" placeholder="Ingresa Número" type="hidden">
        </div>


        <div class="form-group col-md-6 hidden">
          <label for="antecedentes_vacunacion_vph">Antecedentes de vacunacion VPH:</label>
            <select name="antecedentes_vacunacion_vph" class="form-control" type="hidden">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
            </select>
        </div>

        <div class="form-group col-md-3 hidden">
          <label for="edad_antecedentes_vacunacion_vph">Edad:</label>
          <input type="number" min="0" class="form-control" id="edad_antecedentes_vacunacion_vph" name="edad_antecedentes_vacunacion_vph" placeholder="Ingresa Número">
        </div>

        <div class="form-group col-md-3 hidden">
          <label for="dosis">Numero de dosis:</label>
            <select name="dosis" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Una">1. Una</option>
              <option value="Dos">2. Dos</option>
              <option value="Tres">3. Tres</option>
              <option value="Completo">4. Completo</option>
            </select>
        </div>

        <div class="form-group col-md-6">
          <label for="ultima_regla">Fecha de ultima regla:</label>
          <input type="date" class="form-control" id="ultima_regla datePicker" name="ultima_regla" value="<?php echo date('Y-m-d');?>">
        </div>

        <div class="form-group col-md-6 hidden">
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

        <div class="form-group col-md-6 hidden">
          <label for="utensilio_muestra">Utensilio con el que se tomo la muestra:</label>
            <select name="utensilio_muestra" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Espatula de ayre modificada">1. Espatula de ayre modificada</option>
              <option value="Citobrush">2. Citobrush</option>
              <option value="Hisopo">3. Hisopo</option>
              <option value="Otro especifique">4. Otro especifique</option>
            </select>
        </div>

        <div class="form-group col-md-3">
          <label for="rfc_responsable">RFC Responsable de la toma de citologia:</label>
          <input type="text" class="form-control" id="rfc_responsable" name="rfc_responsable" placeholder="Ingresa RFC">
        </div>

        <div class="form-group col-md-3">
          <label for="rfc_responsable_nombre"><br>Nombre: </label>
          <input type="text" class="form-control" id="rfc_responsable_nombre" name="rfc_responsable_nombre" placeholder="Ingresa Nombre">
        </div>

        <div class="form-group col-md-3">
          <label for="rfc_responsable_ape_pat"><br>Apellido Paterno:</label>
          <input type="text" class="form-control" id="rfc_responsable_ape_pat" name="rfc_responsable_ape_pat" placeholder="Ingresa Apellido Paterno">
        </div>


        <div class="form-group col-md-3">
          <label for="rfc_responsable_ape_mat"><br>Apellido Materno:</label>
          <input type="text" class="form-control" id="rfc_responsable_ape_mat" name="rfc_responsable_ape_mat" placeholder="Ingresa Apellido Materno">
        </div>

        <div class="form-group col-md-6">
          <label for="fecha_toma_muestra">Fecha de toma de la muestra:</label>
          <input type="date" class="form-control" id="fecha_toma_muestra" name="fecha_toma_muestra" value="<?php echo date('Y-m-d');?>">
        </div>

        <div class="form-group col-md-6 hidden">
          <label for="factores_riesgo">Factores de riesgo:</label>
            <div class="checkbox">
              <label>
                <input type="checkbox"  value="Inicio de relaciones sexuales antes de los 18 años">1. Inicio de relaciones sexuales antes de los 18 años
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"  value="Múltiples parejas sexuales">2. Múltiples parejas sexuales
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"  value="Antecedentes de infecciones de transmisión sexual">3. Antecedentes de infecciones de transmisión sexual
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"  value="Tabaquismo">4. Tabaquismo
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"  value="Ninguno">5. Ninguno
              </label>
            </div>
        </div>

        <div class="form-group col-md-6">
          <label for="tiene_cartilla_salud">Cuenta con Cartilla Nacional de Salud de la Mujer:</label>
            <select name="tiene_cartilla_salud" class="form-control" >
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
            </select>
        </div>

        <div class="form-group col-md-4 hidden">
          <label for="muestra_repetida">Muestra repetida:</label>
            <select name="muestra_repetida" class="form-control">
              <option value="NO CAPTURADO">Selecciona Opción</option>
              <option value="Si">1. Si</option>
              <option value="No">2. No</option>
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