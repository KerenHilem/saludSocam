<?php  
      //METAS
      $extraerId = $mysqli->query("SELECT id FROM personal WHERE rfc='$rfc_responsable'");
      $personal = $extraerId->fetch_assoc();
      $id=$personal['id'];
      $mes=date("n");
      $ano=date("Y");
      $contador=1;
      
      //METAS DE CITOLOGIA
      $existe_doctor = $mysqli->query("SELECT * FROM meta_doctor_citologia WHERE doctor_id='$id' AND ano=$ano AND mes=$mes");

      if (mysqli_num_rows($existe_doctor)>0){//si existe meta del doctor
        if($edad>24 && $edad<=35){//si la paciente tiene entre 25 y 35 años
          $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango1=rango1+1, modificado=NOW() WHERE doctor_id = '$id'");
          //var_dump($actualizar);
          //echo $actualizar;
            if (strpos($actualizar, '1')!==false){//si se actualiza la información correctamente
              echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <strong>Felicidades!</strong> Doctor se le ha añadido una meta más de Cítología (25-35 años)
             </div>';
          }else{//si no se puede actualizar
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error al añadir meta a doctor de Citología (25-35 años)</strong>.
            </div>';    
          }
        }else if($edad>=36 && $edad <= 65){//si la paciente tiene entre 36 y 65 años
          $actualizar = $mysqli->query("UPDATE meta_doctor_citologia SET rango2=rango2+1, modificado=NOW() WHERE doctor_id = '$id'");
          //var_dump($actualizar);
          //echo $actualizar;
              if (strpos($actualizar, '1')!==false){//si se actualiza la información correctamente
                echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Felicidades!</strong> Doctor se le ha añadido una meta más de Cítología (36-65 años)
            </div>';
            }else{//si no se puede actualizar
              echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error al añadir meta a doctor de Citología (36-65 años)</strong>.
              </div>';
            
            }
        }
      }else{//si no existe meta del doctor se crea
        if($edad>=24 && $edad<=35){// si la paciente tiene entre 24 y 35 años
        $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$id','$unidad_id' ,'$ano', '$mes', '1', '0', '0', NOW(), NOW())");
        //var_dump($crearRegistro);
        //echo $crearRegistro;
            if (strpos($crearRegistro, '1')!==false){//si se crea registro correctamente
              echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Felicidades!</strong> Doctor se le ha creado una nueva meta de Cítología (24-35 años)
            </div>';
            }else{//si no se crea correctamente
              echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error al crear nueva meta de Citología (24-35 años)</strong>.
              </div>';
            }
         }else if($edad>=36 && $edad <= 65){//si la paciente tiene entre 36 y 65 años
          $crearRegistro = $mysqli->query("INSERT INTO meta_doctor_citologia VALUES('', '$id','$unidad_id' ,'$ano', '$mes', '0', '1', '0', NOW(), NOW())");
          //var_dump($crearRegistro);
          //echo $crearRegistro;
            if (strpos($crearRegistro, '1')!==false){//si se crea el registro correctamente
            echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Felicidades!</strong> Doctor se le ha creado una nueva meta de Cítología (36-65 años)
            </div>';
            }else{//si no se crea correctamente
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error al crear nueva meta de Citología (36-65 años)</strong>.
            </div>';
            }
        }
      }//fin de metas de citologia

      //METAS DE UNIDAD
      $existe_meta_unidad = $mysqli->query("SELECT * FROM meta_unidad_citologia WHERE unidad_id='$unidad_id' AND ano=$ano AND mes=$mes");

      if (mysqli_num_rows($existe_meta_unidad)>0){//si existe meta de la unidad
        if($edad>24 && $edad<=35){//si la paciente tiene entre 25 y 35 años
          $actualizar = $mysqli->query("UPDATE meta_unidad_citologia SET rango1=rango1+1, modificado=NOW() WHERE unidad_id = '$unidad_id'");
          //var_dump($actualizar);
          //echo $actualizar;
          if (strpos($actualizar, '1')!==false){//si se actualiza correctamente
          echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Felicidades!</strong> ha añadido una meta más para unidad (25-35 años)
        </div>';
        }else{//si no se puede actualizar
          echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error al añadir meta para unidad (25-35 años)</strong>
          </div>';
        }
        }else if($edad>=36 && $edad <= 65){//si la paciente tiene entre 36 y 65 años
          $actualizar = $mysqli->query("UPDATE meta_unidad_citologia SET rango2=rango2+1, modificado=NOW() WHERE unidad_id = '$unidad_id'");
          //var_dump($actualizar);
          //echo $actualizar;
          if (strpos($actualizar, '1')!==false){//si se puede actualizar correctamente
          echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Felicidades!</strong>  ha añadido una meta más para unidad (36-65 años)
          </div>';
          }else{//si no se puede actualizar
          echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Error al añadir meta para unidad (36-65 años)</strong>
            </div>';
          }
        }
      }else {//si no existe una meta se crea
         if($edad>=24 && $edad<=35){//si la paciente tiene entre 24 y 35 años
        $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '1', '0', NOW(), NOW())");
        //var_dump($crearRegistro);
        //echo $crearRegistro;
            if (strpos($crearRegistro, '1')!==false){//si se crea registro correctamente
              echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Éxito!</strong> se acaba de crear una nueva meta para unidad (24-35 años).
            </div>';
            }else{//si no se crea correctamente
              echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error al crear nueva meta para unidad (24-35 años)</strong>.
              </div>';
            }
         }else if($edad>=36 && $edad <= 65){//si la paciente tiene entre 36 y 65 años
          $crearRegistro = $mysqli->query("INSERT INTO meta_unidad_citologia VALUES('', '$unidad_id', '$ano', '$mes', '0', '1', NOW(), NOW())");
          //var_dump($crearRegistro);
          //echo $crearRegistro;
          if (strpos($crearRegistro, '1')!==false){//si se crea registro correctamente
              echo '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Éxito!</strong> se acaba de crear una nueva meta para unidad (36-65 años).
            </div>';
            }else{//si no se crea correctamente
              echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error al crear nueva meta para unidad (35-65 años)</strong>.
              </div>';
            }
        }
      }//fin de metas de unidad
?>