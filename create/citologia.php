<?php

      //edad que se utiliza para metas de citología
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


      // para capturar el valor y en caso de usar el disable, porque al momento de usar el disable elimina 
      // la variable post o get
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
      //variables de citologia seccion de resultados
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

      //METAS CITOLOGIA
      include("../create/metasCitologia.php");
        
      //insertar citologia
      $query = $mysqli->query("INSERT INTO citologia VALUES('', '$unidad_id',(SELECT id FROM pacientes 
        WHERE nombre='$nombre' AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' 
        AND fecha_nacimiento='$fecha_nacimiento'), '$citologia', '$situacion_ginecoobstetrica', 
      '$inicio_vida_sexual', '$edad_inicio_vida_sexual', '$antecedentes_vacunacion_vph', 
      '$edad_antecedentes_vacunacion_vph', '$dosis', '$ultima_regla', '$exploracion_observa', 
      '$utensilio_muestra', '$rfc_responsable', '$fecha_toma_muestra', '$factores_riesgo', 
      '$tiene_cartilla_salud', '$muestra_repetida', '$citologico_anterior', '$fecha_interpretacion', 
      '$numero_citologico', '$laboratorio', '$caracteristicas_muestra', '$diagnostico_citologico',
      '$otros_hallazgos_citologicos', '$repetir_estudio', '$motivo_repeticion', '$cedula_citotecnologo', 
      '$revisada_patologo', '$diagnostico_patologo','NO CAPTURADO', '$cedula_patologo','DETECCION', 
      NOW(), NOW())");
      //mio
      $query = $mysqli->query("INSERT INTO citologia VALUES('', '$unidad_id',(SELECT id FROM pacientes 
        WHERE nombre='$nombre' AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' 
        AND fecha_nacimiento='$fecha_nacimiento'), '$citologia', '$situacion_ginecoobstetrica', 
      '$inicio_vida_sexual', '$edad_inicio_vida_sexual', '$antecedentes_vacunacion_vph', 
      '$edad_antecedentes_vacunacion_vph', '$dosis', '$ultima_regla', '$exploracion_observa', 
      '$utensilio_muestra', '$rfc_responsable', '$fecha_toma_muestra', '$factores_riesgo', 
      '$tiene_cartilla_salud', '$muestra_repetida', '$citologico_anterior', '$fecha_interpretacion', 
      '$numero_citologico', '$laboratorio', '$caracteristicas_muestra', '$diagnostico_citologico',
      '$otros_hallazgos', '$repetir_estudio', '$motivo_repeticion', '$cedula_citotecnologo', 
      '$revisada_patologo', '$diagnostico_patologo', '$cedula_patologo', NOW(), NOW(),'DETECCION')");

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