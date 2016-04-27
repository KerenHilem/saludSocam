<?php
  require_once '../clases/Connection.simple2.php';
  include("../head.php");
  include("../nav.php");
?>
<section>
<div class="container">
 <div class="row">
      <div class="col-md-10"> <h3>Agregar Exploración Clínica</h3> </div>
      <div class="col-md-2 text-right">
        <h1><a href="../index/exploracionClinica.php" class="btn btn-primary"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></h1>
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

          /*de ejemplo
      $query = $mysqli->query("insert into exploracion_clinica values('','$unidad_id','$total_muestras','$muestras_rango1','$muestras_rango2','$muestras_inadecuadas','$muestras_fuera_rango', NOW(), NOW())");*/
$query = $mysqli->query("INSERT INTO exploracion_clinica VALUES('', '$unidad_id', '$paciente_id', '$fecha_atencion', '$fecha_ultima_mastografia', '$resultado_ultima_mastografia', '$edad_presentacion_menarca', '$antecedentes_familiares', '$edad_presentacion_menopausia', '$otros_factores', '$signos_clinicos', '$fecha_inicio_primer_signo', '$localizacion', '$cedula_realizo_estudio', '$conducta_seguir', '$motivo_referencia', '$fecha_referencia', NOW(), NOW())");

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
      $rowsUnidad = $mysqli->query("SELECT id, nombre FROM unidades ORDER by nombre");
      $rowsPaciente = $mysqli->query("SELECT id, nombre FROM pacientes ORDER by nombre");
    ?>

    <form role="form"  method="post">
     
      <!-- COMINEZA SELECT PARA UNIDADES -->
        <div class="form-group col-md-12">
            <label for="unidad_id">Unidad:</label>
            <select name="unidad_id" class="form-control" >
              <option value="-1">SELECCIONA UNIDAD</option>';
                <?php foreach ($rowsUnidad as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA UNIDADES -->

      <!-- COMINEZA SELECT PARA PACIENTE -->
        <div class="form-group col-md-12">
            <label for="paciente_id">Paciente:</label>
            <select name="paciente_id" class="form-control" >
              <option value="-1">SELECCIONA PACIENTE</option>';
                <?php foreach ($rowsPaciente as $key) {
                  echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                }?>
            </select>
        </div>
      <!-- FIN DEL SELECT PARA PACIENTE -->

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
              <option value="Madre">1. Madre</option>
              <option value="Hermana">2. Hermana</option>
              <option value="Hija">3. Hija</option>
              <option value="Madre y Hermana">4. Madre y Hermana</option>
              <option value="Madre e Hija">5. Madre e Hija</option>
              <option value="Hermana e Hija">6. Hermana e Hija</option>
              <option value="Otro">7. Otro</option>
              <option value="Ninguno">8. Ninguno</option>
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


       <div class="form-group col-md-12">
          <label for="fecha_inicio_primer_signo">Fecha de inicio del primer síntoma o signo:</label>
          <input type="date" class="form-control" id="fecha_inicio_primer_signo" name="fecha_inicio_primer_signo" placeholder="Ingresa Fecha">
        </div>


        <div class="form-group col-md-3 col-xl-3 col-xs-3">
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
          
        </div>

        <div class="form-group col-md-7 col-xl-7 col-xs-7">
          <img src="../plantilla/images/diagrama_exploracion_clinica.PNG">
        </div>
        
        <div class="form-group col-md-2 col-xl-2 col-xs-2">
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

         <div class="form-group col-md-6">
          <label for="conducta_seguir">Conducta a seguir:</label>
            <select name="conducta_seguir" class="form-control" >
              <option value="Cita en seis meses">1. Cita en seis meses</option>
              <option value="Detección de rutina en un año">2. Detección de rutina en un año</option>
              <option value="Mastografía de tamizaje">3. Mastografía de tamizaje</option>
              <option value="Referencia a evaluación con imagen complementaria ( Masto. diagnóstica o USG)">4. Referencia a evaluación con imagen complementaria ( Masto. diagnóstica o USG)</option>
            </select>
        </div>

        <div class="form-group col-md-6">
          <label for="motivo_referencia">Motivo de la referencia:</label>
            <select name="motivo_referencia" class="form-control" >
              <option value="Tumoración palpable">1. Tumoración palpable</option>
              <option value="Signos sugestivos">2. Signos sugestivos</option>
              <option value="Mamografía anormal">3. Mamografía anormal</option>
              <option value="Factores de riesgo">4. Factores de riesgo</option>
            </select>
        </div>        

        <div class="form-group col-md-6">
          <label for="fecha_referencia">Fecha de referencia:</label>
          <input type="date" class="form-control" id="fecha_referencia" name="fecha_referencia" placeholder="Ingresa Fecha">
        </div>


        <button type="submit" class="btn btn-default" name="submit">Enviar</button>
    </form>
  </div>
</section>
<?php
  include("../footer.php");
?>