        <?php

        if(isset($_POST['submit'])){

          $codigo = $_POST['codigo'];
          $codigo_barras = $_POST['codigo_barras'];
          $tipo_prueba = $_POST['tipo_prueba'];
          $visita = $_POST['visita'];
          if (isset($_POST['fecha_estudio_anterior'])){   
            $fecha_estudio_anterior = $_POST['fecha_estudio_anterior'];
          }else {
            $fecha_estudio_anterior = '0000-00-00'; 
          }
          $fecha_toma = $_POST['fecha_toma'];
          $tamizaje = $_POST['tamizaje'];
          if (isset($_POST['seguimiento'])){   
            $seguimiento = $_POST['seguimiento'];
          }else {
            $seguimiento = "N/A"; 
          }
          $observaciones = $_POST['observaciones'];
          //variables para resultados
          $muestra_adecuada_analisis = $_POST['muestra_adecuada_analisis'];
          $resultado = $_POST['resultado'];
          $fecha_analisis = $_POST['fecha_analisis'];
          $fecha_envio_resultado_sicam = $_POST['fecha_envio_resultado_sicam'];
          // $caso_extraordinario;
          // if (isset($_POST['especifique'])){   
          //   $especifique = $_POST['especifique'];
          // }else {
          //   $especifique = "N/A"; 
          // }

          $query = $mysqli->query("INSERT INTO vph VALUES ('', '$unidad_id', (SELECT id FROM pacientes 
            WHERE nombre='$nombre' AND apellido_pat='$apellido_pat' AND apellido_mat='$apellido_mat' 
            AND fecha_nacimiento='$fecha_nacimiento'), '$codigo', '$codigo_barras', '$tipo_prueba', 
            '$visita', '$fecha_estudio_anterior', '$fecha_toma', '$tamizaje', '$seguimiento', 
            '$observaciones', '$muestra_adecuada_analisis', '$resultado', '$fecha_analisis', 
            '$fecha_envio_resultado_sicam', 'DETECCION', NOW(), NOW() )");

          if($query){
            echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Éxito!</strong> VPH fue agregado correctamente.
            </div>';
          } else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Alerta!</strong> Error al guardar VPH.
            </div>';
          }
        }
