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

      $result = $mysqli->query("select * from exploracion_clinica where id='$id' limit 0,1");
      $data = $result->fetch_assoc();
?>
    <div class="row">
      <div class="col-md-10">
        <h1>Actualización de Datos</h1>
      </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/exploracionClinica.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-="true"></span> Back</a></h1>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $unidad_id= $_POST['unidad_id'];
      $paciente_id= $_POST['paciente_id'];
      $fecha_atencion= $_POST['fecha_atencion'];
      $fecha_ultima_mastografia= $_POST['fecha_ultima_mastografia'];
      $resultado_ultima_mastografia= $_POST['resultado_ultima_mastografia'];
      $edad_presentacion_menarca= $_POST['edad_presentacion_menarca'];
      $antecedentes_familiares= $_POST['antecedentes_familiares'];
      $edad_presentacion_menopausia= $_POST['edad_presentacion_menopausia'];
      $otros_factores= $_POST['otros_factores'];
      $signos_clinicos= $_POST['signos_clinicos'];
      $fecha_inicio_primer_signo= $_POST['fecha_inicio_primer_signo'];
      $localizacion= $_POST['localizacion'];
      $cedula_realizo_estudio= $_POST['cedula_realizo_estudio'];
      $conducta_seguir= $_POST['conducta_seguir'];
      $motivo_referencia= $_POST['motivo_referencia'];
      $fecha_referencia= $_POST['fecha_referencia'];

      /*$query = $mysqli->query("update pacientes set cicam_clave='$cicam_clave', nombre='$nombre', apellido_pat='$apellido_pat', apellido_pat='$apellido_pat',entidad_nacimiento='$entidad_nacimiento',municipio_nacimiento='$municipio_nacimiento',fecha_nacimiento='$fecha_nacimiento',curp='$curp',calle='$calle',numero=$numero,colonia='$colonia',telefono='$telefono',otro_telefono='$otro_telefono',correo='$correo',localidad='$localidad',municipio_id='$municipio_id',delegacion='$delegacion',cp='$cp',entidad_federativa='$entidad_federativa',jurisdiccion_id='$jurisdiccion_id',tiempo_residencia='$tiempo_residencia',estado_civil='$estado_civil',escolaridad='$escolaridad',ocupacion='$ocupacion',afiliacion='$afiliacion',afiliacion_otro='$afiliacion_otro', modificado = NOW() where id='$id'");*/
      $query = $mysqli->query("UPDATE exploracion_clinica SET unidad_id='$unidad_id', paciente_id='$paciente_id',fecha_atencion='$fecha_atencion',fecha_ultima_mastografia='$fecha_ultima_mastografia', resultado_ultima_mastografia='$resultado_ultima_mastografia',edad_presentacion_menarca='$edad_presentacion_menarca', antecedentes_familiares='$antecedentes_familiares', edad_presentacion_menopausia='$edad_presentacion_menopausia',otros_factores='$otros_factores',signos_clinicos='$signos_clinicos',fecha_inicio_primer_signo='$fecha_inicio_primer_signo', localizacion='$localizacion', cedula_realizo_estudio='$cedula_realizo_estudio',conducta_seguir='$conducta_seguir',motivo_referencia='$motivo_referencia',fecha_referencia='$fecha_referencia', modificado=NOW() WHERE id='$id'");
      if($query){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-="true">&times;</span></button>
          <strong>Éxito!</strong> Datos Actualizados.
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
    $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades where jurisdiccion_id='$jurisdiccion' ORDER by nombre");
    $rowsPaciente = $mysqli->query("SELECT id, apellido_pat, apellido_mat, nombre FROM pacientes ORDER BY apellido_pat");

    ?>
    <br/>
  <form role="form"  method="post">
     
      <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-4">
            <label for="unidad_id">Unidad:</label>
            <select class="form-control" name="unidad_id" id="unidad_id"  >
              <option value="-1">SELECCIONA UNIDAD</option>';
                <?php foreach ($rowsUnidad as $key) {
                  if ($key['id']==$data['unidad_id']) {
                    echo '<option value="'.$key['id'].'" selected>'.$key['nombre'].'</option>';
                  }else
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

      <div class="form-group col-md-4">
        <label for="">CLUES:</label>
        <input type="text" class="form-control" id="clues" name="clues" placeholder="" readonly>
      </div>

      <div class="form-group col-md-4">
        <label for="">Institución:</label>
        <input type="text" class="form-control" id="" name="" placeholder="" readonly>
      </div>

      <div class="form-group col-md-4">
         <label for="">Entidad/Delegación:</label>
         <input type="text" class="form-control" id="" name="" placeholder="" readonly>
      </div>

      <div class="form-group col-md-4">
         <label for="">Jurisdicción:</label>
         <input type="text" class="form-control" id="jurisdicciones_nombre" name="jurisdicciones_nombre" placeholder="" readonly>
      </div>

      <div class="form-group col-md-4">
         <label for="">Municipio:</label>
         <input type="text" class="form-control" id="municipios_nombre" name="municipios_nombre" placeholder="" readonly>
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
                if ($key['id']==$data['paciente_id']) {
                  echo '<option value="'.$key['id'].'"selected>'.$key['apellido_pat'].' '.$key['apellido_mat'].' '.$key['nombre'].'</option>';
                }else{
                   echo '<option value="'.$key['id'].'"selected>'.$key['apellido_pat'].' '.$key['apellido_mat'].' '.$key['nombre'];
                }
                }?>
            </select>
        </div>

        <div class="form-group col-md-3">
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
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" readonly>
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
          <h2><span class="label label-default">III. Factores de Riesgo</span></h2>
        </div>

        <div class="form-group col-md-6">
          <label for="fecha_atencion">Fecha de atención:</label>
          <input type="date" class="form-control" id="fecha_atencion" name="fecha_atencion" placeholder="Ingresa Fecha">
        </div>


        <div class="form-group col-md-6">
          <label for="fecha_ultima_mastografia">Fecha de ultima mastografia:</label>
          <input type="date" class="form-control" id="fecha_ultima_mastografia" name="fecha_ultima_mastografia" placeholder="Ingresa Fecha">
        </div>


         <div class="form-group col-md-12">
          <label for="resultado_ultima_mastografia">Resultado de ultima mastografia:</label>
          <input type="text" class="form-control" id="resultado_ultima_mastografia" name="resultado_ultima_mastografia" placeholder="">
        </div>


        <div class="form-group col-md-6">
          <label for="edad_presentacion_menarca">Edad de presentación de la menarca:</label>
          <input type="number" min="0" class="form-control" id="edad_presentacion_menarca" name="edad_presentacion_menarca" placeholder="Ingresa Número">
        </div>


        <div class="form-group col-md-6">
          <label for="antecedentes_familiares">En que familiares tiene antecedentes de cáncer mamario:</label>
            <select name="antecedentes_familiares" class="form-control" >
              <option value="Madre" <?php if($data['antecedentes_familiares']=="Madre") echo "selected";?>>1. Madre</option>
              <option value="Hermana" <?php if($data['antecedentes_familiares']=="Hermana") echo "selected";?>>2. Hermana</option>
              <option value="Hija" <?php if($data['antecedentes_familiares']=="Hija") echo "selected";?>>3. Hija</option>
              <option value="Madre y Hermana" <?php if($data['antecedentes_familiares']=="Madre y Hermana") echo "selected";?>>4. Madre y Hermana</option>
              <option value="Madre e Hija" <?php if($data['antecedentes_familiares']=="Madre e Hija") echo "selected";?>>5. Madre e Hija</option>
              <option value="Hermana e Hija" <?php if($data['antecedentes_familiares']=="Hermana e Hija") echo "selected";?>>6. Hermana e Hija</option>
              <option value="Otro" <?php if($data['antecedentes_familiares']=="Otro") echo "selected";?>>7. Otro</option>
              <option value="Ninguno" <?php if($data['antecedentes_familiares']=="Ninguno") echo "selected";?>>8. Ninguno</option>
            </select>
        </div>


        <div class="form-group col-md-6">
          <label for="edad_presentacion_menopausia">Edad de presentación de la menopausia:</label>
          <input type="number" min="0" class="form-control" id="edad_presentacion_menopausia" name="edad_presentacion_menopausia" placeholder="Ingresa Número">
        </div>


        <div class="form-group col-md-12">
          <label for="otros_factores">Otros factores de riesgo:</label>
          <input type="text" class="form-control" id="otros_factores" name="otros_factores" placeholder="">
        </div>


  <!-- EMPIEZA LOS DATOS CLINICOS -->
        <div class="page-header col-md-12 ">
            <h2><span class="label label-default">IV. Datos Clínicos</span></h2>
        </div>

                 <div class="form-group col-md-12">
          <label for="signos_clinicos">Signos clínicos:</label>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Nódulos sólidos, irregulares de consistencia dura jo a planos profundos">1. Nódulos sólidos, irregulares de consistencia dura jo a planos profundos
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Cambios cutáneos evidentes (piel de naranja, retracción de la piel, lesión areolar que no cicatriza a pesar del tratamiento)">2. Cambios cutáneos evidentes (piel de naranja, retracción de la piel, lesión areolar que no cicatriza a pesar del tratamiento)
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Zona de sistematización en el tejido glandular focalizado a una sola mama y región">3. Zona de sistematización en el tejido glandular focalizado a una sola mama y región
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Secreción serosanguinolenta">4. Secreción serosanguinolenta
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Crecimiento ganglionar axilar o supreclavicular">5. Crecimiento ganglionar axilar o supreclavicular
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Ninguno">6. Ninguno
              </label>
            </div>
        </div>


       <div class="form-group col-md-6">
          <label for="fecha_inicio_primer_signo">Fecha de inicio del primer síntoma o signo:</label>
          <input type="date" class="form-control" id="fecha_inicio_primer_signo" name="fecha_inicio_primer_signo" placeholder="Ingresa Fecha">
        </div>


        <div class="form-group col-md-12">
          <label for="localizacion">Localización:</label>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="1">1. 1
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="2">1. 2
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="3">1. 3
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="4">1. 4
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="5">1. 5
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Axila)">6. Axila
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Hueco supra clavicular">7. Hueco supra clavicular
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Mama derecha">8. Mama derecha
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="9">9. 9
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="10">10. 10
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="11">11. 11
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="12">12. 12
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="13">13. 13
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Axila">14. Axila
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Hueco supra clavicular">15. Hueco supra clavicular
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="Mama izquierda">16. Mama izquierda
              </label>
            </div>
        </div>


        <div class="form-group col-md-6">
          <label for="cedula_realizo_estudio">Cédula profesional de quién realizó el estudio:</label>
          <input type="text"  class="form-control" id="cedula_realizo_estudio" name="cedula_realizo_estudio" placeholder="Ingresa Cédula">
        </div>


       <!-- EMPIEZA REFERENCIA -->
        <div class="page-header col-md-12 ">
            <h2><span class="label label-default">V. Referencia</span></h2>
        </div> 

         <div class="form-group col-md-6">
          <label for="conducta_seguir">Conducta a seguir:</label>
            <select name="conducta_seguir" class="form-control" >
              <option value="Cita en seis meses" <?php if($data['conducta_seguir']=="Cita en seis meses") echo "selected";?>>1. Cita en seis meses</option>
              <option value="Detección de rutina en un año" <?php if($data['conducta_seguir']=="Detección de rutina en un año") echo "selected";?>>2. Detección de rutina en un año</option>
              <option value="Mastografía de tamizaje" <?php if($data['conducta_seguir']=="Mastografía de tamizaje") echo "selected";?>>3. Mastografía de tamizaje</option>
              <option value="Referencia a evaluación con imagen complementaria ( Masto. diagnóstica o USG)" <?php if($data['conducta_seguir']=="Referencia a evaluación con imagen complementaria ( Masto. diagnóstica o USG)") echo "selected";?>>4. Referencia a evaluación con imagen complementaria ( Masto. diagnóstica o USG)</option>
            </select>
        </div>

        <div class="form-group col-md-6">
          <label for="motivo_referencia">Motivo de la referencia:</label>
            <select name="motivo_referencia" class="form-control" >
              <option value="Tumoración palpable" <?php if($data['motivo_referencia']=="Tumoración palpable") echo "selected";?>>1. Tumoración palpable</option>
              <option value="Signos sugestivos" <?php if($data['motivo_referencia']=="Signos sugestivos") echo "selected";?>>2. Signos sugestivos</option>
              <option value="Mamografía anormal" <?php if($data['motivo_referencia']=="Mamografía anormal") echo "selected";?>>3. Mamografía anormal</option>
              <option value="Factores de riesgo" <?php if($data['motivo_referencia']=="Factores de riesgo") echo "selected";?>>4. Factores de riesgo</option>
            </select>
        </div>        

        <div class="form-group col-md-6">
          <label for="fecha_referencia">Fecha de referencia:</label>
          <input type="date" class="form-control" id="fecha_referencia" name="fecha_referencia" placeholder="Ingresa Fecha">
        </div>


        <button type="submit" class="btn btn-default col-md-3" name="submit">Enviar al Laboratorio</button>
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