        <?php

        if(isset($_POST['submit'])){

          //factores de riesgo
          $presento_menarca = $_POST['presento_menarca'];
          if (isset($_POST['edad_presentacion_menarca'])){   
            $edad_presentacion_menarca = $_POST['edad_presentacion_menarca'];
          }else {
            $edad_presentacion_menarca = 0; 
          }
          $presento_menopausia = $_POST['presento_menopausia'];
          if (isset($_POST['edad_presentacion_menopausia'])){   
            $edad_presentacion_menopausia = $_POST['edad_presentacion_menopausia'];
          }else {
            $edad_presentacion_menopausia = 0; 
          }
          $utiliza_terapia = $_POST['utiliza_terapia'];
          if (isset($_POST['tiempo_utilizacion'])){   
            $tiempo_utilizacion = $_POST['tiempo_utilizacion'];
          }else {
            $tiempo_utilizacion = 0; 
          }
          $nuligesta = $_POST['nuligesta'];
          if (isset($_POST['fecha_primer_embarazo'])){   
            $fecha_primer_embarazo = $_POST['fecha_primer_embarazo'];
          }else {
            $fecha_primer_embarazo = '0000-00-00'; 
          }
          if (isset($_POST['amamanto_hijos'])){   
            $amamanto_hijos = $_POST['amamanto_hijos'];
          }else {
            $amamanto_hijos = "N/A"; 
          }
          $antecedentes_familiares = $_POST['antecedentes_familiares'];
          if (isset($_POST['edad_familiar'])){   
            $edad_familiar = $_POST['edad_familiar'];
          }else {
            $edad_familiar = 0; 
          }
          $antecente_personal = $_POST['antecedente_personal'];
          if (isset($_POST['ano_diagnostico'])){   
            $ano_diagnostico = $_POST['ano_diagnostico'];
          }else {
            $ano_diagnostico = 0; 
          }
          $enfermedad_benigna = $_POST['enfermedad_benigna'];
          if (isset($_POST['especifique'])){   
            $especifique = $_POST['especifique'];
          }else {
            $especifique = "N/A"; 
          }
          $cirugia_mama = $_POST['cirugia_mama'];
          if (isset($_POST['tipo_cirugia'])){   
            $tipo_cirugia = $_POST['tipo_cirugia'];
          }else {
            $tipo_cirugia = "N/A"; 
          }
          if (isset($_POST['ano_cirugia'])){   
            $ano_cirugia = $_POST['ano_cirugia'];
          }else {
            $ano_cirugia = 0; 
          }
          if (isset($_POST['otro_especifique'])){   
            $otro_especifique = $_POST['otro_especifique'];
          }else {
            $otro_especifique = "N/A"; 
          }
          $antecedente_hiperplasia = $_POST['antecedente_hiperplasia'];
          $otros_factores_cancer = $_POST['otros_factores_cancer'];
          if (isset($_POST['otros_factores'])){   
            $otros_factores = $_POST['otros_factores'];
          }else {
            $otros_factores = "N/A"; 
          }

          //exploración clínica de mama
          $antecedentes_deteccion = $_POST['antecedentes_deteccion'];
          if (isset($_POST['fecha_ultimo_estudio'])){   
            $fecha_ultimo_estudio = $_POST['fecha_ultimo_estudio'];
          }else {
            $fecha_ultimo_estudio = '0000-00-00'; 
          }
          if (isset($_POST['resultado_ultimo_estudio'])){   
            $resultado_ultimo_estudio = $_POST['resultado_ultimo_estudio'];
          }else {
            $resultado_ultimo_estudio = "N/A"; 
          }
          

          //datos clinicos
          $signos_clinicos = $_POST['signos_clinicos'];
          $fecha_inicio_primer_signo = $_POST['fecha_inicio_primer_signo'];
          $localizacion = $_POST['localizacion'];
          $cedula_realizo_estudio = $_POST['cedula_realizo_estudio'];
          $conducta_seguir = $_POST['conducta_seguir'];
          $motivo_referencia = $_POST['motivo_referencia'];
          $fecha_referencia = $_POST['fecha_referencia'];

          $query = $mysqli->query("INSERT INTO exploracion_clinica VALUES ('', '$unidad_id', (SELECT id FROM pacientes 
        WHERE nombre='$nombre' AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' 
        AND fecha_nacimiento='$fecha_nacimiento'), 
            '$presento_menarca', '$edad_presentacion_menarca', '$presento_menopausia', 
            '$edad_presentacion_menopausia', '$utiliza_terapia', '$tiempo_utilizacion', 
            '$nuligesta', '$fecha_primer_embarazo', '$amamanto_hijos', '$antecedentes_familiares', 
            '$edad_familiar', '$antecedente_personal', '$ano_diagnostico', '$enfermedad_benigna', '$especifique', 
            '$cirugia_mama', '$tipo_cirugia', '$ano_cirugia', '$otro_especifique', '$antecedente_hiperplasia',
            '$otros_factores_cancer', '$otros_factores', '$antecedentes_deteccion', '$fecha_ultimo_estudio',
            '$resultado_ultimo_estudio', '$signos_clinicos', '$fecha_inicio_primer_signo', '$localizacion', 
            '$cedula_realizo_estudio', '$conducta_seguir', '$motivo_referencia', '$fecha_referencia', 
            NOW(), NOW() )");

          if($query){
            echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Éxito!</strong> la Exploración clínica fue agregada correctamente.
            </div>';
          } else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Alerta!</strong> Error al guardar exploración clínica.
            </div>';
          }
        }
